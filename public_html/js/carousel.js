// Get the carousel container and items
const carousel = document.querySelector('.carousel');
const items = document.querySelectorAll('.carousel-item');

// Set the current item index
let currentItem = 0;

// Function to scroll to the next item
function scrollToNextItem() {
  // Calculate the next item index
  const nextItem = (currentItem + 1) % items.length;

  // Update the current item index
  currentItem = nextItem;

  // Scroll to the next item
  items.forEach((item, index) => {
    item.style.transform = `translateX(${(index - currentItem) * 100}%)`;
  });
}

// Set the interval to scroll every 5 seconds
setInterval(scrollToNextItem, 5000);

// Initialize the carousel
scrollToNextItem();