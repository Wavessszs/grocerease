<?php
session_start();
header('Content-Type: application/json');

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);

// Ensure `product_id` is provided
if (isset($data['product_id'])) {
    $product_id = intval($data['product_id']);

    // Remove item from cart
    if (isset($_SESSION['cart'][$product_id])) {
        unset($_SESSION['cart'][$product_id]);
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Item not found in cart']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}
?>
