document.addEventListener('DOMContentLoaded', function() {
    const carousel = document.querySelector('.carousel');
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');

    let currentIndex = 0;
    const cards = document.querySelectorAll('.card');
    const totalCards = cards.length;
    const cardWidth = cards[0].offsetWidth + 20; // Ukuran setiap card + margin

    const updateCarousel = () => {
        carousel.style.transform = `translateX(-${currentIndex * cardWidth}px)`;
    };

    nextBtn.addEventListener('click', () => {
        if (currentIndex < totalCards - 1) {
            currentIndex++;
            updateCarousel();
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentIndex > 0) {
            currentIndex--;
            updateCarousel();
        }
    });
});

// Pastikan script dijalankan setelah halaman sepenuhnya dimuat
window.onload = function() {
    // Menambahkan event listeners untuk tombol plus dan minus
    const plusButton = document.querySelector('.quantity-btn.plus');
    const minusButton = document.querySelector('.quantity-btn.minus');
    const quantityInput = document.querySelector('#quantity');
    
    if (plusButton && minusButton && quantityInput) {
        // Menangani klik tombol +
        plusButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            quantityInput.value = currentValue + 1;
        });

        // Menangani klik tombol -
        minusButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
        });
    }
};

