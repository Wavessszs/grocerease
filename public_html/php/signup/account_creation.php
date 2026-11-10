<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden; /* Prevent scroll bars */
            display: flex; /* Use Flexbox */
            justify-content: center; /* Center horizontally */
            align-items: center; /* Center vertically */
        }

        .background {
            position: fixed; /* Make the background fixed */
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('../../images/personal.jpg'); /* Fixed background image property */
            background-size: cover; /* Ensures the image covers the entire background */
            background-position: center; /* Centers the image */
            background-repeat: no-repeat; /* Prevents the image from repeating */
            filter: blur(8px); /* Blur effect on the background */
            z-index: -1; /* Place the background behind other content */
        }

        .account-creation-container {
            background-color: rgba(255, 255, 255, 1); /* Slightly transparent white background */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            text-align: center;
            position: relative; /* Ensure this container is on top */
            z-index: 1; /* Make sure it appears above the background */
        }

        .account-creation-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .account-creation-container input[type="text"],
        .account-creation-container input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none; /* Removed border */
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
            background-color: #f9f9f9; /* Optional: set a light background for input */
        }

        .account-creation-container input[type="text"]:focus,
        .account-creation-container input[type="password"]:focus {
            outline: none; /* Removed outline */
            background-color: #fff; /* Optional: change background on focus */
        }

        .account-creation-container button {
            width: 100%;
            padding: 12px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s, transform 0.3s;
        }

        .account-creation-container button:hover {
            background-color: #45a049;
            transform: scale(1.02);
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 500px) {
            .account-creation-container {
                padding: 20px;
            }

            .account-creation-container h2 {
                font-size: 24px;
            }

            .account-creation-container button {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="background"></div> <!-- Background div with blur effect -->
    <div class="account-creation-container">
        <h2>Create Account</h2>
        <form action="sign_process.php" method="post">
            <input type="hidden" name="role" value="<?php echo htmlspecialchars($_POST['role']); ?>">
            <input type="hidden" name="full_name" value="<?php echo htmlspecialchars($_POST['full_name']); ?>">
            <input type="hidden" name="address" value="<?php echo htmlspecialchars($_POST['address']); ?>">
            <input type="hidden" name="phone" value="<?php echo htmlspecialchars($_POST['phone']); ?>">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
