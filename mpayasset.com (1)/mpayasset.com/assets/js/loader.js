/*==================
  Loader js
======================*/
// const loaderSpan = document.querySelector(".loader").children;
const animate = function () {
  document.querySelector(".loader").classList.toggle("animate");
};

const timeOutAnimation = setInterval(animate, 3000);
document.onreadystatechange = function () {
  if (document.readyState !== "complete") {
    timeOutAnimation;
  } else {
    setTimeout(function () {
      document.querySelector(".loader-wrapper").classList.add("hidden");
      clearInterval(timeOutAnimation);
    }, 1000);
  }
};