<?php
// Connect to the database
include '../../header.php';
include '../../db_conn.php';
include 'product_cards.php';

// Get product ID from URL
$product_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($product_id <= 0) {
    echo "Invalid product ID!";
    exit;
}

// Fetch product details from the database
$query = "SELECT * FROM items WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    echo "Product not found!";
    exit;
}
?>

<!-- HTML Product Details -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?></title>
    <style>
        /* Add your styles */
       /* General Styles */
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding-top: 100px;
    background-color: #f8f9fa; /* Light background */
    color: #333;
}

.container {
    display: flex;
    justify-content: center;
    align-items: flex-start; /* Align items at the top */
    max-width: 900px;
    margin: 20px auto; /* Add margin for spacing */
    padding: 20px;
    background-color: white; /* White background for the container */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
}

/* Product Image */
.product-image {
    width: 50%;
    padding-bottom: 50%; /* Aspect ratio */
    background-image: url('<?php echo htmlspecialchars($product['image_url']); ?>');
    background-size: cover;
    background-position: center;
    margin-right: 20px;
    border-radius: 8px; /* Rounded corners */
}

/* Product Details */
.product-details {
    width: 50%;
}

.product-info h1 {
    font-size: 24px;
    margin-bottom: 10px;
    color: #4CAF50; /* Green color for headings */
}

.product-info p {
    margin-bottom: 10px;
}

.product-info h3 {
    margin-bottom: 20px;
    color: #777; /* Subtle color for secondary headings */
}

/* Quantity Control */
.quantity-control {
    display: flex;
    align-items: center;
    margin-bottom: 10px;
}

.quantity-control input {
    width: 40px;
    text-align: center;
    border: 1px solid #ccc; /* Subtle border */
    border-radius: 4px; /* Rounded corners */
    margin: 0 5px; /* Margin for spacing */
}

.quantity-control button {
    padding: 10px;
    width: 40px;
    text-align: center;
    margin: 0 5px;
    cursor: pointer;
    background-color: #4CAF50; /* Green button */
    color: white;
    border: none;
    border-radius: 4px; /* Rounded corners */
    transition: background-color 0.3s;
}

.quantity-control button:hover {
    background-color: #388E3C; /* Darker green on hover */
}

/* Buttons Section */
.buttons {
    display: flex;
    justify-content: flex-start;
    gap: 10px;
    margin-top: 20px;
    
}

.btn {
    padding: 10px 20px;
    cursor: pointer;
    border: none;
    color: white;
    background-color: #4CAF50; /* Green button */
    flex-grow: 1; /* Makes the buttons take equal width */
    text-align: center;
    border-radius: 4px; /* Rounded corners */
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #388E3C; /* Darker green on hover */
}

/* Product Carousel Styles */
.product-carousel-container {
    position: relative;
    width: 100%;
    padding: 5px;
    background-color: #fff; /* White background */
    overflow: hidden; /* Hide overflow */
}

.product-carousel {
    display: flex;
    transition: transform 0.5s ease-in-out; /* Smooth transition */
}

/* Product Card Styles */
.product-card {
    flex: 0 0 calc(20% - 10px); /* Adjust to 5 cards per view */
    margin-right: 5px;
    background-color: white;
    border: 1px solid #ddd; /* Subtle border */
    border-radius: 8px; /* Rounded corners */
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    text-align: center;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: box-shadow 0.3s; /* Hover effect */
}

.product-card:hover {
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2); /* Enhance hover */
}

.product-card img {
    width: 100%;
    height: 200px; /* Adjusted height */
    object-fit: cover; /* Maintain aspect ratio */
    border-radius: 8px 8px 0 0; /* Rounded top corners */
}

.product-card h3 {
    font-size: 1em; /* Adjusted font size */
    margin: 8px 0; /* Reduced margin */
}

.product-card p {
    color: #555; /* Dark gray */
    font-size: 0.9em; /* Adjusted font size */
    padding: 0 8px; /* Reduced padding */
    flex-grow: 1;
}





.price {
    font-weight: bold;
    color: #4CAF50; /* Green price */
    font-size: 1em; /* Adjusted font size */
    margin: 8px 0; /* Reduced margin */
}

/* Navigation Buttons */
.nav-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: rgba(0, 0, 0, 0.5);
    color: white;
    border: none;
    padding: 8px; /* Reduced padding */
    cursor: pointer;
    z-index: 10;
    border-radius: 50%;
    transition: background-color 0.3s;
}

.nav-button:hover {
    background-color: rgba(0, 0, 0, 0.7); /* Darker hover */
}

.nav-button.left {
    left: 10px;
}

.nav-button.right {
    right: 10px;
}

.quantity-selector {
    display: flex;
    justify-content: center;
    align-items: center;
    margin: 8px 0; /* Reduced margin */
}

.quantity-selector button {
    width: 25px; /* Adjusted width */
    height: 25px; /* Adjusted height */
    border: none;
    background-color: #ddd;
    cursor: pointer;
    font-size: 16px; /* Adjusted font size */
}

.quantity-selector span {
    margin: 0 8px; /* Reduced margin */
    font-size: 0.9em; /* Adjusted font size */
    width: 20px;
    text-align: center;
}

/* Add to Cart Button */
.add-to-cart {
    background-color: #4CAF50;
    color: white;
    border: none;
    padding: 8px; /* Reduced padding */
    cursor: pointer;
    width: 100%;
    border-bottom-left-radius: 5px;
    border-bottom-right-radius: 5px;
    font-size: 0.9em; /* Adjusted font size */
    transition: background-color 0.3s ease;
}

.add-to-cart:hover {
    background-color: #45a049; /* Darker on hover */
}

/* Responsive Design */
@media (max-width: 1200px) {
    .product-card {
        flex: 0 0 25%; /* 4 cards per row */
        margin-right: 2%;
    }
}

@media (max-width: 992px) {
    .product-card {
        flex: 0 0 33%; /* 3 cards per row */
        margin-right: 3%;
    }
}

@media (max-width: 768px) {
    .product-card {
        flex: 0 0 50%; /* 2 cards per row */
        margin-right: 5%;
    }

    .nav-button {
        padding: 6px; /* Reduced padding */
    }
}

@media (max-width: 480px) {
    .product-card {
        flex: 0 0 100%; /* 1 card per row */
        margin-right: 0;
    }

    .nav-button {
        padding: 4px; /* Reduced padding */
    }
}
    
    </style>
</head>
<body>
    <div class="container">
        <div class="product-image"></div>
        <div class="product-details">
            <div class="product-info">
                <h1><?php echo htmlspecialchars($product['name']); ?></h1>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
                <p><strong>Distributor:</strong><?php echo htmlspecialchars($product['distributor']); ?></p>
                <p><strong>EAN:</strong> <?php echo htmlspecialchars($product['EAN']); ?></p>
                
                <p><strong>Available in:</strong><?php echo htmlspecialchars($product['location']); ?></p>
                <p><strong>Stock Quantity:</strong> <?php echo htmlspecialchars($product['stock_quantity']); ?></p>
                <h3>PHP<?php echo number_format($product['price'], 2); ?></h3>
            </div>

            <!-- Quantity Adjustment & Add to Cart -->
            <div class="buttons">
                <div class="quantity-control">
                    <button type="button" onclick="decrementQuantity()">-</button>
                    <input type="number" id="quantity" name="quantity" value="1" min="1">
                    <button type="button" onclick="incrementQuantity()">+</button>
                </div>
                <button class="btn" onclick="addToCart(<?php echo $product['id']; ?>)">Add to Cart</button>
            </div>
        </div>
    </div>

    <!-- Product Carousel -->
    <div class="product-carousel-container">
        <h2>Recommended Products for You:</h2>
        <div class="nav-button left" style="display: none;">&lt;</div>
        <div class="product-carousel">
            <?php renderProductCarousel($product['category'], $conn); ?>
        </div>
        <div class="nav-button right">&gt;</div>
    </div>

    <script>
        // Quantity Increment/Decrement Logic
        function incrementQuantity() {
            var quantityInput = document.getElementById("quantity");
            quantityInput.value = parseInt(quantityInput.value) + 1;
        }

        function decrementQuantity() {
            var quantityInput = document.getElementById("quantity");
            if (quantityInput.value > 1) {
                quantityInput.value = parseInt(quantityInput.value) - 1;
            }
        }

        // Add to Cart Function
        function addToCart(productId) {
            var quantity = document.getElementById("quantity").value;

            fetch('add_to_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    product_id: productId,
                    quantity: quantity
                })
            })
            .then(response => response.json())
            .then(data => {
                alert(data.message);
                if (data.success) {
                    // Optionally, update cart display or UI here
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Setup Product Carousels
        function setupProductCarousels() {
            const carousels = document.querySelectorAll('.product-carousel-container');
            carousels.forEach(carouselContainer => {
                const carousel = carouselContainer.querySelector('.product-carousel');
                const leftButton = carouselContainer.querySelector('.nav-button.left');
                const rightButton = carouselContainer.querySelector('.nav-button.right');
                
                let currentIndex = 0;
                const cardsToShow = 4;
                const cardWidth = carouselContainer.querySelector('.product-card').offsetWidth + 10;
                const totalCards = carouselContainer.querySelectorAll('.product-card').length;
                
                function calculateMaxIndex() {
                    return Math.ceil(totalCards / cardsToShow) - 1;
                }

                function updateButtonVisibility() {
                    const maxIndex = calculateMaxIndex();
                    leftButton.style.display = currentIndex <= 0 ? 'none' : 'block';
                    rightButton.style.display = currentIndex >= maxIndex ? 'none' : 'block';
                }

                function scrollCarousel() {
                    const scrollAmount = currentIndex * cardWidth * cardsToShow;
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
                    if (currentIndex < calculateMaxIndex()) {
                        currentIndex++;
                        scrollCarousel();
                    }
                });

                updateButtonVisibility(); // Initialize visibility
            });
        }

        // Initialize carousel setup
        setupProductCarousels();
    </script>
     <script src="../../../js/welcome.js"></script>
</body>
</html>
