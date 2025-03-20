document.addEventListener("DOMContentLoaded", function () {
  const mobileMenuToggle = document.querySelector(".mobile-menu-toggle");
  const mobileMenuClose = document.querySelector(".mobile-menu-close");
  const mobileMenu = document.querySelector(".mobile-menu");
  const overlay = document.querySelector(".overlay");
  const dropdownToggles = document.querySelectorAll(
    ".mobile-nav-link.has-dropdown"
  );

  // Store focusable elements for keyboard trap
  const focusableElements = mobileMenu.querySelectorAll(
    'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
  );
  const firstFocusableElement = focusableElements[0];
  const lastFocusableElement = focusableElements[focusableElements.length - 1];

  // Toggle mobile menu
  if (mobileMenuToggle) {
    mobileMenuToggle.addEventListener("click", function () {
      // Show the mobile menu
      mobileMenu.classList.add("active");
      mobileMenu.removeAttribute("inert"); // Remove inert if it exists

      // Hide the toggle button itself
      this.style.display = "none";

      // Show overlay
      overlay.classList.add("active");
      document.body.classList.add("menu-open");

      // Set focus to the first element (usually the close button)
      if (firstFocusableElement) {
        setTimeout(() => {
          firstFocusableElement.focus();
        }, 100);
      }
    });
  }

  // Close mobile menu
  if (mobileMenuClose) {
    mobileMenuClose.addEventListener("click", closeMenu);
  }

  // Close menu when overlay is clicked
  if (overlay) {
    overlay.addEventListener("click", closeMenu);
  }

  // Close menu function
  function closeMenu() {
    // Close the menu
    mobileMenu.classList.remove("active");
    mobileMenu.setAttribute("inert", ""); // Add inert attribute when hidden

    // Hide overlay
    overlay.classList.remove("active");
    document.body.classList.remove("menu-open");

    // Show the toggle button again if we're in mobile view
    if (mobileMenuToggle && window.innerWidth <= 960) {
      mobileMenuToggle.style.display = "flex";
      // Return focus to the toggle button
      setTimeout(() => {
        mobileMenuToggle.focus();
      }, 100);
    }
  }

  // Handle keyboard trap within the menu
  mobileMenu.addEventListener("keydown", function (e) {
    if (e.key === "Escape") {
      closeMenu();
      return;
    }

    // Trap focus inside the modal when it's open
    if (e.key === "Tab") {
      if (e.shiftKey && document.activeElement === firstFocusableElement) {
        e.preventDefault();
        lastFocusableElement.focus();
      } else if (
        !e.shiftKey &&
        document.activeElement === lastFocusableElement
      ) {
        e.preventDefault();
        firstFocusableElement.focus();
      }
    }
  });

  // Toggle mobile dropdowns
  dropdownToggles.forEach(function (toggle) {
    toggle.addEventListener("click", function (e) {
      e.preventDefault();
      this.classList.toggle("active");

      // Toggle the dropdown menu
      const dropdown = this.nextElementSibling;
      if (dropdown) {
        dropdown.classList.toggle("active");
      }
    });
  });

  // Handle window resize
  window.addEventListener("resize", function () {
    if (window.innerWidth > 960) {
      // Reset mobile menu state
      mobileMenu.classList.remove("active");
      mobileMenu.setAttribute("inert", "");
      overlay.classList.remove("active");
      document.body.classList.remove("menu-open");

      // Hide mobile toggle
      if (mobileMenuToggle) mobileMenuToggle.style.display = "none";
    } else {
      // Show toggle only if menu is closed
      if (mobileMenuToggle && !mobileMenu.classList.contains("active")) {
        mobileMenuToggle.style.display = "flex";
      }
    }
  });

  // Set initial state
  if (!mobileMenu.classList.contains("active")) {
    mobileMenu.setAttribute("inert", "");
  }
});
