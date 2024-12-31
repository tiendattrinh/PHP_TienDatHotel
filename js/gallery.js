const galleryItems = document.querySelectorAll('.gallery-item');
const viewer = document.querySelector('.fullscreen-viewer');
const fullscreenImage = document.getElementById('fullscreen-image')
const imageInfo = document.getElementById('image-info');
const closeBtn = document.querySelector('.close-btn');
const prevBtn = document.querySelector('.prev-btn');
const nextBtn = document.querySelector('.next-btn');

let currentIndex = 0;

// Open Fullscreen Viewer
galleryItems.forEach((item, index) => {
    item.addEventListener('click', () => {
        const imgSrc = item.querySelector('img').src;
        const info = item.getAttribute('data-info');
        fullscreenImage.src = imgSrc;
        imageInfo.textContent = info;
        viewer.style.display = 'flex';
        currentIndex = index;
    });
});

// Close Viewer
closeBtn.addEventListener('click', () => {
    viewer.style.display = 'none';
})

// Navigate Images
const showImage = (index) => {
    if (index < 0 || index >= galleryItems.length) return;
    const item = galleryItems[index];
    const imgSrc = item.querySelector('img').src;
    const info = item.getAttribute('data-info');
    fullscreenImage.src = imgSrc;
    imageInfo.textContent = info;
};


prevBtn.addEventListener('click', () => {
    currentIndex = (currentIndex - 1 + galleryItems.length) % galleryItems.length;
    showImage(currentIndex);
});

nextBtn.addEventListener('click', () => {
    currentIndex = (currentIndex + 1) % galleryItems.length;
    showImage(currentIndex);
});

// Close viewer on background click
viewer.addEventListener('click', (e) => {
    if (e.target === viewer) viewer.style.display = 'none';
});
