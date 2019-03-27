// страница скриптов сайта

let slides = document.querySelectorAll('#slides .slide');
let currentSlide = 0;
let slideInterval = setInterval(nextSlide,2000);

function nextSlide() {
    slides[currentSlide].className = 'slide d-flex';
    currentSlide = (currentSlide+1)%slides.length;
    slides[currentSlide].className = 'slide showing d-flex';
}