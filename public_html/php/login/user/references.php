<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>References - Grocerease</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
            line-height: 1.6;
        }

        .container {
            max-width: 1200px;
            margin: auto;
            overflow: hidden;
            padding: 0 20px;
        }

        .header {
            background-color: #426b1f;
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }

        .header h1 {
            margin: 0;
            font-size: 2.5rem;
        }

        h3 {
            color: #426b1f; /* Same green color for consistency */
            font-size: 1.5rem;
            margin-bottom: 20px;
        }

        ul {
            list-style-type: none;
            padding: 0;
        }

        ul li {
            margin: 10px 0;
            font-size: 1.1rem;
        }

        a {
            color: #426b1f;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .special-thanks {
            display: none;
            margin-top: 20px;
            background-color: #e0f7e0;
            padding: 15px;
            border-radius: 5px;
            color: #426b1f;
            transition: all 0.5s ease-in-out;
        }

        .special-thanks.show {
            display: block;
        }

        .footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
            margin-top: 40px;
        }

        .footer p {
            margin: 0;
        }

        /* Back button styles */
        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
            background-color: #426b1f; /* Green background similar to header */
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
        }

        .back-button:hover {
            background-color: #355a12; /* Darker green on hover */
        }

        .hidden-input {
            position: absolute;
            opacity: 0;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>References</h1>
    </div>

    <div class="container">
        <h3>Grocery and Shopping Platforms</h3>
 
        <ul>
            <li><a href="https://shopsuki.ph" target="_blank">ShopSuki</a></li>
            <li><a href="https://puregold.com.ph" target="_blank">Puregold</a></li>
            <li><a href="https://csistore.ph" target="_blank">CSI Store</a></li>
        </ul>

        <h3>Media and Images</h3>
        <ul>
            <li><a href="https://pexels.com" target="_blank">Pexels</a></li>
        </ul>

        <h3>Development Tools and Resources</h3>
        <ul>
            <li><a href="https://chatgpt.com" target="_blank">ChatGPT</a> — For providing AI-powered assistance and content.</li>
            <li><a href="https://webhostmost.com" target="_blank">WebHostMost</a> — For the Free web hosting service.</li>
            <li><a href="https://fonts.google.com" target="_blank">Google Fonts</a> — For typography across the website.</li>
            <li><a href="https://getbootstrap.com" target="_blank">Bootstrap</a> — Used for building the admin page.</li>
            <li><a href="https://fontawesome.com" target="_blank">Font Awesome</a> — For icons and visual elements.</li>
        </ul>

        <!-- Hidden Input Field -->
        <input type="text" id="secretCode" class="hidden-input" placeholder="Type the secret phrase..." />

        <!-- Include the special thanks content -->
        <?php include 'special_thanks.php'; ?>
    </div>


</body>
<script src="special_thanksies.js"></script>
</html>
