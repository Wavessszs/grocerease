<?php
session_start();
header('Content-Type: application/json');

// Include database connection file
include '../../db_conn.php';

// Initialize cart if not set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Fetch product IDs from the cart
$product_ids = array_keys($_SESSION['cart']);

// If there are no products in the cart
if (empty($product_ids)) {
    echo json_encode(['success' => false, 'message' => 'Cart is empty']);
    exit();
}

// Prepare the SQL query to fetch product details
$ids_placeholder = implode(',', array_fill(0, count($product_ids), '?'));
$sql = "SELECT id, name, description, price, image_url FROM products WHERE id IN ($ids_placeholder)";
$stmt = $conn->prepare($sql);

// Bind parameters and execute the query
$stmt->bind_param(str_repeat('i', count($product_ids)), ...$product_ids);
$stmt->execute();
$result = $stmt->get_result();

// Prepare cart items with quantities
$cart_items = [];
while ($row = $result->fetch_assoc()) {
    $product_id = $row['id'];
    $cart_items[] = [
        'id' => $row['id'],
        'name' => $row['name'],
        'description' => $row['description'],
        'price' => $row['price'],
        'image_url' => $row['image_url'],
        'quantity' => $_SESSION['cart'][$product_id]
    ];
}

// Close connection and return JSON response
$stmt->close();
$conn->close();

echo json_encode(['success' => true, 'cart' => $cart_items]);
?>
