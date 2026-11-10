<?php
// Initialize message variable
$message = '';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and retrieve submitted values
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $messageContent = htmlspecialchars(trim($_POST['message']));

    // Construct confirmation message
    $message = "Hi <strong>$name</strong>! Thank you so much for reaching out to us. We truly appreciate your message and your patience as we work to respond to you.<br>
                Here’s what we’ve received from you:<br>
                <strong>Email:</strong> $email<br>
                <strong>Your Message:</strong> $messageContent<br>
                Rest assured, we will get back to you as soon as possible. Your thoughts and inquiries are important to us!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Grocerease</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif; /* Assuming Roboto as the primary font */
            line-height: 1.6;
            background-color: #f8f9fa; /* Light gray for a clean look */
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #426b1f; /* Green color for headers */
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        h2 {
            color: #426b1f;
            margin-top: 20px;
            margin-bottom: 10px;
            font-size: 1.8rem;
        }
        p {
            margin: 10px 0;
        }
        .contact-info {
            margin-bottom: 20px;
        }
        form {
            background-color: #ffffff; /* White background for the form */
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            background-color: #426b1f; /* Green button */
            color: #ffffff;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
        }
        button:hover {
            background-color: #365a16; /* Darker green on hover */
        }
        .alert {
            background-color: #e0f7e0; /* Light green background */
            padding: 15px;
            border-radius: 5px;
            color: #426b1f; /* Dark green text */
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<h1>Contact Us</h1>
<p>If you have any questions, comments, or concerns, please feel free to reach out to us using the form below or through the contact information provided. We're here to help!</p>

<div class="contact-info">
    <h2>Our Contact Information</h2>
    <p>Email: smoldeakenergy@bold.com</p>
    <p>Phone: 0930-inakbayankosicrushkahitmayjowaako</p>
    <p>Address: katabingkapitbahayniyositioputanginamo</p>
</div>

<h2>Contact Form</h2>

<?php if ($message): ?>
    <div class="alert"><?php echo $message; ?></div>
<?php else: ?>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message:</label>
        <textarea id="message" name="message" rows="5" required></textarea>

        <button type="submit">Send Message</button>
    </form>
<?php endif; ?>

</body>
</html>
