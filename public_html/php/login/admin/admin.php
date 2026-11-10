<?php
include '../../db_conn.php';
session_start();

$userId = $_SESSION['user_id'] ?? null;
$userRole = $_SESSION['role'] ?? null;
$adminName = $_SESSION['username'] ?? null; 

// Ensure the user is logged in and has the admin role
if (!$userId || $userRole !== 'admin') {
    header('Location: ../login.php'); // Redirect to login if not an admin
    exit();
}

// Fetch metrics for the dashboard
$orders_count_query = "SELECT COUNT(*) AS total_orders FROM orders WHERE status = 'done'";
$orders_count_result = $conn->query($orders_count_query);
$total_orders = $orders_count_result->fetch_assoc()['total_orders'];

$users_count_query = "SELECT COUNT(*) AS total_users FROM users";
$users_count_result = $conn->query($users_count_query);
$total_users = $users_count_result->fetch_assoc()['total_users'];

$items_count_query = "SELECT COUNT(*) AS total_items FROM items";
$items_count_result = $conn->query($items_count_query);
$total_items = $items_count_result->fetch_assoc()['total_items'];

$total_sales_query = "SELECT SUM(total_amount) AS total_sales FROM orders";
$total_sales_result = $conn->query($total_sales_query);
$total_sales = $total_sales_result->fetch_assoc()['total_sales'];

$avg_purchase_price_query = "SELECT AVG(total_amount) AS avg_purchase_price FROM orders";
$avg_purchase_price_result = $conn->query($avg_purchase_price_query);
$avg_purchase_price = $avg_purchase_price_result->fetch_assoc()['avg_purchase_price'];

$avg_user_registration_time_query = "SELECT AVG(TIMESTAMPDIFF(DAY, created_at, NOW())) AS avg_registration_time FROM users";
$avg_user_registration_time_result = $conn->query($avg_user_registration_time_query);
$avg_registration_time = $avg_user_registration_time_result->fetch_assoc()['avg_registration_time'];

// Fetch recent orders for the activity log
$recent_orders_query = "SELECT o.order_id, u.username, o.created_at, o.total_amount, o.status 
                         FROM orders o 
                         JOIN users u ON o.user_id = u.id 
                         ORDER BY o.created_at DESC LIMIT 5";
$recent_orders_result = $conn->query($recent_orders_query);
?>

<?php include 'admin_header.php'; ?>

<!-- Material UI Dashboard -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

<div class="main-content container-fluid">
    <h1>Dashboard</h1>
    <p>Welcome, <?php echo htmlspecialchars($adminName); ?>! Here's a summary of the store's performance:</p>

    <div class="row">
        <!-- Total Orders -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Total Delivered Orders</span>
                    <div class="center">
                        <h2><?php echo $total_orders; ?></h2>
                        <div class="progress">
                            <div class="determinate" style="width: <?php echo ($total_orders / 100) * 100; ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Users -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Total Registered Users</span>
                    <div class="center">
                        <h2><?php echo $total_users; ?></h2>
                        <div class="progress">
                            <div class="determinate" style="width: <?php echo ($total_users / 100) * 100; ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Total Items -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Total Items Available</span>
                    <div class="center">
                        <h2><?php echo $total_items; ?></h2>
                        <div class="progress">
                            <div class="determinate" style="width: <?php echo ($total_items / 100) * 100; ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Total Sales -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Total Sales Amount</span>
                    <div class="center">
                        <h2><?php echo number_format($total_sales, 2); ?> $</h2>
                        <div class="progress">
                            <div class="determinate" style="width: <?php echo ($total_sales / 10000) * 100; ?>%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Average Purchase Price -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Average Purchase Price</span>
                    <div class="center">
                        <h2><?php echo number_format($avg_purchase_price, 2); ?> $</h2>
                    </div>
                </div>
            </div>
        </div>

        <!-- Average User Registration Time -->
        <div class="col s12 m4">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Average Registration Time</span>
                    <div class="center">
                        <h2><?php echo number_format($avg_registration_time, 2); ?> days</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <h2>Recent Orders</h2>
    <table class="highlight">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Username</th>
                <th>Date</th>
                <th>Total Amount</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($recent_orders_result->num_rows > 0): ?>
                <?php while ($order = $recent_orders_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                        <td><?php echo htmlspecialchars($order['username']); ?></td>
                        <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                        <td><?php echo htmlspecialchars($order['total_amount']); ?></td>
                        <td><?php echo htmlspecialchars($order['status']); ?></td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No recent orders found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<?php include 'footer.php'; ?>
<?php $conn->close(); ?>
