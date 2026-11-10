<?php
include '../db_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize inputs
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role'];
    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    // Validate password confirmation
    if ($password !== $confirm_password) {
        echo "Passwords do not match.";
        exit();
    }

    // Check if the username is already taken
    $check_user_query = "SELECT id FROM users WHERE username = ?";
    $stmt = $conn->prepare($check_user_query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Username already taken. Please choose another.";
    } else {
        // Insert new user into the database
        $insert_user_query = "INSERT INTO users (username, password, roles, full_name, address, phone) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($insert_user_query);
        $stmt->bind_param('ssssss', $username, $password, $role, $full_name, $address, $phone);
        
        if ($stmt->execute()) {
            // Successful sign up
            header("Location: ../login/login.php");
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    $stmt->close();
}

$conn->close();
?>
