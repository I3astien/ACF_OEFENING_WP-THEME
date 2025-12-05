document.addEventListener("DOMContentLoaded", function () {
  const hamburger = document.querySelector(".header__hamburger");
  const mobileOverlay = document.querySelector(".mobile-overlay");

  if (!hamburger || !mobileOverlay) {
    return;
  }

  hamburger.addEventListener("click", function () {
    const isActive = hamburger.classList.contains("active");

    if (isActive) {
      hamburger.classList.remove("active");
      mobileOverlay.classList.remove("active");
    } else {
      hamburger.classList.add("active");
      mobileOverlay.classList.add("active");
    }
  });

  mobileOverlay.addEventListener("click", function (e) {
    if (e.target === mobileOverlay) {
      hamburger.classList.remove("active");
      mobileOverlay.classList.remove("active");
    }
  });
});
