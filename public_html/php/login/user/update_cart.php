<?php
session_start();
header('Content-Type: application/json');

// Get the POST data
$data = json_decode(file_get_contents('php://input'), true);

// Ensure `product_id` and `quantity` are provided
if (isset($data['product_id']) && isset($data['quantity'])) {
    $product_id = intval($data['product_id']);
    $quantity = intval($data['quantity']);

    // Validate quantity
    if ($quantity <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid quantity']);
        exit();
    }

    // Check if cart session exists and update the quantity
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] = $quantity;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Item not found in cart']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
}
?>
