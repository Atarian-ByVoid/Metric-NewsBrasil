const images = document.querySelectorAll('.image');
let currentImage = 0;

function showImage(n) {
    images[currentImage].style.display = 'none';
    currentImage = (n + images.length) % images.length;
    images[currentImage].style.display = 'block';
}

function nextImage() {
    showImage(currentImage + 1);
}

function prevImage() {
    showImage(currentImage - 1);
}

setInterval(nextImage, 3000);

const nextBtn = document.createElement('button');
nextBtn.innerText = 'Next';
nextBtn.addEventListener('click', nextImage);
document.querySelector('.card').appendChild(nextBtn);

const prevBtn = document.createElement('button');
prevBtn.innerText = 'Prev';
prevBtn.addEventListener('click', prevImage);
document.querySelector('.card').appendChild(prevBtn);
