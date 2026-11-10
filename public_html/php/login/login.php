<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
       body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            display: flex;
            width: 100%;
        }

        .image {
            width: 40vw;
            background-color: #f2f2f2;
            overflow: hidden; 
        }

        .image img {
            max-width: 100%;
            max-height: 100%;
            object-fit: contain;
        }

        .login-container {
            display: flex;
            flex-direction: column;
            background-color: transparent;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 300px;
            margin: 0 auto;
        }

        .login-container h2 {
            margin-bottom: 20px;
            text-align: center;
        }

        .login-container input[type="text"],
        .login-container input[type="password"] {
            width: 93%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-container button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-container button:hover {
            background-color: #45a049;
        }

        .login-container .error {
            color: red;
            margin-bottom: 15px;
            text-align: center;
        }

        .login-container .buttonsignup {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .login-container .buttonsignup:hover {
            background-color: #45a049;
        }
    </style>
</head>

<?php
include '../db_conn.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize inputs
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepare and execute the SQL query
    $sql = "SELECT id, roles, full_name FROM users WHERE username = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $stmt->store_result();

    // Check if a user was found
    if ($stmt->num_rows == 1) {
        $stmt->bind_result($user_id, $roles,$full_name);
        $stmt->fetch();
        
        // Set session variables
        $_SESSION['user_id'] = $user_id;
        $_SESSION['role'] = $roles;
        $_SESSION['username'] = $full_name;

        // Redirect based on role
        switch ($roles) {
            case 'admin':
                header("Location: admin/admin.php");
                break;
            case 'courier':
                header("Location: courier/courier_dashboard.php");
                break;
            case 'user':
            default:
                header("Location: user/welcome.php");
                break;
        }
        exit();
    } else {
        // Invalid credentials
        $error_message = "Invalid username or password";
        header("Location: login.php?error=" . urlencode($error_message));
        exit();
    }

    $stmt->close();
}

$conn->close();
?>

<body>
    <div class="image">
        <img class="image-class" src="../../images/img2.jpg" />
    </div>    
    <div class="login-container">
        <h2>Login</h2>
        <form action="login.php" method="post">
            <div class="error"><?php if (isset($_GET['error'])) echo $_GET['error']; ?></div>
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <button class="buttonsignup" onclick="window.location.href='../signup/role_signup.php';">Sign Up</button>
    </div>
</body>

</html>
