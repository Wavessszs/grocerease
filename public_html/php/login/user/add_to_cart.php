<?php
session_start();
header('Content-Type: application/json');

// Include database connection file
include '../../db_conn.php';

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);

// Ensure `product_id` and `quantity` are provided
if (isset($data['product_id']) && isset($data['quantity'])) {
    $product_id = intval($data['product_id']);
    $quantity = intval($data['quantity']);

    // Initialize cart if not set
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // Validate quantity
    if ($quantity <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid quantity']);
        exit();
    }

    // Check if product exists in the database
    $sql = "SELECT id FROM items WHERE id = ?"; // Ensure table name matches your schema
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $product_id);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows === 0) {
        echo json_encode(['success' => false, 'message' => 'Product does not exist']);
        $stmt->close();
        $conn->close();
        exit();
    }

    $stmt->close();

    // If product already in cart, update quantity
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }

    // Close connection
    $conn->close();

    echo json_encode(['success' => true, 'message' => 'Product added to cart']);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}
?>
