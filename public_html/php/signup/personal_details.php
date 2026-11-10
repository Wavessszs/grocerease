<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Details</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            height: 100vh;
            overflow: hidden; /* Prevent scroll bars */
            display: flex; /* Use flexbox for centering */
            align-items: center; /* Center vertically */
            justify-content: center; /* Center horizontally */
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

        .personal-details-container {
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

        .personal-details-container h2 {
            margin-bottom: 20px;
            color: #333;
        }

        .personal-details-container input[type="text"] {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: none; /* Removed border */
            border-radius: 5px;
            font-size: 16px;
            transition: border-color 0.3s;
            background-color: #f9f9f9; /* Optional: set a light background for input */
        }

        .personal-details-container input[type="text"]:focus {
            outline: none; /* Removed outline */
            background-color: #fff; /* Optional: change background on focus */
        }

        .personal-details-container button {
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

        .personal-details-container button:hover {
            background-color: #45a049;
            transform: scale(1.02);
        }

        /* Media Queries for Responsiveness */
        @media (max-width: 500px) {
            .personal-details-container {
                padding: 20px;
            }

            .personal-details-container h2 {
                font-size: 24px;
            }

            .personal-details-container button {
                padding: 10px;
                font-size: 14px;
            }
        }
    </style>
</head>
<body>
    <div class="background"></div> <!-- Background div with blur effect -->
    <div class="personal-details-container">
        <h2>Enter Personal Details</h2>
        <form action="account_creation.php" method="post">
            <input type="hidden" name="role" value="<?php echo htmlspecialchars($_GET['role']); ?>">
            <input type="text" name="full_name" placeholder="Full Name" required>
            <input type="text" name="address" placeholder="Address" required>
            <input type="text" name="phone" placeholder="Phone Number" required>
            <button type="submit">Next</button>
        </form>
    </div>
</body>
</html>
