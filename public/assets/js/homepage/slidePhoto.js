let currentSlide = 0;
const slides = document.querySelectorAll('.listImg img');

function showSlide(n) {
    slides[currentSlide].classList.add('hidden');
    currentSlide = (n + slides.length) % slides.length;
    slides[currentSlide].classList.remove('hidden');
}

function nextSlide() {
    showSlide(currentSlide + 1);
}

function previousSlide() {
    showSlide(currentSlide - 1);
}