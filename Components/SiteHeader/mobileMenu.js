document.addEventListener("DOMContentLoaded", function () {
  const mobileMenuToggle = document.querySelector(".mobile-menu-toggle");
  const mobileMenu = document.querySelector(".mobile-menu");
  const mobileMenuClose = document.querySelector(".mobile-menu-close");
  const overlay = document.querySelector(".overlay");

  // When opening the menu
  mobileMenuToggle.addEventListener("click", () => {
    mobileMenu.classList.add("active");
    overlay.classList.add("active");
    document.body.style.overflow = "hidden";
    // Remove inert when showing the menu
    mobileMenu.removeAttribute("inert");
  });

  // Close menu function
  const closeMenu = () => {
    mobileMenu.classList.remove("active");
    overlay.classList.remove("active");
    document.body.style.overflow = "";
    // Add inert when hiding the menu
    mobileMenu.setAttribute("inert", "");
  };

  // Close button
  if (mobileMenuClose) {
    mobileMenuClose.addEventListener("click", closeMenu);
  }
  // Overlay click
  if (overlay) {
    overlay.addEventListener("click", closeMenu);
  }
  // Dropdown toggles
  document.addEventListener("click", (e) => {
    const toggleLink = e.target.closest(
      '.mobile-nav-link[data-toggle="dropdown"]'
    );
    if (toggleLink) {
      e.preventDefault();
      const dropdown = toggleLink.nextElementSibling;
      dropdown.classList.toggle("active");
      // Toggle icon direction
      const icon = toggleLink.querySelector("svg");
      if (icon) {
        const isActive = dropdown.classList.contains("active");
        const polyline = icon.querySelector("polyline");
        if (polyline) {
          polyline.setAttribute(
            "points",
            isActive ? "18 15 12 9 6 15" : "9 18 15 12 9 6"
          );
        }
      }
    }
  });
  // Escape key
  document.addEventListener("keydown", (e) => {
    if (e.key === "Escape" && mobileMenu.classList.contains("active")) {
      closeMenu();
    }
  });
});
