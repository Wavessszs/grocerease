<?php
include '../../db_conn.php';

// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $table = $_POST['table'];

    // Debug: Print all POST data to check the values
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    // Prepare the SQL INSERT statement
    $columns = [];
    $placeholders = [];
    $params = [];
    $types = ''; // Initialize types string for bind_param

    // Loop through POST data to build the query
    foreach ($_POST as $key => $value) {
        if ($key != 'table' && $key != 'action') {
            $columns[] = $key;
            $placeholders[] = '?';
            $params[] = $value;
            $types .= is_numeric($value) ? 'd' : 's'; // Determine parameter type
        }
    }

    $sql = "INSERT INTO `$table` (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $placeholders) . ")";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Failed to prepare the SQL statement.");
    }

    $stmt->bind_param($types, ...$params);

    if ($stmt->execute()) {
        // Redirect to admin dashboard after successful insertion
        header("Location: admin_dashboard.php");
        exit(); // Make sure to exit after redirect
    } else {
        echo "Error adding record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
