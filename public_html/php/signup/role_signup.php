<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Role</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            position: relative; /* Added for positioning the spotlight */
            overflow: hidden; /* Prevents scrollbars */
            background-size: cover; /* Cover the button with the background */
            background-position: center;
            background-image: url('../../images/beejy.jpg');
        }

        .role-selection-container {
            display: flex;
            width: 100%;
            height: 100%;
            max-width: 800px; /* Limit the width for larger screens */
            border-radius: 8px; /* Optional: add border radius */
            overflow: hidden; /* Prevents overflow */
            position: relative; /* For positioning pseudo-elements */
            z-index: 1; /* Ensure it's above the background */
        }

        .role-button {
            flex: 1;
            display: flex;
            flex-direction: column; /* Stack the text below the image */
            align-items: center;
            justify-content: flex-end; /* Align the text at the bottom */
            font-size: 24px;
            color: white;
            border: none;
            cursor: pointer;
            height: 100%; /* Ensure buttons take the full height */
            position: relative; /* For positioning the text and overlay */
            padding-bottom: 50px;
            overflow: hidden; /* Hide overflow of text */
        }

        .user {
            background-image: url('../../images/courier.jpg'); /* Replace with your user background image path */
            background-size: cover; /* Cover the button with the background */
            background-position: center; /* Center the background image */
        }

        .courier {
            background-image: url('../../images/user.jpg'); /* Replace with your courier background image path */
            background-size: cover; /* Cover the button with the background */
            background-position: center; /* Center the background image */
        }

        /* Fade effect at the bottom */
        .role-button::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 50%; /* Adjust the height of the fade */
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent); /* Fade from black to transparent */
            z-index: 1; /* Make sure the fade is above the background */
        }

        /* Text Styling */
        .role-button span {
            z-index: 2; /* Make sure text is above the fade */
            margin: 10px 0; /* Add some spacing between the text and bottom */
        }

        /* Spotlight effect */
        .spotlight {
            position: absolute;
            top: 50%; /* Center vertically */
            transform: translateY(-50%); /* Adjust for centering */
            width: 900px; /* Larger width for a broader spotlight effect */
            height: 900px; /* Larger height for a broader spotlight effect */
            border-radius: 50%; /* Make it circular */
            pointer-events: none; /* Allow clicks to pass through */
            z-index: 2; /* Ensure it appears above other elements */
        }

        /* Red spotlight */
        .left-spotlight {
            left: -600px; /* Position outside the left edge */
            background: radial-gradient(circle, rgba(255, 0, 0, 0.8) 30%, rgba(255, 0, 0, 0) 70%); /* Bright red */
        }

        /* Blue spotlight */
        .right-spotlight {
            right: -600px; /* Position outside the right edge */
            background: radial-gradient(circle, rgba(0, 0, 255, 0.8) 30%, rgba(0, 0, 255, 0) 70%); /* Bright blue */
        }

        /* Blink animation */
        @keyframes blink {
            0% { opacity: 0.8; }
            50% { opacity: 1; }
            100% { opacity: 0.8; }
        }

        .left-spotlight {
            animation: blink 1s infinite; /* Blink effect */
        }

        .right-spotlight {
            animation: blink 1s infinite; /* Blink effect */
        }
                /* Optional: Hover effect */
        .role-button {
            transition: transform 0.3s ease; /* Smooth transition for lifting */
        }

        .role-button:hover {
            transform: translateY(-10px); /* Lift the button up on hover */
        }

    </style>
</head>
<body>
<div class="role-selection-container">
    <button class="role-button user" onclick="window.location.href='personal_details.php?role=user';">
        <span>Roll as a User</span> <!-- Changed text -->
    </button>
    <button class="role-button courier" onclick="window.location.href='personal_details.php?role=courier';">
        <span>Be the Hustler</span> <!-- Changed text -->
    </button>
</div>


    <div class="spotlight left-spotlight"></div> <!-- Red spotlight effect -->
    <div class="spotlight right-spotlight"></div> <!-- Blue spotlight effect -->

</body>
</html>
