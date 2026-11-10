<?php
include '../../db_conn.php';

if (isset($_GET['order_id'])) {
    $order_id = intval($_GET['order_id']);

    $order_items_query = "
        SELECT oi.id, i.name, oi.quantity, oi.price 
        FROM order_items oi 
        JOIN items i ON oi.product_id = i.id 
        WHERE oi.order_id = ?
    ";

    $stmt = $conn->prepare($order_items_query);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $order_items_result = $stmt->get_result();

    $order_items = [];
    while ($item = $order_items_result->fetch_assoc()) {
        $order_items[] = $item;
    }

    echo json_encode($order_items); // Return JSON response
    $stmt->close();
}
$conn->close();
?>
