/**
 * Site interactions — vanilla JS (no frameworks)
 */
(function () {
  "use strict";

  var header = document.getElementById("site-header");
  var toggle = document.querySelector(".nav-toggle");
  var mobileNav = document.getElementById("mobile-nav");
  var backTop = document.getElementById("back-to-top");
  var dropdownBtn = document.getElementById("products-menu-btn");
  var dropdownParent = dropdownBtn ? dropdownBtn.closest(".has-dropdown") : null;
  var reduceMotion = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  /* Sticky header */
  function onScroll() {
    var y = window.scrollY || 0;
    if (header) header.classList.toggle("is-scrolled", y > 10);
    if (backTop) backTop.hidden = y < 400;
  }
  window.addEventListener("scroll", onScroll, { passive: true });
  onScroll();

  /* Mobile nav */
  if (toggle && mobileNav) {
    toggle.addEventListener("click", function () {
      var open = toggle.getAttribute("aria-expanded") === "true";
      toggle.setAttribute("aria-expanded", String(!open));
      toggle.setAttribute("aria-label", open ? "Open menu" : "Close menu");
      mobileNav.hidden = open;
      mobileNav.classList.toggle("is-open", !open);
      document.body.classList.toggle("nav-open", !open);
    });

    mobileNav.querySelectorAll("a").forEach(function (link) {
      link.addEventListener("click", function () {
        toggle.setAttribute("aria-expanded", "false");
        toggle.setAttribute("aria-label", "Open menu");
        mobileNav.hidden = true;
        mobileNav.classList.remove("is-open");
        document.body.classList.remove("nav-open");
      });
    });
  }

  /* Products dropdown (keyboard / click) */
  if (dropdownBtn && dropdownParent) {
    dropdownBtn.addEventListener("click", function (e) {
      e.stopPropagation();
      var open = dropdownParent.classList.toggle("is-open");
      dropdownBtn.setAttribute("aria-expanded", String(open));
    });
    document.addEventListener("click", function () {
      dropdownParent.classList.remove("is-open");
      dropdownBtn.setAttribute("aria-expanded", "false");
    });
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape") {
        dropdownParent.classList.remove("is-open");
        dropdownBtn.setAttribute("aria-expanded", "false");
        if (toggle && toggle.getAttribute("aria-expanded") === "true") {
          toggle.click();
        }
      }
    });
  }

  /* Scroll reveal */
  var reveals = document.querySelectorAll(".reveal");
  if (!reduceMotion && "IntersectionObserver" in window && reveals.length) {
    var io = new IntersectionObserver(
      function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add("is-visible");
            io.unobserve(entry.target);
          }
        });
      },
      { threshold: 0.12, rootMargin: "0px 0px -40px 0px" }
    );
    reveals.forEach(function (el) { io.observe(el); });
  } else {
    reveals.forEach(function (el) { el.classList.add("is-visible"); });
  }

  /* Animated counters */
  var counters = document.querySelectorAll("[data-counter]");
  function animateCounter(el) {
    var target = parseFloat(el.getAttribute("data-counter") || "0");
    var suffix = el.getAttribute("data-suffix") || "";
    var prefix = el.getAttribute("data-prefix") || "";
    var isFloat = String(target).indexOf(".") !== -1;
    if (reduceMotion) {
      el.textContent = prefix + target + suffix;
      return;
    }
    var duration = 1400;
    var start = null;
    function step(ts) {
      if (!start) start = ts;
      var p = Math.min((ts - start) / duration, 1);
      var eased = 1 - Math.pow(1 - p, 3);
      var val = target * eased;
      el.textContent = prefix + (isFloat ? val.toFixed(0) : Math.round(val)) + suffix;
      if (p < 1) requestAnimationFrame(step);
      else el.textContent = prefix + target + suffix;
    }
    requestAnimationFrame(step);
  }
  if (counters.length && "IntersectionObserver" in window) {
    var cio = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) {
          animateCounter(entry.target);
          cio.unobserve(entry.target);
        }
      });
    }, { threshold: 0.4 });
    counters.forEach(function (c) { cio.observe(c); });
  } else {
    counters.forEach(animateCounter);
  }

  /* FAQ accordion */
  document.querySelectorAll(".faq-item button").forEach(function (btn) {
    btn.addEventListener("click", function () {
      var item = btn.closest(".faq-item");
      var open = item.classList.contains("is-open");
      item.parentElement.querySelectorAll(".faq-item").forEach(function (i) {
        i.classList.remove("is-open");
        i.querySelector("button").setAttribute("aria-expanded", "false");
      });
      if (!open) {
        item.classList.add("is-open");
        btn.setAttribute("aria-expanded", "true");
      }
    });
  });

  /* Back to top */
  if (backTop) {
    backTop.addEventListener("click", function () {
      window.scrollTo({ top: 0, behavior: reduceMotion ? "auto" : "smooth" });
    });
  }

  /* Contact form client validation (server validates too) */
  var form = document.getElementById("contact-form");
  if (form) {
    form.addEventListener("submit", function (e) {
      var valid = true;
      form.querySelectorAll(".form-group").forEach(function (g) {
        g.classList.remove("has-error");
        var err = g.querySelector(".field-error");
        if (err && !err.dataset.server) err.remove();
      });

      function fail(id, msg) {
        var field = document.getElementById(id);
        if (!field) return;
        var group = field.closest(".form-group");
        group.classList.add("has-error");
        if (!group.querySelector(".field-error")) {
          var span = document.createElement("span");
          span.className = "field-error";
          span.textContent = msg;
          group.appendChild(span);
        }
        valid = false;
      }

      var name = (document.getElementById("name") || {}).value || "";
      var email = (document.getElementById("email") || {}).value || "";
      var product = (document.getElementById("product") || {}).value || "";
      var message = (document.getElementById("message") || {}).value || "";
      var emailRe = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

      if (!name.trim()) fail("name", "Please enter your name.");
      if (!email.trim()) fail("email", "Please enter your email.");
      else if (!emailRe.test(email.trim())) fail("email", "Please enter a valid email.");
      if (!product) fail("product", "Please select a product.");
      if (!message.trim() || message.trim().length < 10) {
        fail("message", "Please provide a message (at least 10 characters).");
      }

      if (!valid) {
        e.preventDefault();
        var first = form.querySelector(".form-group.has-error input, .form-group.has-error select, .form-group.has-error textarea");
        if (first) first.focus();
      }
    });
  }

  /* Chatbot interactive demo */
  var chatRoot = document.getElementById("chat-demo");
  if (chatRoot) {
    var messages = chatRoot.querySelector(".chat-messages");
    var script = [
      { role: "user", text: "I want to know my application status." },
      { role: "bot", text: "Sure. Please provide your application ID." },
      { role: "user", text: "APP10245" },
      { role: "bot", text: "Your application is currently under verification." }
    ];
    var step = 0;
    var playing = false;

    function addBubble(role, text) {
      var div = document.createElement("div");
      div.className = "chat-bubble " + role;
      div.textContent = text;
      messages.appendChild(div);
      messages.scrollTop = messages.scrollHeight;
    }

    function resetChat() {
      messages.innerHTML = "";
      step = 0;
      var intro = document.createElement("div");
      intro.className = "chat-bubble bot";
      intro.textContent = "Hello! I'm an AI assistant demo. Click “Start a Conversation” to begin.";
      messages.appendChild(intro);
    }

    function playNext() {
      if (step >= script.length) {
        playing = false;
        return;
      }
      var item = script[step++];
      addBubble(item.role, item.text);
      if (step < script.length) {
        setTimeout(playNext, reduceMotion ? 0 : 900);
      } else {
        playing = false;
      }
    }

    var startBtn = document.getElementById("chat-start");
    var resetBtn = document.getElementById("chat-reset");
    if (startBtn) {
      startBtn.addEventListener("click", function () {
        if (playing) return;
        playing = true;
        messages.innerHTML = "";
        step = 0;
        playNext();
      });
    }
    if (resetBtn) {
      resetBtn.addEventListener("click", function () {
        playing = false;
        resetChat();
      });
    }
    resetChat();
  }
})();
