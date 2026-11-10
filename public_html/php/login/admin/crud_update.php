<?php
include '../../db_conn.php';

// Retrieve and sanitize inputs
$table = $_POST['table'];
$id = $_POST['id'];

// Validate table name (basic validation for safety)
$allowed_tables = ['users', 'items']; // Add allowed tables here
if (!in_array($table, $allowed_tables)) {
    die("Invalid table name.");
}

// Prepare the SQL UPDATE statement
$update_columns = [];
$types = ''; // Initialize types string for bind_param
$params = []; // Initialize params array for bind_param

foreach ($_POST as $key => $value) {
    if ($key !== 'table' && $key !== 'id' && $key !== 'action') {
        $update_columns[] = "$key = ?";
        // Check the column to determine type (string or numeric)
        if (in_array($key, ['price', 'stock_quantity'])) {
            $types .= 'd'; // For decimal values (price and stock_quantity)
        } elseif (in_array($key, ['id'])) {
            $types .= 'i'; // For integer values
        } else {
            $types .= 's'; // Default to string for other columns
        }
        $params[] = $value;
    }
}

// Ensure that there are columns to update
if (empty($update_columns)) {
    die("No fields to update.");
}

$update_sql = "UPDATE `$table` SET " . implode(', ', $update_columns) . " WHERE id = ?";
$stmt = $conn->prepare($update_sql);

if ($stmt === false) {
    die("Failed to prepare the SQL statement.");
}

// Bind parameters
$types .= 'i'; // Adding 'i' for the integer ID
$params[] = $id;

$stmt->bind_param($types, ...$params);

// Execute the query
if ($stmt->execute()) {
    echo "Record updated successfully. <a href='admin.php'>Go back</a>";
} else {
    echo "Error updating record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
