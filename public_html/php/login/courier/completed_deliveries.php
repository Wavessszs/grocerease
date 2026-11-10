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

// Fetch completed deliveries
$sql = "SELECT orders.order_id, users.full_name, users.address, orders.status, orders.updated_at
        FROM orders
        JOIN users ON orders.user_id = users.id
        WHERE orders.courier_id = ? AND orders.status = 'done'
        ORDER BY orders.updated_at DESC";

$stmt = $conn->prepare($sql);
$stmt->bind_param('i', $userId);
$stmt->execute();
$result = $stmt->get_result();
$completedDeliveries = $result->fetch_all(MYSQLI_ASSOC);
$stmt->close();

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Deliveries</title>
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
        }
        .container {
            margin: 20px;
        }
        .card {
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #28a745;
            color: white;
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
        }

        .back-button:hover {
            background-color: #355a12; /* Darker green on hover */
        }

        /* Style for Back Link */
        .back-link {
            display: inline-block;
            text-decoration: none;
            background-color: #426b1f; /* Green background similar to header */
            color: #fff;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            margin-top: 20px;
        }

        .back-link:hover {
            background-color: #355a12; /* Darker green on hover */
        }

        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
    </style>
</head>
<body>

<div class="header">
    <button class="back-button" onclick="goBack()">Back</button>
    <h1>Completed Deliveries</h1>
</div>

<div class="container">
    <div class="card">
        <h2>Your Completed Deliveries</h2>
        <?php if (empty($completedDeliveries)): ?>
            <p>No completed deliveries at the moment.</p>
        <?php else: ?>
            <table>
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Address</th>
                        <th>Date Completed</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($completedDeliveries as $delivery): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($delivery['order_id']); ?></td>
                            <td><?php echo htmlspecialchars($delivery['full_name']); ?></td>
                            <td><?php echo htmlspecialchars($delivery['address']); ?></td>
                            <td><?php echo date("F j, Y, g:i A", strtotime($delivery['updated_at'])); ?></td>
                            <td><?php echo htmlspecialchars($delivery['status']); ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</div>

</body>
   <script>
        function goBack() {
            window.history.back();
        }
    </script>
</html>
