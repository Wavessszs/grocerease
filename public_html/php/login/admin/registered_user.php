<?php
include '../../db_conn.php';
session_start();

$userId = $_SESSION['user_id'] ?? null;
$userRole = $_SESSION['role'] ?? null;

// Ensure the user is logged in and has the admin role
if (!$userId || $userRole !== 'admin') {
    header('Location: ../login.php');
    exit();
}

// Fetch registered users
$users_query = "
    SELECT id, username, roles, full_name, password ,address, phone, created_at 
    FROM users 
    ORDER BY created_at DESC
";
$users_result = $conn->query($users_query);

// Handle update of user details
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_user'])) {
    $update_user_id = $_POST['user_id'];
    $update_username = $_POST['username'];
    $update_roles = $_POST['roles'];
    $update_full_name = $_POST['full_name'];
    $update_password = $_POST['password'];
    $update_address = $_POST['address'];
    $update_phone = $_POST['phone'];

    $update_query = "
        UPDATE users 
        SET username = ?, roles = ?, full_name = ?, address = ?, phone = ? , password = ? 
        WHERE id = ?
    ";
    $stmt = $conn->prepare($update_query);
    $stmt->bind_param("ssssssi", $update_username, $update_roles, $update_full_name,  $update_password,  $update_address, $update_phone, $update_user_id);
    
    if ($stmt->execute()) {
        echo "<script>alert('User details updated successfully.');</script>";
    } else {
        echo "<script>alert('Error updating user details.');</script>";
    }
    $stmt->close();
}
?>

<?php include 'admin_header.php'; ?>

<style>
body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f0f0;
    color: #333;
    padding: 50px 0;
}

.container {
    max-width: 100%;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding-left: 100px;
    padding-right: 100px;

}

h1 {
    text-align: left;
    color: #444;
    margin-bottom: 30px;
    font-size: 2em;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
}

table th, table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
}

table th {
    background-color: #f8f8f8;
    color: #444;
}

button {
    padding: 5px 10px;
    margin-top: 10px;
    border: none;
    border-radius: 4px;
    background-color: green;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: white;
    color: green;
}

.modal {
    display: none;
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7); /* Darker background for contrast */
    justify-content: center;
    align-items: center;
}

.modal-content {
    background-color: #fff;
    padding: 30px; /* Increased padding */
    border-radius: 8px;
    width:30%; /* Wider modal */
    /* Max width */
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); /* Shadow for depth */
    display: flex; /* Flexbox for layout */
    flex-direction: column; /* Stack items vertically */
    position: relative; /* Positioning context for close button */
  align-items:center;
  justify-content:center;
}

.close-btn {
    position: absolute; /* Absolute positioning */
    top: 15px; /* Space from top */
    right: 20px; /* Space from right */
    font-size: 28px; /* Larger font size */
    color: #333; /* Darker color */
    cursor: pointer;
    
}

.close-btn:hover {
    color: #ff0000; /* Change color on hover */
}

h2 {
    margin-top: 0; /* Remove default margin */
    font-size: 1.5rem; /* Heading size */
    color: #333; /* Dark color */
    text-align: center; /* Center align heading */
}

p {
    line-height: 1.6; /* Better line height */
    color: #555; /* Lighter text color */
    margin: 10px 0; /* Margin for spacing between paragraphs */
}

.modal-footer {
    display: flex; /* Flexbox for footer */
    justify-content: flex-end; /* Align buttons to the right */
    margin-top: 20px; /* Space above footer */
}

.modal-button {
    padding: 10px 20px; /* Button padding */
    border: none; /* No border */
    border-radius: 5px; /* Rounded corners */
    background-color: #4caf50; /* Green background */
    color: white; /* White text */
    font-size: 16px; /* Font size */
    cursor: pointer; /* Pointer cursor */
    transition: background-color 0.3s ease; /* Smooth transition */
}

.modal-button:hover {
    background-color: #388e3c; /* Darker green on hover */
}
.updated{

    margin-left:65%;
}

</style>

<div class="container">
    <h1>Registered Users</h1>

    <!-- Table to display registered users -->
    <table>
        <thead>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Role</th>
                <th>Full Name</th>
                <th>Phone</th>
                <th>Registration Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if ($users_result->num_rows > 0): ?>
                <?php while ($user = $users_result->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($user['id']); ?></td>
                        <td><?php echo htmlspecialchars($user['username']); ?></td>
                        <td><?php echo htmlspecialchars($user['roles']); ?></td>
                        <td><?php echo htmlspecialchars($user['full_name']); ?></td>
                        <td><?php echo htmlspecialchars($user['phone']); ?></td>
                        <td><?php echo htmlspecialchars($user['created_at']); ?></td>
                        <td>
                            <button onclick="openModal(<?php echo htmlspecialchars($user['id']); ?>, '<?php echo htmlspecialchars($user['username']); ?>', '<?php echo htmlspecialchars($user['password']); ?>','<?php echo htmlspecialchars($user['roles']); ?>', '<?php echo htmlspecialchars($user['full_name']); ?>', '<?php echo htmlspecialchars($user['address']); ?>', '<?php echo htmlspecialchars($user['phone']); ?>')">Edit</button>
                        </td>
                    </tr>
                <?php endwhile; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7">No registered users found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Modal for updating user details -->
    <div id="userModal" class="modal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <h2>Update User Details</h2>
            <form id="updateUserForm" method="POST">
    <input type="hidden" name="user_id" id="userId" value="">
    
    <label for="username">Username:</label><br>
    <input type="text" name="username" id="username" required><br>

    <label for="password">Password:</label><br>
    <input type="text" name="password" id="password" required><br>

    <label for="roles">Role:</label><br>
    <input type="text" name="roles" id="roles" required><br>

    <label for="full_name">Full Name:</label><br>
    <input type="text" name="full_name" id="full_name" required><br>

    <label for="address">Address:</label><br>
    <input type="text" name="address" id="address" required><br>

    <label for="phone">Phone:</label><br>
    <input type="text" name="phone" id="phone" required><br>

    <button type="submit" class="updated" name="update_user">Update</button>
</form>

        </div>
    </div>
</div>

<script>
function openModal(userId, username,password, roles, fullName, address, phone) {
    document.getElementById('userId').value = userId;
    document.getElementById('username').value = username;
     document.getElementById('password').value = password;
    document.getElementById('roles').value = roles;
    document.getElementById('full_name').value = fullName;
    document.getElementById('address').value = address;
    document.getElementById('phone').value = phone;
    document.getElementById('userModal').style.display = 'flex';
}

function closeModal() {
    document.getElementById('userModal').style.display = 'none';
}
</script>

<?php include 'footer.php'; ?>
<?php $conn->close(); ?>
