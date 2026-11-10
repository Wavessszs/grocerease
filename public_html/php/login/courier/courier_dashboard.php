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

// Handle order acceptance
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['status'])) {
    $orderId = $_POST['order_id'];
    $newStatus = $_POST['status'];

    // Update the order status and set the courier ID
    $updateSql = "UPDATE orders SET status = ?, courier_id = ? WHERE order_id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param('sii', $newStatus, $userId, $orderId);
    $stmt->execute();
    $stmt->close();

    header('Location: courier_dashboard.php'); // Reload page after accepting the order
    exit();
}

// Fetch orders that are assigned or need attention
$sql = "SELECT orders.order_id, users.full_name, users.address, orders.status, orders.updated_at
        FROM orders
        JOIN users ON orders.user_id = users.id
        WHERE orders.status IN ('pending')
        ORDER BY orders.order_id DESC";

$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$orders = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Close connection
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Courier Dashboard</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
            overflow: hidden; /* Prevent scrolling */
        }

        .header {
            background-color: #28a745;
            color: white;
            padding: 15px 20px;
            text-align: center;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .header img {
            position: absolute;
            left: 20px;
            height: 40px;
        }

        .container {
            display: flex;
            justify-content: center;
            padding: 20px;
            margin: 20px auto;
            max-width: 1200px;
        }

        .main-content {
            flex-grow: 1;
            margin-left: 20px;
            overflow-y: auto; /* Allow vertical scrolling */
            height: 80vh; /* Fixed height for scrolling */
        }

        .card {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            position: relative;
            transition: transform 0.3s ease;
            cursor: pointer; /* Change cursor to pointer */
        }

        .card:hover {
            transform: scale(1.02); /* Slight scale effect on hover */
        }

        .sidebar {
            width: 20%;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: sticky;
            top: 0;
            height: 100vh;
        }

        .sidebar h2 {
            font-size: 1.5em;
            color: #333;
            margin-bottom: 20px;
        }

        .sidebar a {
            color: #333;
            display: block;
            padding: 12px 0;
            font-size: 1.1em;
            text-decoration: none;
            transition: background-color 0.3s ease, padding-left 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #f1f1f1;
            padding-left: 10px;
        }

        .no-orders {
            text-align: center;
            font-size: 1.2em;
            color: #666;
            margin: 30px 0;
        }

        /* Modal Styles */
        .modal {
            display: none; /* Hidden by default */
            position: fixed; 
            z-index: 1000; 
            left: 0;
            top: 0;
            width: 100%; 
            height: 100%; 
            overflow: auto; 
            background-color: rgba(0,0,0,0.6); /* Dark overlay */
            padding-top: 60px; 
        }

        .modal-content {
            background-color: #fff;
            margin: 5% auto; 
            padding: 20px;
            border: 1px solid #888;
            width: 80%; 
            max-width: 600px; 
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
        }

        .modal-title {
            font-size: 1.5em;
            color: #333;
        }

        .modal-body {
            margin-top: 20px;
        }

        .modal-footer {
            display: flex;
            justify-content: flex-end;
            margin-top: 20px;
        }

        .modal-footer button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .modal-footer button:hover {
            background-color: #218838;
        }

        /* Receipt Table Styles */
        .receipt-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .receipt-table th, .receipt-table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .receipt-table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .grand-total {
    font-weight: bold;
    font-size: 1.2em;
    margin-top: 10px;
}

    </style>
    <script>
        function fetchOrderItems(orderId) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "fetch_order_items.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    document.getElementById('order-details-content').innerHTML = xhr.responseText;
                    document.getElementById('accept-order-form').style.display = 'block';
                    document.getElementById('order-id').value = orderId;
                    openModal();
                }
            };
            xhr.send("order_id=" + orderId);
        }

        function openModal() {
            document.getElementById('orderModal').style.display = "block";
        }

        function closeModal() {
            document.getElementById('orderModal').style.display = "none";
        }

        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.card');
            cards.forEach(card => {
                const orderId = card.dataset.orderId;
                card.addEventListener('click', function() {
                    fetchOrderItems(orderId);
                });
            });

            // Close modal when clicking outside of it
            window.onclick = function(event) {
                const modal = document.getElementById('orderModal');
                if (event.target === modal) {
                    closeModal();
                }
            };
        });
    </script>
</head>
<body>

<div class="header">
    <img src="../../../images/logo.png" alt="Logo" />
    <h1>Courier Dashboard</h1>
</div>

<div class="container">
    <!-- Main Content Area -->
    <div class="main-content">
        <?php if (empty($orders)): ?>
            <div class="no-orders">No assigned deliveries at the moment.</div>
        <?php else: ?>
            <?php foreach ($orders as $order): ?>
                <div class="card" data-order-id="<?php echo htmlspecialchars($order['order_id']); ?>">
                    <h3>Order #<?php echo htmlspecialchars($order['order_id']); ?></h3>
                    <p>Customer: <?php echo htmlspecialchars($order['full_name']); ?></p>
                    <p>Address: <?php echo htmlspecialchars($order['address']); ?></p>
                    <p>Status: <?php echo htmlspecialchars($order['status']); ?></p>
                    <p>Updated At: <?php echo htmlspecialchars($order['updated_at']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <!-- Sidebar -->
   <div class="sidebar">
        <h2>Navigation</h2>
        <a href="courier_dashboard.php">Dashboard</a>
        <a href="ongoing_delivery.php">In Transit</a>
        <a href="completed_deliveries.php">Completed Deliveries</a>
        <a href="../../logout.php">Logout</a>
    </div>
</div>

<!-- Modal for Order Details -->
<div id="orderModal" class="modal">
    <div class="modal-content">
        <span class="close" onclick="closeModal()">&times;</span>
        <div class="modal-header">
            <h2 class="modal-title">Order Details</h2>
        </div>
        <div class="modal-body" id="order-details-content"></div>
        <div class="modal-footer">
            <form id="accept-order-form" method="POST" style="display: none;">
                <input type="hidden" name="order_id" id="order-id">
                <input type="hidden" name="status" value="accepted">
                <button type="submit">Accept Order</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>
