document.addEventListener('DOMContentLoaded', function () {
    // Select all product carousel containers
    const carousels = document.querySelectorAll('.product-carousel-container');

    carousels.forEach(carouselContainer => {
        const carousel = carouselContainer.querySelector('.product-carousel');
        const leftButton = carouselContainer.querySelector('.nav-button.left');
        const rightButton = carouselContainer.querySelector('.nav-button.right');

        let currentIndex = 0;
        const cardsToShow = 4; // Default number of cards to show per view
        const cardWidth = carouselContainer.querySelector('.product-card').offsetWidth + 10; // Adjust margin if needed
        const totalCards = carouselContainer.querySelectorAll('.product-card').length;
        
        function calculateMaxIndex() {
            return Math.ceil(totalCards / cardsToShow) - 1;
        }

        function updateButtonVisibility() {
            const maxIndex = calculateMaxIndex();

            if (currentIndex <= 0) {
                leftButton.style.display = 'none';
            } else {
                leftButton.style.display = 'block';
            }

            if (currentIndex >= maxIndex) {
                rightButton.style.display = 'none';
            } else {
                rightButton.style.display = 'block';
            }
        }

        function scrollCarousel() {
            const maxIndex = calculateMaxIndex();
            const remainingCards = totalCards - (currentIndex * cardsToShow);
            const cardsToScroll = Math.min(remainingCards, cardsToShow);

            const scrollAmount = currentIndex * cardWidth * cardsToScroll;
            carousel.style.transform = `translateX(-${scrollAmount}px)`;
            updateButtonVisibility();
        }

        leftButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                scrollCarousel();
            }
        });

        rightButton.addEventListener('click', () => {
            const maxIndex = calculateMaxIndex();
            if (currentIndex < maxIndex) {
                currentIndex++;
                scrollCarousel();
            }
        });

        // Initial button visibility update
        updateButtonVisibility();
    });
});
