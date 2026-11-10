<?php

header('Content-Type: application/json');

include 'db_conn.php';

$query = isset($_GET['q']) ? $_GET['q'] : '';
$searchQuery = $conn->real_escape_string($query);


// SQL to search by name, category, and tags
$sql = "SELECT id, name FROM items 
        WHERE name LIKE '%$searchQuery%' 
        OR category LIKE '%$searchQuery%'  
        OR tags LIKE '%$searchQuery%' ";

$result = $conn->query($sql);

$results = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $results[] = $row;
    }
}

echo json_encode($results);

$conn->close();
?>
