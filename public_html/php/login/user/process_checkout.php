<?php

include '../../db_conn.php';
include 'product_cards.php';
include '../../header.php';

// Check if the cart is not empty and the user is logged in
if (empty($_SESSION['cart']) || !isset($_SESSION['user_id'])) {
    echo "Error: Your cart is empty or you're not logged in.";
    exit;
}

// Fetch the cart items and user ID
$cartItems = $_SESSION['cart'];
$userId = $_SESSION['user_id'];

// Get the submitted form data
$fullName = $_POST['full_name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

// Calculate the total amount
$totalAmount = 0;
$productDetails = [];

// Extract product IDs from the cart
$productIds = implode(',', array_keys($cartItems));

// Query to get product prices from the database
$sql = "SELECT id, price FROM items WHERE id IN ($productIds)";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $productId = $row['id'];
    $price = $row['price'];
    $productDetails[$productId] = $price;
    $totalAmount += $price * $cartItems[$productId];
}

// Insert the order into the orders table with status "Pending"
$sql = "INSERT INTO orders (user_id, full_name, address, phone, total_amount, status)
        VALUES (?, ?, ?, ?, ?, 'pending')";
$stmt = $conn->prepare($sql);
$stmt->bind_param("isssd", $userId, $fullName, $address, $phone, $totalAmount);

if ($stmt->execute()) {
    $orderId = $stmt->insert_id;

    // Insert each item from the cart into the order_items table
    foreach ($cartItems as $productId => $quantity) {
        $price = $productDetails[$productId];
        $sql = "INSERT INTO order_items (order_id, product_id, quantity, price)
                VALUES (?, ?, ?, ?)";
        $stmtItem = $conn->prepare($sql);
        $stmtItem->bind_param("iiid", $orderId, $productId, $quantity, $price);
        $stmtItem->execute();
        $stmtItem->close();
    }

    // Clear the cart session after successful order
    unset($_SESSION['cart']);
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Order Confirmation</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
                margin: 20px;
                color: #333;
            }
            .container {
                max-width: 100%;
                margin: auto;
                background-color: #ffffff;
                border-radius: 10px;
                padding: 20px;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
            h1 {
                color: #28a745; /* Green color for headings */
                margin-bottom: 20px;
            }
            .message {
                font-size: 1.2em;
                margin-bottom: 20px;
                color: #555;
            }
            .total {
                font-size: 1.5em;
                font-weight: bold;
                color: #28a745; /* Green color for total */
            }

/* Product Carousel Styles */

/* Product Carousel Styles */
.product-carousel-container {
    position: relative;
    max-width: 100%;
    padding: 5px;
    background-color: #f5f5f5; /* Light gray background for contrast */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Soft shadow */
    overflow: hidden;
}

.product-carousel {
    display: flex;
    transition: transform 0.5s ease-in-out; /* Smooth transition for scrolling */
}

/* Product Card Styles */
.product-card {
    flex: 0 0 calc(20% - 10px); /* Adjust to 5 cards per view */
    margin-right: 5px;
    background-color: white;
    border: 1px solid #ccc;
    border-radius: 10px; /* More rounded corners */
    box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
    text-align: center;
    cursor: pointer;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    transition: box-shadow 0.3s ease; /* Subtle hover effect */
}

.product-image-container {
    position: relative; /* Important for discount photo overlay */
    width: 100%;
}

/* Position the discount photo in the top-left corner */
.discount-photo {
    position: absolute;
    top: 10px;
    left: 10px;
    max-width: 20%; /* Adjust size as necessary */
    max-height: 20%;
    z-index: 4; /* Ensure it appears above the product image */
    display: inline-block; /* Ensures the ::before element behaves properly */
    vertical-align: middle;
}

/* Bookmark background */
.discount-photo::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: #ffcc00; /* Bookmark background color */
    clip-path: polygon(0 0, 100% 0, 100% 70%, 50% 100%, 0 70%); /* Creates bookmark shape */
    z-index: 3; /* Places it behind the logo */
    border-radius: 5px; /* Optional: soften the edges */
    box-sizing: border-box; /* Ensures padding/margins are included */
}

.product-card:hover {
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.2); /* Enhanced hover */
}

.product-card img {
    width: 100%;
    height: 250px; /* Adjusted height */
    object-fit: cover; /* Changed to cover for better fitting */
    border-top-left-radius: 10px; /* Rounded top corners */
    border-top-right-radius: 10px; /* Rounded top corners */
}

.product-card h3 {
    font-size: 1em; /* Adjusted font size */
    margin: 8px 0; /* Reduced margin */
}

.product-card p {
    color: #555;
    font-size: 0.9em; /* Adjusted font size */
    padding: 0 8px; /* Reduced padding */
    flex-grow: 1;
}

.price {
    font-weight: bold;
    color: #4CAF50; /* Green color for price */
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
.carousel-title{
    margin-right:auto;
}
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Order Placed Successfully!</h1>
            <p class="message">Thank you, <?php echo htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8'); ?>! Your order has been successfully placed.</p>
            <p class="total">Total Amount: P<?php echo number_format($totalAmount, 2); ?></p>

            <div class="carousel-title">
                <h2>Recommended Products</h2>
            </div>
            <div class="product-carousel-container">
            <button class="nav-button left">&#10094;</button>
            <div class="product-carousel">
                <?php getRandomProducts($conn); ?>
            </div>
            <button class="nav-button right">&#10095;</button>
            </div>

        </div>
    </body>
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
    </html>

    <?php
} else {
    echo "Error placing the order: " . $conn->error;
}

$stmt->close();
$conn->close();
?>
