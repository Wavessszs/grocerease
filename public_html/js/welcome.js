document.addEventListener('DOMContentLoaded', function () {
    // Functionality 1: Product Carousel Navigation
function setupProductCarousels() {
    const carousels = document.querySelectorAll('.product-carousel-container');
    
    carousels.forEach(carouselContainer => {
        const carousel = carouselContainer.querySelector('.product-carousel');
        const leftButton = carouselContainer.querySelector('.nav-button.left');
        const rightButton = carouselContainer.querySelector('.nav-button.right');

        let currentIndex = 0;

        // Calculate how many cards are visible based on the container width
        function calculateVisibleCards() {
            const containerWidth = carouselContainer.offsetWidth;
            const cardWidth = carouselContainer.querySelector('.product-card').offsetWidth + 10; // Card width + margin
            return Math.floor(containerWidth / cardWidth);
        }

        // Calculate how many cards are there in total
        function calculateTotalCards() {
            return carouselContainer.querySelectorAll('.product-card').length;
        }

        // Calculate the maximum index based on total and visible cards
        function calculateMaxIndex() {
            const visibleCards = calculateVisibleCards();
            const totalCards = calculateTotalCards();
            return Math.max(0, totalCards - visibleCards); // Ensure max index is not negative
        }

        function updateButtonVisibility() {
            const maxIndex = calculateMaxIndex();
            leftButton.style.display = currentIndex === 0 ? 'none' : 'block';
            rightButton.style.display = currentIndex >= maxIndex ? 'none' : 'block';
        }

        function scrollCarousel() {
            const cardWidth = carouselContainer.querySelector('.product-card').offsetWidth + 10;
            const scrollAmount = currentIndex * cardWidth;
            carousel.style.transform = `translateX(-${scrollAmount}px)`;
            updateButtonVisibility();
        }

        // Move carousel left
        leftButton.addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex -= calculateVisibleCards(); // Scroll by the number of visible cards
                if (currentIndex < 0) currentIndex = 0; // Ensure currentIndex doesn't go negative
                scrollCarousel();
            }
        });

        // Move carousel right
        rightButton.addEventListener('click', () => {
            const maxIndex = calculateMaxIndex();
            if (currentIndex < maxIndex) {
                currentIndex += calculateVisibleCards(); // Scroll by the number of visible cards
                if (currentIndex > maxIndex) currentIndex = maxIndex; // Ensure currentIndex doesn't exceed max
                scrollCarousel();
            }
        });

        // Recalculate on window resize to adjust for screen changes
        window.addEventListener('resize', () => {
            scrollCarousel();
            updateButtonVisibility();
        });

        updateButtonVisibility(); // Initialize button visibility
    });
}


    // Functionality 2: Auto-Scrolling Header Carousel
    function setupHeaderCarousel() {
        const carousel = document.querySelector('.carousel');
        const items = document.querySelectorAll('.carousel-item');
        let currentItem = 0;

        function scrollToNextItem() {
            currentItem = (currentItem + 1) % items.length;
            items.forEach((item, index) => {
                item.style.transform = `translateX(${(index - currentItem) * 100}%)`;
            });
        }

        setInterval(scrollToNextItem, 5000); // Auto-scroll every 5 seconds
        scrollToNextItem(); // Initial scroll setup
    }

    // Functionality 3: Quantity Adjustments and Add-to-Cart
    function setupProductCards() {
        const productCards = document.querySelectorAll('.product-card');
        productCards.forEach(card => {
            const decreaseBtn = card.querySelector('.decrease');
            const increaseBtn = card.querySelector('.increase');
            const quantitySpan = card.querySelector('.quantity');
            const addToCartBtn = card.querySelector('.add-to-cart');

            decreaseBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                let qty = parseInt(quantitySpan.textContent);
                if (qty > 1) qty--;
                quantitySpan.textContent = qty;
            });

            increaseBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                let qty = parseInt(quantitySpan.textContent);
                qty++;
                quantitySpan.textContent = qty;
            });

            addToCartBtn.addEventListener('click', (e) => {
                e.stopPropagation();
                const productId = card.getAttribute('data-product-id');
                const quantity = parseInt(quantitySpan.textContent);

                fetch('add_to_cart.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify({ product_id: productId, quantity: quantity }),
                })
                .then(response => response.text())
                .then(data => {
                    console.log('Raw response:', data);
                });
            });
        });
    }

   
     // Simplified updateQuantity function
        function updateQuantity(productId) {
            const quantity = document.getElementById(`quantity-${productId}`).value;

            fetch('update_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ product_id: productId, quantity: quantity }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Failed to update quantity.');
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Simplified removeFromCart function
        function removeFromCart(productId) {
            fetch('remove_from_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ product_id: productId }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Failed to remove item from cart.');
                }
            })
            .catch(error => console.error('Error:', error));
        }

    // Call all setup functions
    setupProductCarousels();
    setupHeaderCarousel();
    setupProductCards();
});
