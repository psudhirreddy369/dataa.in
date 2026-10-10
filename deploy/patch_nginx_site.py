#!/usr/bin/env python3
"""Point the dataa.in nginx server at the PHP site without moving /services or /workflows.

Reads a site config on stdin or via --config and writes the patched config to stdout.
Only the server block that serves dataa.in content is changed. Location blocks for
/services and /workflows are copied through unchanged.
"""

from __future__ import annotations

import argparse
import re
import sys

SERVER_NAME_RE = re.compile(
    r"(^|[^A-Za-z0-9-])dataa\.in([^A-Za-z0-9.-]|$)"
)
LOCATION_RE = re.compile(
    r"^(\s*)location\s+(?P<mod>=|~\*|~|\^~)?\s*(?P<uri>[^\s{]+)\s*\{"
)


def _brace_delta(line: str) -> int:
    return line.count("{") - line.count("}")


def _split_server_blocks(text: str) -> list[tuple[str, str]]:
    """Return (before, block) pairs plus a final tail stored as ('tail', rest) is not needed.

    Each item is ('literal', text) or ('server', block_including_braces).
    """
    lines = text.splitlines(keepends=True)
    parts: list[tuple[str, str]] = []
    buf: list[str] = []
    i = 0
    while i < len(lines):
        line = lines[i]
        if re.match(r"^\s*server\s*\{", line):
            if buf:
                parts.append(("literal", "".join(buf)))
                buf = []
            depth = 0
            block: list[str] = []
            while i < len(lines):
                block.append(lines[i])
                depth += _brace_delta(lines[i])
                i += 1
                if depth <= 0:
                    break
            parts.append(("server", "".join(block)))
            continue
        buf.append(line)
        i += 1
    if buf:
        parts.append(("literal", "".join(buf)))
    return parts


def _is_dataa_content_server(block: str) -> bool:
    if not SERVER_NAME_RE.search(block):
        return False
    # Redirect-only servers should stay as they are.
    body = _server_inner(block)
    has_root = re.search(r"(?m)^\s*root\s+", body) is not None
    has_location = re.search(r"(?m)^\s*location\s+", body) is not None
    return has_root or has_location


def _server_inner(block: str) -> str:
    start = block.find("{")
    end = block.rfind("}")
    if start < 0 or end < 0:
        return block
    return block[start + 1 : end]


def _split_locations(inner: str) -> tuple[str, list[tuple[str, str]]]:
    """Split server inner text into preamble and location blocks.

    preamble is everything that is not inside a location, with location
    placeholders removed. Each location is (uri, full_block).
    """
    lines = inner.splitlines(keepends=True)
    preamble: list[str] = []
    locations: list[tuple[str, str]] = []
    i = 0
    while i < len(lines):
        match = LOCATION_RE.match(lines[i])
        if not match:
            preamble.append(lines[i])
            i += 1
            continue
        uri = match.group("uri").strip("'\"")
        depth = 0
        block: list[str] = []
        while i < len(lines):
            block.append(lines[i])
            depth += _brace_delta(lines[i])
            i += 1
            if depth <= 0:
                break
        locations.append((uri, "".join(block)))
    return "".join(preamble), locations


def _is_preserved_uri(uri: str) -> bool:
    path = uri.split("?", 1)[0]
    return (
        path == "/services"
        or path.startswith("/services/")
        or path == "/workflows"
        or path.startswith("/workflows/")
    )


def _set_server_directive(preamble: str, name: str, value: str) -> str:
    pattern = re.compile(rf"(?m)^(\s*){name}\s+[^;]*;")
    replacement = rf"\1{name} {value};"
    if pattern.search(preamble):
        return pattern.sub(replacement, preamble, count=1)
    indent = "    "
    if preamble.endswith("\n"):
        return preamble + f"{indent}{name} {value};\n"
    return preamble + f"\n{indent}{name} {value};\n"


def _current_root(preamble: str) -> str | None:
    match = re.search(r"(?m)^\s*root\s+([^;]+);", preamble)
    if not match:
        return None
    return match.group(1).strip().strip("'\"")


def _php_location(sock: str) -> str:
    return f"""    # Managed by deploy/install-on-vps.sh — main site only
    location ^~ /storage/ {{
        deny all;
    }}

    location ~ /\\. {{
        deny all;
    }}

    location ~ \\.php$ {{
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:{sock};
    }}
"""


def _main_location() -> str:
    return """    location / {
        try_files $uri $uri/ =404;
    }
"""


def _workflows_placeholder(previous_root: str) -> str:
    # Every URI under /workflows/ keeps returning the previous homepage file.
    # A leading-slash try_files path is relative to this root, not the request.
    return f"""    # Reserved. No /workflows location existed; keep the previous response.
    location = /workflows {{
        root {previous_root};
        try_files /index.html =404;
    }}

    location ^~ /workflows/ {{
        root {previous_root};
        try_files /index.html =404;
    }}
"""


def content_server_root(text: str) -> str:
    for kind, chunk in _split_server_blocks(text):
        if kind == "server" and _is_dataa_content_server(chunk):
            root = _current_root(_split_locations(_server_inner(chunk))[0])
            if root:
                return root
    raise SystemExit("Could not find the current root of the dataa.in server.")


def patch_config(text: str, site_root: str, php_sock: str, previous_root: str) -> str:
    parts = _split_server_blocks(text)
    found = False
    out: list[str] = []
    for kind, chunk in parts:
        if kind != "server" or not _is_dataa_content_server(chunk):
            out.append(chunk)
            continue
        found = True
        out.append(_patch_server(chunk, site_root, php_sock, previous_root))
    if not found:
        raise SystemExit("No dataa.in content server block found in the nginx config.")
    return "".join(out)


def _patch_server(block: str, site_root: str, php_sock: str, previous_root: str) -> str:
    open_end = block.find("{") + 1
    close_at = block.rfind("}")
    head = block[:open_end]
    tail = block[close_at:]
    inner = block[open_end:close_at]
    # Keep the newline that usually follows "server {".
    preamble, locations = _split_locations(inner)
    if not any(_is_preserved_uri(uri) for uri, _ in locations if uri.startswith("/services")):
        raise SystemExit(
            "Refusing to edit nginx: no /services location in the dataa.in server block."
        )

    preamble = _set_server_directive(preamble, "root", site_root)
    preamble = _set_server_directive(preamble, "index", "index.php index.html")

    kept: list[str] = []
    has_workflows = False
    for uri, loc in locations:
        if _is_preserved_uri(uri):
            kept.append(loc if loc.endswith("\n") else loc + "\n")
            if uri == "/workflows" or uri.startswith("/workflows/"):
                has_workflows = True
            continue
        if uri == "/":
            continue
        # Leave every other existing location (assets, certbot, and so on) in place.
        if "Managed by deploy/install-on-vps.sh" in loc:
            continue
        kept.append(loc if loc.endswith("\n") else loc + "\n")

    pieces = [head, preamble if preamble.endswith("\n") else preamble + "\n"]
    pieces.extend(kept)
    if not has_workflows:
        pieces.append(_workflows_placeholder(previous_root))
    pieces.append(_php_location(php_sock))
    pieces.append(_main_location())
    pieces.append(tail if tail.startswith("\n") else "\n" + tail)
    return "".join(pieces)


def main() -> None:
    parser = argparse.ArgumentParser()
    parser.add_argument("--config", help="nginx site file; default stdin")
    parser.add_argument("--site-root")
    parser.add_argument("--php-sock")
    parser.add_argument("--previous-root")
    parser.add_argument("--show-root", action="store_true")
    args = parser.parse_args()
    if args.config:
        text = open(args.config, encoding="utf-8").read()
    else:
        text = sys.stdin.read()
    if args.show_root:
        sys.stdout.write(content_server_root(text) + "\n")
        return
    if not args.site_root or not args.php_sock or not args.previous_root:
        raise SystemExit("--site-root, --php-sock, and --previous-root are required")
    sys.stdout.write(
        patch_config(text, args.site_root, args.php_sock, args.previous_root)
    )


if __name__ == "__main__":
    main()
