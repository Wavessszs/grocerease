<?php
// Start session


// Include header and database connection
include('../../header.php');
include('../../db_conn.php');

// Ensure user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if user is not logged in
    header("Location: ../login.php");
    exit();
}

// Get user ID from session
$user_id = $_SESSION['user_id'];

// Fetch user details
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Error fetching user details: " . $conn->error);
}

$user = $result->fetch_assoc();
$stmt->close();

// Fetch user's order history with items and courier details
$order_query = "
    SELECT 
        orders.order_id, 
        orders.created_at, 
        orders.updated_at,
        orders.total_amount,
        orders.status,
        orders.courier_id,  -- Include courier_id
        GROUP_CONCAT(items.name SEPARATOR ', ') AS items,
        GROUP_CONCAT(order_items.quantity SEPARATOR ', ') AS quantities,
        couriers.full_name AS courier_name,  -- Get courier details
        couriers.phone AS courier_phone,
        couriers.address AS courier_address
    FROM orders
    JOIN order_items ON orders.order_id = order_items.order_id
    JOIN items ON order_items.product_id = items.id
    LEFT JOIN users AS couriers ON orders.courier_id = couriers.id  -- Join with couriers (users table)
    WHERE orders.user_id = ?
    GROUP BY orders.order_id
    ORDER BY orders.created_at DESC
";
$stmt = $conn->prepare($order_query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$order_result = $stmt->get_result();

if (!$order_result) {
    die("Error fetching order history: " . $conn->error);
}

// Handle "Mark as Done" functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['order_id'])) {
    $order_id = $_POST['order_id'];

    // Prepare statement for updating the order status
    $update_query = "UPDATE orders SET status = 'done' WHERE order_id = ? AND user_id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("ii", $order_id, $user_id);

    if ($update_stmt->execute()) {
        echo "<script>
                alert('Order status updated successfully!');
                window.location.href = window.location.href;
              </script>";
    } else {
        die("Error updating order status: " . $update_stmt->error);
    }
    $update_stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
      <style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #eafaf1; /* Light green background */
    color: #333;
    margin: 0;
    padding: 0;
}

.dashboard-container {
    padding: 20px;
    padding-top: 100px;
    max-width: 1440px;
    margin: 20px auto;
    background: #ffffff; /* White background for the dashboard */
    border-radius: 8px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    display: flex; 
    flex-direction: row; /* Ensure elements are aligned horizontally */
}

.profile-section { 
    flex: 0 0 30%; /* 30% width for Profile Section */
    margin-right: 20px; /* Space between sections */
    padding: 20px;
    background: #f9f9f9; /* Slightly off-white background */
    border-radius: 8px;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
}

.order-history-section {
    flex: 1; /* Remaining space (70%) for Order History Section */
    padding: 20px;
    background: #f9f9f9; /* Slightly off-white background */
    border-radius: 8px;
    box-shadow: 0 1px 5px rgba(0, 0, 0, 0.1);
}

h1 {
    
    color:  #4caf50; /* Dark text color */
    
         padding-bottom: 10px;
    margin-bottom:30px;
}

h2 {
    border-bottom: 2px solid #4caf50; /* Green border */
    padding-bottom: 10px;
    margin-bottom: 20px;
    color: #4caf50; /* Green color */
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

table th, table td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
    vertical-align: top;
}

table th {
    background-color: #4caf50; /* Green header */
    color: #fff;
}

a {
    color: #4caf50; /* Green link color */
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

.mark-done-btn {
    padding: 8px 12px;
    background-color: #388e3c; /* Darker green */
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.mark-done-btn:hover {
    background-color: #2e7d32; /* Even darker green on hover */
}

@media (max-width: 600px) {
    .dashboard-container {
        flex-direction: column; /* Stack sections on smaller screens */
    }

    .profile-section, .order-history-section {
        flex: 1 1 100%; /* Full width for each section */
        margin-right: 0; /* Remove right margin */
        margin-bottom: 20px; /* Space below each section */
    }

    h1 {
        font-size: 1.5rem;
    }

    table th, table td {
        padding: 8px;
    }
}

    </style>
</head>
<body>

<div class="dashboard-container">


    <!-- Profile Overview Section -->
    <div class="profile-section">
        <h1>Welcome, <?php echo htmlspecialchars($user['full_name']); ?></h1>
        <h2>Profile Information</h2>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($user['username']); ?></p>
        <p><strong>Full Name:</strong> <?php echo htmlspecialchars($user['full_name']); ?></p>
        <p><strong>Phone Number:</strong> <?php echo htmlspecialchars($user['phone']); ?></p>
        <p><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></p>

        <h2>Account Settings</h2>
        <a href="edit_profile.php" style="margin-right: 20px;">Edit Profile</a>
                
        <a href="../../logout.php">Log out</a>
    </div>

    <!-- Order History Section -->
    <div class="order-history-section">
        <h2>Order History</h2>
        <table>
            <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Updated</th>
                <th>Status</th>
                <th>Total Amount</th>
                <th>Items</th>
                <th>Courier Details</th>
                <th>Action</th>
            </tr>
            <?php while($order = $order_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                    <td><?php echo date("F j, Y, g:i A", strtotime($order['created_at'])); ?></td>
                    <td><?php echo date("F j, Y, g:i A", strtotime($order['updated_at'])); ?></td>

                    <td><?php echo htmlspecialchars($order['status']); ?></td>
                    <td><?php echo htmlspecialchars($order['total_amount']); ?></td>
                    <td>
                        <ul>
                            <?php 
                            $items = explode(', ', $order['items']);
                            $quantities = explode(', ', $order['quantities']);
                            foreach($items as $index => $item_name) {
                                echo "<li>" . htmlspecialchars($item_name) . " - Quantity: " . htmlspecialchars($quantities[$index]) . "</li>";
                            }
                            ?>
                        </ul>
                    </td>
                    <td>
                        <?php if ($order['courier_name']): ?>
                            <strong>Courier Name:</strong> <?php echo htmlspecialchars($order['courier_name']); ?><br>
                            <strong>Phone:</strong> <?php echo htmlspecialchars($order['courier_phone']); ?><br>
                            <strong>Address:</strong> <?php echo htmlspecialchars($order['courier_address']); ?>
                        <?php else: ?>
                            No courier assigned yet.
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($order['status'] === 'accepted'): ?>
                            <form method="POST" action="user_profile.php">
                                <input type="hidden" name="order_id" value="<?php echo htmlspecialchars($order['order_id']); ?>">
                                <button type="submit" class="mark-done-btn">Mark as Done</button>
                            </form>
                        <?php elseif ($order['status'] === 'pending'): ?>
                            Pending
                        <?php else: ?>
                            Completed
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </div>



</div>

</body>
</html>

<?php
// Close the database connection
$conn->close();
?>
