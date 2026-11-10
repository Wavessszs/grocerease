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

// Fetch product data
$product_query = "SELECT * FROM items";
$product_result = $conn->query($product_query);
?>

<?php include 'admin_header.php'; ?>

<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f0f0;
    color: #333;
    margin-top: 50px;
    padding: 0;
}

.container-fluid {
    padding: 20px;
    margin: auto;
    max-width: 1200px;
}

h1 {
    text-align: center;
    color: #444;
    margin-bottom: 30px;
    font-size: 2.5em;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 40px;
    background-color: #fff;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
}

.table thead th {
    background-color: #e0e0e0;
    color: #444;
    padding: 15px;
    text-align: left;
}

.table tbody td {
    padding: 15px;
    border-bottom: 1px solid #ddd;
    text-align: left;
    color: #555;
    background-color: white;
}

.table tbody td img {
    max-width: 80px;
    height: auto;
    border-radius: 4px;
}

.actions {
    display: flex;
    flex-direction: row; /* Keep buttons side by side */
    gap: 10px; /* Space between buttons */
    justify-content: center; /* Center buttons horizontally */
    align-items: center; /* Center items vertically within the cell */
    height: 100%; /* Use the full height of the cell */
}

.button {
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    color: white;
    cursor: pointer;
    font-size: 14px;
    transition: background-color 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Add a subtle shadow */
}

.button.update {
    background-color: #28A745; /* Green for Update */
}

.button.update:hover {
    background-color: #218838; /* Darker green on hover */
}

.button.delete {
    background-color: #DC3545; /* Red for Delete */
}

.button.delete:hover {
    background-color: #c82333; /* Darker red on hover */
}
</style>

<div class="main-content container-fluid">
    <h1>Products</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Image URL</th>
                <th>EAN</th>
                <th>Category</th>
                <th>Tags</th>
                <th>Stock Quantity</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($product = $product_result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($product['id']); ?></td>
                    <td><?php echo htmlspecialchars($product['name']); ?></td>
                    <td><?php echo htmlspecialchars($product['description']); ?></td>
                    <td><?php echo htmlspecialchars($product['price']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="Product Image"></td>
                    <td><?php echo htmlspecialchars($product['EAN']); ?></td>
                    <td><?php echo htmlspecialchars($product['category']); ?></td>
                    <td><?php echo htmlspecialchars($product['tags']); ?></td>
                    <td><?php echo htmlspecialchars($product['stock_quantity']); ?></td>
                    <td class="actions">
                        <form action="delete.php" method="post">
                            <input type="hidden" name="table" value="items">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
                            <button type="submit" name="action" value="update" class="button update">Update</button>
                        </form>
                        <form action="delete.php" method="post">
                            <input type="hidden" name="table" value="items">
                            <input type="hidden" name="id" value="<?php echo htmlspecialchars($product['id']); ?>">
                            <button type="submit" name="action" value="delete" class="button delete" disabled>Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>

<?php include 'footer.php'; ?>

<?php
$conn->close();
?>
