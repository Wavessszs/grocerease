<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Grocerease</title>
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

        .about-section {
            padding: 40px 20px;
            background: #fff;
            margin-top: 20px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .about-section h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #426b1f;
        }

        .about-section p {
            font-size: 1.1rem;
            margin-bottom: 20px;
        }

        .about-section .mission,
        .about-section .vision {
            margin-bottom: 30px;
        }

        .team-section {
            padding: 40px 20px;
            margin-top: 20px;
        }

        .team-section h2 {
            font-size: 2rem;
            margin-bottom: 20px;
            color: #426b1f;
            text-align: center;
        }

        .team-member {
            text-align: center;
            margin-bottom: 30px;
        }


        .team-member h3 {
            font-size: 1.5rem;
            margin-bottom: 5px;
        }

        .team-member p {
            font-size: 1rem;
            color: #777;
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

        .back-button {
            background-color: #426b1f; /* Green background similar to header */
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 1rem;
            cursor: pointer;
            border-radius: 5px;
            margin-top: 20px;
            display: inline-block;
        }

        .back-button:hover {
            background-color: #355a12; /* Darker green on hover */
        }

        /* Style for Back Link */
        .back-link {
            display: inline-block;
            text-decoration: none;
            background-color: #426b1f; /* Green background similar to header */
            color: #fff;
            padding: 10px 20px;
            font-size: 1rem;
            border-radius: 5px;
            margin-top: 20px;
        }

        .back-link:hover {
            background-color: #355a12; /* Darker green on hover */
        }

        .back-button {
            position: absolute;
            top: 10px;
            left: 10px;
    
    </style>
</head>
<body>
    <header class="header">
        <div class="container">
            <button class="back-button" onclick="goBack()">Back</button>
            <h1>GrocerEase</h1>
            
        </div>
    </header>

    <section class="about-section container">
        <h2>About Us</h2>
            <p style="text-indent: 20px;">
        Welcome to GrocerEase, where we simplify your grocery shopping experience. Our goal is to offer you a hassle-free and enjoyable way to buy groceries online. We bring fresh, high-quality products to your doorstep, ensuring you have everything you need, from meats and produce to daily essentials.
            </p>
            <p style="text-indent: 20px;">
        Founded with the goal of making grocery shopping easier for busy individuals and families, GrocerEase provides a convenient platform where you can shop without the stress of crowded stores or long checkout lines.
            </p>
        <div class="mission">
            <h2>Mission</h2>
            <p  style="text-indent: 20px;">
            Our mission is to deliver top-quality groceries quickly and efficiently while offering excellent customer service. We aim to make each shopping experience smooth, convenient, and tailored to your specific needs.
            </p>
        </div>
        
        <div class="vision">
            <h2>Vision</h2>
            <p style="text-indent: 20px;">
            We aim to redefine grocery shopping by making it simple and accessible for everyone. By leveraging technology and innovation, we seek to create a more effortless way to shop for groceries, bringing both convenience and peace of mind.
            </p>
        </div>
    </section>

    <section class="team-section container">
        <h2>Making of the Website</h2>
        <div class="team-member">
            <img src="../images/bg.png" alt="betlog">
            <h3>Fist Test</h3>
            <p></p>
        </div>
        <div class="team-member">
            <img src="../images/betlog2.jfif" alt="betlog">
            <h3>Second Test</h3>
            <p></p>
        </div>
        <div class="team-member">
            <img src="../images/betlog3.png" alt="betlog">
            <h3>Last Test</h3>
            <p></p>
        </div>
    </section>

    <footer class="footer">
        <p>Grocerease &copy; 2024 </p>
    </footer>

    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
