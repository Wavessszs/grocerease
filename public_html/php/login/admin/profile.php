<?php
include '../../db_conn.php';
session_start();

$userId = $_SESSION['user_id'] ?? null;
$userRole = $_SESSION['role'] ?? null;

// Ensure the user is logged in and has the admin role
if (!$userId || $userRole !== 'admin') {
    header('Location: ../login.php'); // Redirect to login if not an admin
    exit();
}

// Fetch admin details
$admin_query = "SELECT username, full_name, password, address, phone FROM users WHERE id = ?";
$stmt = $conn->prepare($admin_query);
$stmt->bind_param('i', $userId);
$stmt->execute();
$stmt->bind_result($username, $full_name, $password, $address, $phone);
$stmt->fetch();
$stmt->close();

// Update admin details on form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $new_username = $_POST['username'];
    $new_full_name = $_POST['full_name'];
    $new_password = $_POST['password'];
    $new_address = $_POST['address'];
    $new_phone = $_POST['phone'];

    // Update query
    $update_query = "UPDATE users SET username = ?, full_name = ?, password = ?, address = ?, phone = ? WHERE id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param('sssssi', $new_username, $new_full_name, $new_password, $new_address, $new_phone, $userId);

    if ($update_stmt->execute()) {
        // Success message
        $message = "Profile updated successfully.";
        // Optionally, you might want to refresh the session variables
        $_SESSION['username'] = $new_full_name; // Update session with new name
    } else {
        $message = "Error updating profile.";
    }

    $update_stmt->close();
}

include 'admin_header.php'; 
?>

<div class="main-content container-fluid">
    <h1>Admin Profile</h1>
    
    <?php if (isset($message)): ?>
        <div class="alert alert-info"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($username); ?>" required class="form-control">
        </div>
        <div class="form-group">
            <label for="full_name">Full Name</label>
            <input type="text" id="full_name" name="full_name" value="<?php echo htmlspecialchars($full_name); ?>" required class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" id="password" name="password" value="<?php echo htmlspecialchars($password); ?>" required class="form-control">
        </div>
        <div class="form-group">
            <label for="address">Address</label>
            <textarea id="address" name="address" required class="form-control"><?php echo htmlspecialchars($address); ?></textarea>
        </div>
        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="tel" id="phone" name="phone" value="<?php echo htmlspecialchars($phone); ?>" required class="form-control">
        </div>
        <div style="text-align: right;">
            <button type="submit" class="btn" style="background-color: green; color: white;">Update Profile</button>
        </div>
    </form>
</div>

<?php include 'footer.php'; ?>
<?php $conn->close(); ?>
