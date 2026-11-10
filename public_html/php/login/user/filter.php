<?php
include '../../db_conn.php';

// Fetch filter data from AJAX
$category = $_POST['category'] ?? '';
$price = $_POST['price'] ?? 0;
$location = $_POST['location'] ?? '';
$distributor = $_POST['distributor'] ?? '';
$sort = $_POST['sort'] ?? '';
$searchQuery = isset($_POST['search']) ? $conn->real_escape_string($_POST['search']) : '';

// Start building the SQL query
$sql = "SELECT id, name, description, price, image_url FROM items WHERE (name LIKE '%$searchQuery%' OR category LIKE '%$searchQuery%' OR tags LIKE '%$searchQuery%')";

// Apply filters
if (!empty($category)) {
    $sql .= " AND category = '$category'";
}

/*if ($price > 0) {
    $sql .= " AND price <= $price";
}
*/
if (!empty($location)) {
    $sql .= " AND location = '$location'";
}

if (!empty($distributor)) {
    $sql .= " AND distributor = '$distributor'";
}

// Apply sorting
switch ($sort) {
    case 'best-selling':
        $sql .= " ORDER BY stock_quantity ASC"; // Assuming more stock means better-selling
        break;
    case 'a-to-z':
        $sql .= " ORDER BY name ASC";
        break;
    case 'z-to-a':
        $sql .= " ORDER BY name DESC";
        break;
    case 'low-to-high':
        $sql .= " ORDER BY price ASC";
        break;
    case 'high-to-low':
        $sql .= " ORDER BY price DESC";
        break;
    case 'new':
        $sql .= " ORDER BY created_at DESC";
        break;
}

// Execute the query
$result = $conn->query($sql);

// Prepare the response
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='card'>
                <img src='{$row['image_url']}' alt='{$row['name']}'>
                <h2>{$row['name']}</h2>
                <p>P{$row['price']}</p>
                <p>{$row['description']}</p>
                <a href='product.php?id={$row['id']}'>View Item</a>
            </div>";
    }
} else {
    echo "<p>No products found</p>";
}

$conn->close();
?>
