<?php
session_start();
include '../../db_conn.php';

// Check if the user is logged in and is a courier
$userId = $_SESSION['user_id'] ?? null;
$userRole = $_SESSION['role'] ?? null;

// Ensure the user is logged in and has the courier role
if (!$userId || $userRole !== 'courier') {
    header('Location: ../login.php'); // Redirect to login if not a courier
    exit();
}

// Handle "Mark as Done" button click
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $orderId = $_POST['order_id'];
    $updateSql = "UPDATE orders SET status = 'done' WHERE order_id = ? AND courier_id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param('ii', $orderId, $userId);
    $stmt->execute();
    $stmt->close();
}

// Fetch ongoing deliveries
$sql = "SELECT orders.order_id, users.full_name, users.address, orders.status, orders.updated_at
        FROM orders
        JOIN users ON orders.user_id = users.id
        WHERE orders.courier_id = ? AND orders.status = 'accepted'
        ORDER BY orders.updated_at DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
$ongoingDeliveries = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Fetch items for each order
$orderItems = [];
foreach ($ongoingDeliveries as $delivery) {
    $orderId = $delivery['order_id'];
    $itemSql = "SELECT items.name,items.EAN, order_items.quantity, order_items.price
                FROM order_items
                JOIN items ON order_items.product_id = items.id
                WHERE order_items.order_id = ?";
    $itemStmt = $conn->prepare($itemSql);
    $itemStmt->bind_param('i', $orderId);
    $itemStmt->execute();
    $itemsResult = $itemStmt->get_result();
    $orderItems[$orderId] = $itemsResult->fetch_all(MYSQLI_ASSOC);
    $itemStmt->close();
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ongoing Deliveries</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fff;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #28a745; /* Green accent */
            color: white;
            padding: 10px 20px;
            text-align: center;
            position: relative;
        }
        .container {
            margin: 20px;
        }
        .card {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }
        .card h3 {
            margin: 0 0 10px;
        }
        .card p {
            margin: 5px 0;
        }
        .items-list {
            margin-top: 10px;
            padding-left: 20px;
        }
        .items-list li {
            margin-bottom: 5px;
        }
        .back-button {
            background-color: #426b1f; /* Green background similar to header */
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
            position: absolute;
            top: 10px;
            left: 10px;
        }
        .back-button:hover {
            background-color: #355a12; /* Darker green on hover */
        }
        .done-button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 15px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 10px;
        }
        .done-button:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>

<div class="header">
    <button class="back-button" onclick="goBack()">Back</button>
    <h1>Ongoing Deliveries</h1>
</div>

<div class="container">
    <h2>Your Ongoing Deliveries</h2>
    <?php if (empty($ongoingDeliveries)): ?>
        <p>No ongoing deliveries at the moment.</p>
    <?php else: ?>
        <?php foreach ($ongoingDeliveries as $delivery): ?>
            <div class="card">
                <h3>Order ID: <?php echo htmlspecialchars($delivery['order_id']); ?></h3>
                <p><strong>Customer:</strong> <?php echo htmlspecialchars($delivery['full_name']); ?></p>
                <p><strong>Address:</strong> <?php echo htmlspecialchars($delivery['address']); ?></p>
                <p><strong>Time In:</strong> <?php echo date("F j, Y, g:i A", strtotime($delivery['updated_at'])); ?></p>
                <p><strong>Status:</strong> <?php echo htmlspecialchars($delivery['status']); ?></p>
                <h4>Items:</h4>
                <ul class="items-list">
                    <?php foreach ($orderItems[$delivery['order_id']] as $item): ?>
<li><?php echo htmlspecialchars($item['name']) . " - Quantity: " . htmlspecialchars($item['quantity']) . " @ $" . number_format($item['price'], 2); ?></li>
<p><strong>EAN:</strong> <?php echo htmlspecialchars($item['EAN']); ?></p>

<?php endforeach; ?>

<!-- Calculate and display the grand total -->
<?php
$grandTotal = 0;
foreach ($orderItems[$delivery['order_id']] as $item) {
    $grandTotal += $item['quantity'] * $item['price']; // Multiply quantity by price and sum it up
}
?>
<p><strong>Grand Total:</strong> $<?php echo number_format($grandTotal, 2); ?></p>

                </ul>
                <!-- Mark as Done Button -->
                <form method="POST" action="">
                    <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($delivery['order_id']); ?>">
                    <button type="submit" class="done-button">Mark as Done</button>
                </form>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</div>

<script>
    function goBack() {
        window.history.back();
    }
</script>

</body>
</html>
