<?php
session_start();
include '../../db_conn.php';

// Fetch cart items from the session
$cartItems = $_SESSION['cart'] ?? [];

// Fetch user information from the session (assuming you store the logged-in user's ID)
$userId = $_SESSION['user_id'] ?? null;
$userInfo = [];

// Fetch user details if userId is available
if ($userId) {
    $sql = "SELECT full_name, address, phone FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    $userInfo = $result->fetch_assoc();
    $stmt->close();
}

// Use fallback values for user info
$fullName = $userInfo['full_name'] ?? '';
$address = $userInfo['address'] ?? '';
$phone = $userInfo['phone'] ?? '';

// Fetch product details for items in the cart
$productDetails = [];
$totalAmount = 0;

if (!empty($cartItems)) {
    // Fetch product IDs
    $productIds = array_keys($cartItems);
    $productIdsPlaceholders = implode(',', array_fill(0, count($productIds), '?'));

    // Query to fetch product details
    $sql = "SELECT id, name, price, image_url FROM items WHERE id IN ($productIdsPlaceholders)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param(str_repeat('i', count($productIds)), ...$productIds);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $productId = $row['id'];
        $productDetails[$productId] = $row;
        $totalAmount += $row['price'] * $cartItems[$productId];
    }
    $stmt->close();
}

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa; /* Light gray background */
            margin: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #ffffff; /* White background for table */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4; /* Light grey background for headers */
        }
        .quantity-input {
            width: 50px;
            text-align: center;
        }
        .total {
            font-size: 1.5em;
            font-weight: bold;
            text-align: right;
            color: #28a745; /* Green color for total */
        }
        .form-section {
            margin-bottom: 20px;
        }
        button {
            padding: 10px 20px;
            background-color: #28a745; /* Green background */
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
        }
        button:hover {
            background-color: #218838; /* Darker green on hover */
            opacity: 0.8;
        }
        label {
            color: #333; /* Dark grey for labels */
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        textarea {
            resize: vertical;
        }
        #account-info-section {
            display: none;
        }
        h1, h2 {
            color: #28a745; /* Green for headings */
        }
        .button-container {
            display: flex;
            justify-content: flex-end; /* Aligns button to the right */
            margin-top: 20px; /* Adds space above the button */
        }
    </style>
    <script>
        function toggleAccountInfo() {
            const useOwnInfo = document.getElementById('use_own_info').checked;
            const accountInfoSection = document.getElementById('account-info-section');
            if (useOwnInfo) {
                accountInfoSection.style.display = 'none';
                // Automatically fill in the user's info
                fillUserInfo();
            } else {
                accountInfoSection.style.display = 'block';
            }
        }

        // Prefill the form with user's saved info when "Use Own Account Info" is checked
        function fillUserInfo() {
            const fullName = "<?php echo htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8'); ?>";
            const address = "<?php echo htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?>";
            const phone = "<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>";
            document.getElementById('full_name').value = fullName;
            document.getElementById('address').value = address;
            document.getElementById('phone').value = phone;
        }
    </script>
</head>
<body>
    <h1>Checkout</h1>

    <?php if (empty($cartItems)): ?>
        <p>Your cart is empty.</p>
    <?php else: ?>
        <h2>Order Summary</h2>
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($cartItems as $productId => $quantity): ?>
                    <?php if (isset($productDetails[$productId])): ?>
                        <?php $product = $productDetails[$productId]; ?>
                        <tr>
                            <td><img src="<?php echo htmlspecialchars($product['image_url'], ENT_QUOTES, 'UTF-8'); ?>" alt="<?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?>" style="width: 100px;"></td>
                            <td><?php echo htmlspecialchars($product['name'], ENT_QUOTES, 'UTF-8'); ?></td>
                            <td><?php echo 'P' . number_format($product['price'], 2); ?></td>
                            <td><?php echo $quantity; ?></td>
                            <td><?php echo 'P' . number_format($product['price'] * $quantity, 2); ?></td>
                        </tr>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="total">Total: P<?php echo number_format($totalAmount, 2); ?></div>

        <h2>Shipping Information</h2>
        <label>
            <input type="checkbox" id="use_own_info" onclick="toggleAccountInfo();" checked>
            Use Own Account Info
        </label>

        <!-- Space added after the "Use Own Account Info" checkbox -->
        <div style="margin-bottom: 20px;"></div>

        <!-- Form for entering shipping info manually -->
        <form action="process_checkout.php" method="post">
            <div id="account-info-section">
                <div class="form-section">
                    <label for="full_name">Full Name:</label><br>
                    <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($fullName, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>

                <div class="form-section">
                    <label for="address">Shipping Address:</label><br>
                    <textarea id="address" name="address" rows="4" required><?php echo htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?></textarea>
                </div>

                <div class="form-section">
                    <label for="phone">Phone Number:</label><br>
                    <input type="text" id="phone" name="phone" value="<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>" required>
                </div>
            </div>

            <div class="button-container">
                <button type="submit">Place Order</button>
            </div>
        </form>
    <?php endif; ?>
</body>
</html>
