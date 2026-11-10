<?php
session_start();
include '../../db_conn.php';

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Fetch cart items from the session
$cartItems = $_SESSION['cart'];

// Fetch product details for items in the cart
$productDetails = [];
if (!empty($cartItems)) {
    // Prepare a list of product IDs from the cart using a prepared statement
    $productIds = array_keys($cartItems);
    $placeholders = implode(',', array_fill(0, count($productIds), '?'));

    $stmt = $conn->prepare("SELECT id, name, price, image_url FROM items WHERE id IN ($placeholders)");
    $stmt->bind_param(str_repeat('i', count($productIds)), ...$productIds);
    $stmt->execute();
    $result = $stmt->get_result();

    // Store product details in an array
    while ($row = $result->fetch_assoc()) {
        $productDetails[$row['id']] = $row;
    }

    // Close the statement
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
     <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            box-sizing: border-box;
        }

        h1 {
            color: #333;
            font-size: 24px;
        }

        .cart-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            overflow: auto;
            height: 1440px;
        }

        .cart-header-wrapper {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .cart-table-wrapper {
            height: 1440px;
        }

        .cart-table {
            width: 100%;
            border-collapse: collapse;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .cart-table th, .cart-table td {
            padding: 15px;
            border: 1px solid #e0e0e0;
            text-align: left;
        }

        .cart-table th {
            background-color: #28a745;
            color: white;
            font-weight: bold;
        }

        .cart-table td img {
            width: 100px;
            height: auto;
            border-radius: 5px;
        }

        .cart-quantity-input {
            width: 60px;
            text-align: center;
            padding: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .cart-button {
            padding: 10px 15px;
            margin: 5px;
            font-size: 14px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            
        }

        .cart-button:hover {
            opacity: 0.9;
        }

        .cart-button.remove {
            background-color: #dc3545;
            color: white;
        }

        .cart-button.remove:hover {
            background-color: #c82333;
        }

        .cart-button.primary {
            background-color: white;
            border:1px solid;
            border-color:white;
            border-radius:10px;
            color: #28a745;
        }

        .cart-button.primary:hover {
            background-color: #218838;
            color: white;
        }

        .cart-empty-message {
            text-align: center;
            color: #333;
            font-size: 16px;
        }

        .cart-checkout-button {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-left: auto;
        }

        .cart-checkout-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="cart-container">
        <div class="cart-header-wrapper">
            <h1>Shopping Cart</h1>
            <button class="cart-checkout-button" onclick="location.href='checkout.php'">Proceed to Checkout</button>
        </div>

        <?php if (empty($cartItems)): ?>
            <p class="cart-empty-message">Your cart is empty.</p>
        <?php else: ?>
            <table class="cart-table">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($cartItems as $productId => $quantity): ?>
                        <?php if (isset($productDetails[$productId])): ?>
                            <?php $product = $productDetails[$productId]; ?>
                            <tr>
                                <td><img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>"></td>
                                <td><?php echo htmlspecialchars($product['name']); ?></td>
                                <td><?php echo 'P' . number_format($product['price'], 2); ?></td>
                                <td>
                                    <input type="number" class="cart-quantity-input" id="quantity-<?php echo $productId; ?>" value="<?php echo $quantity; ?>" min="1">
                                </td>
                                <td><?php echo 'P' . number_format($product['price'] * $quantity, 2); ?></td>
                                <td>
                                    <button class="cart-button remove" onclick="removeFromCart(<?php echo $productId; ?>)">Remove</button>
                                    <button class="cart-button primary" onclick="updateQuantity(<?php echo $productId; ?>)">Update</button>
                                </td>
                            </tr>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>

    <script>
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
    </script>
</body>
</html>
