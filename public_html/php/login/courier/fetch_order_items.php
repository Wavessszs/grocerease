<?php
// Example of fetching order items
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['order_id'];
    include '../../db_conn.php';

    $sql = "SELECT items.name, order_items.quantity, order_items.price 
            FROM order_items 
            JOIN items ON order_items.product_id = items.id 
            WHERE order_items.order_id = ?";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $orderId);
    $stmt->execute();
    $result = $stmt->get_result();
    $items = $result->fetch_all(MYSQLI_ASSOC);

  // Calculate the grand total
    $grandTotal = 0;
    foreach ($items as $item) {
        $grandTotal += $item['quantity'] * $item['price'];
    }
    
    $stmt->close();
    $conn->close();

    // Create the receipt table
    echo '<table class="receipt-table">';
    echo '<tr><th>Item</th><th>Quantity</th><th>Price</th></tr>';
    foreach ($items as $item) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($item['name']) . '</td>';
        echo '<td>' . htmlspecialchars($item['quantity']) . '</td>';
        echo '<td>' . htmlspecialchars(number_format($item['price'], 2)) . '</td>';
        echo '</tr>';
    }
    echo '</table>';

    // Display the grand total
    echo '<div class="grand-total">Grand Total: $' . htmlspecialchars(number_format($grandTotal, 2)) . '</div>';
}
?>