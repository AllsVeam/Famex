// JavaScript para manejar el slide
var sliderContents = document.querySelectorAll('.slider-content');
var currentIndex = 0;

setInterval(function () {
    sliderContents[currentIndex].classList.remove('active');
    currentIndex = (currentIndex + 1) % sliderContents.length;
    sliderContents[currentIndex].classList.add('active');
}, 3000);