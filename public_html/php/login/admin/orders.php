<?php
include '../../db_conn.php';
session_start();

$userId = $_SESSION['user_id'] ?? null;
$userRole = $_SESSION['role'] ?? null;

// Ensure the user is logged in and has the admin role
if (!$userId || $userRole !== 'admin') {
    header('Location: ../login.php');
    exit();
}

// Fetch latest orders
$orders_query = "
    SELECT o.order_id, o.created_at, o.total_amount, u.username 
    FROM orders o 
    JOIN users u ON o.user_id = u.id 
    ORDER BY o.created_at DESC
";
$orders_result = $conn->query($orders_query);
?>

<?php include 'admin_header.php'; ?>

<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f0f0;
    color: #333;
    padding: 50px 0;
}

.container {
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding-left: 100px;
    padding-right: 100px;
}

h1 {
    text-align: left;
    color: #444;
    margin-bottom: 30px;
    font-size: 2em;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th, table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

table th {
    background-color: #f8f8f8;
    color: #444;
}

button {
    padding: 10px 20px;
    margin-top: 10px;
    border: none;
    border-radius: 4px;
    color: white;
    background-color: green;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: white;
    color: green;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    width: 80%;
    max-width: 600px;
}

.close-btn {
    float: right;
    font-size: 24px;
    cursor: pointer;
}

.order-items {
    margin-top: 30px;
}
</style>

<div class="container">
    <h1>Latest Orders</h1>

    <!-- Table to display orders -->
    <table>
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Customer</th>
                <th>Order Date</th>
                <th>Total Amount</th>
                <th>Details</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($orders_result->num_rows > 0): ?>
                <?php while ($order = $orders_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($order['order_id']); ?></td>
                        <td><?php echo htmlspecialchars($order['username']); ?></td>
                        <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                        <td><?php echo htmlspecialchars($order['total_amount']); ?></td>
                        <td>
                            <button onclick="openModal(<?php echo htmlspecialchars($order['order_id']); ?>)">View Items</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5">No orders found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Modal for displaying order items -->
    <div id="orderModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <div id="orderDetails">
                <!-- Order items will be loaded here -->
                <h2>Items for Order #<span id="order-id"></span></h2>
                <table id="order-items-table">
                    <thead>
                        <tr>
                            <th>Item ID</th>
                            <th>Product Name</th>
                            <th>Quantity</th>
                            <th>Price</th>
                        </tr>
                    </thead>
                    <tbody id="order-items-body">
                        <!-- Order items will be populated via JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
function openModal(orderId) {
    document.getElementById('order-id').innerText = orderId; // Set the order ID in the modal
    document.getElementById('order-items-body').innerHTML = ''; // Clear previous items

    // Fetch order items via AJAX
    fetch(`get_order_items.php?order_id=${orderId}`)
        .then(response => response.json())
        .then(data => {
            data.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>${item.id}</td>
                    <td>${item.name}</td>
                    <td>${item.quantity}</td>
                    <td>${item.price}</td>
                `;
                document.getElementById('order-items-body').appendChild(row);
            });
            document.getElementById('orderModal').style.display = 'flex'; // Show the modal
        })
        .catch(error => console.error('Error fetching order items:', error));
}

function closeModal() {
    document.getElementById('orderModal').style.display = 'none';
}
</script>

<?php include 'footer.php'; ?>
<?php $conn->close(); ?>
