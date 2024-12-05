var swiper = new Swiper(".card-slider", {
  grabCursor: true,
  spaceBetween: 0,
  slidesPerView: "3",
  loop: true,
});
var swiper2 = new Swiper(".banner", {
  slidesPerView: 1.1,
  spaceBetween: 15,
  loop: true,
});
var swiper3 = new Swiper(".portfolio", {
  slidesPerView: 1.4,
  spaceBetween: 15,
  loop: true,
});
var swiper4 = new Swiper(".onboarding", {
  slidesPerView: 1,
  spaceBetween: 0,
  loop: false,
  // cssMode: true,
  navigation: {
    nextEl: ".onboarding-next",
  },
  pagination: {
    el: ".swiper-pagination",
  },
  keyboard: true,
});
