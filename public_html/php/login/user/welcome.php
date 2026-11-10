<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link rel="stylesheet" href="../../../css/welcome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>
    <?php 
    include '../../db_conn.php';
    include '../../header.php';
    include 'product_cards.php';
    $userId = $_SESSION['user_id'] ?? null;
    $userRole = $_SESSION['role'] ?? null;

 ?>

    <!-- Existing Carousel -->
    <div class="carousel">
        <div class="carousel-item">
            <img src="../../../images/carousel/carousel1.jpg" alt="Image 1">
            <div class="carousel-text">Fresh Delicacies</div>
        </div>
        <div class="carousel-item">
            <img src="../../../images/carousel/carousel2.jpg" alt="Image 2">
            <div class="carousel-text">Tools to Help your Home</div>
        </div>
        <div class="carousel-item">
            <img src="../../../images/carousel/carousel3.jpg" alt="Image 3">
            <div class="carousel-text">For Beauty Essentials</div>
        </div>
    </div>

    <div class="carousel-title">
        <h2>Best Selling</h2>
    </div>
    <div class="product-carousel-container">
    <button class="nav-button left">&#10094;</button>
    <div class="product-carousel">
        <?php getRandomProducts($conn); ?>
    </div>
    <button class="nav-button right">&#10095;</button>
    </div>

    <div class="carousel-title">
        <h2>Explore Collections</h2>
    </div>
  <div class="categories">
    <div class="category">
        <a href="searchpage.php?betlog=GROCERY">
            <img alt="Groceries & Snacks" src="../../../images/toyo.jpg"/>
            <p>Groceries & Snacks</p>
        </a>
    </div>
    <div class="category">
        <a href="searchpage.php?betlog=BEVERAGES">
            <img alt="Drinks & Refreshments" src="../../../images/tobeg.jpg"/>
            <p>Drinks & Refreshments</p>
        </a>
    </div>
    <div class="category">
        <a href="searchpage.php?betlog=HEALTH">
            <img alt="Health Essentials" src="../../../images/sabon.jpg"/>
            <p>Health Essentials</p>
        </a>
    </div>
    <div class="category">
        <a href="searchpage.php?betlog=HOUSEHOLD">
            <img alt="Household Favorites" src="../../../images/plunger.jpg"/>
            <p>Household Favorites</p>
        </a>
    </div>
</div>

    
    <div class="carousel-title">
        <h2>Sale Today</h2>
    </div>
    <div class="product-carousel-container">
    <button class="nav-button left">&#10094;</button>
    <div class="product-carousel">
        <?php getRandomProducts($conn); ?>
    </div>
    <button class="nav-button right">&#10095;</button>
    </div>

    <div class="carousel-title">
        <h2>Fresh and Clean Home</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php  rdpc('CLEAN', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>

    <div class="carousel-title">
        <h2>Bye-Bye Bugs!</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php rdpc('INSECTICIDES', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>

    <div class="carousel-title">
        <h2>Butcher's Choice</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php rdpc('MEAT', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>

    <div class="carousel-title">
        <h2>Raise a Glass</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php  rdpc('ALCOHOL', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>

   <div class="carousel-title">
        <h2>Pop and Refresh</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php  rdpc('DRINKS', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>

   <div class="carousel-title">
        <h2>Snack Time Favorites</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php  rdpc('SNACKS', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>

   <div class="carousel-title">
        <h2>Pantry Powerhouses</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php  rdpc('CANNED', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>

    <div class="carousel-title">
        <h2>Hydration Heroes</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php  rdpc('WATER', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>
   <div class="carousel-title">
        <h2>Laundry Life Savers</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php  rdpc('LAUNDRY', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>

   <div class="carousel-title">
        <h2>Hair Care Perfection</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php  rdpc('HAIR', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>

   <div class="carousel-title">
        <h2>Bright Smiles Ahead</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php  rdpc('ORAL', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>

   <div class="carousel-title">
        <h2>Skin Essentials</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php  rdpc('SKIN', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>

   <div class="carousel-title">
        <h2>HOME Haven Must-Haves</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php  rdpc('HOUSE', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>

   <div class="carousel-title">
        <h2>Glow Up!</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php  rdpc('FACIAL', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>

   <div class="carousel-title">
        <h2>Tool Time Wonders</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php  rdpc('TOOLS', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>

   <div class="carousel-title">
        <h2>Elevate your Meals</h2>
    </div>
    <div class="product-carousel-container">
        <button class="nav-button left">&#10094;</button>
        <div class="product-carousel">
            <?php  rdpc('SAUCES', $conn); ?>
        </div>
        <button class="nav-button right">&#10095;</button>
    </div>
    <div class="spacelng">
    <h1> BETLOG NI JC MALAKI</h1>
    </div>
<footer class="footer">
    <div class="footer-container">
        <div class="footer-section">
            <h3>About Us</h3>
            <p>Learn more about Grocerease and our mission to simplify your shopping experience.</p>
        </div>
        <div class="footer-section">
            <h3>Quick Links</h3>
            <ul>
                <li><a href="privacy_policy.html">Privacy Policy</a></li>
                <li><a href="terms_of_service.html">Terms of Service</a></li>
                <li><a href="contact_us.php">Contact Us</a></li>
                <li><a href="references.php">References</a></li> <!-- Added a link to FAQs for customer support -->
            </ul>
        </div>
        <div class="footer-section">
            <h3>Follow Us</h3>
            <p>Stay connected with us on social media.</p>
            <div class="footer-social">
                <a href="https://facebook.com" target="_blank"aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                <a href="https://x.com"target="_blank" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                <a href="https://instagram.com"target="_blank" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                <a href="https://linkedin.com" target="_blank"aria-label="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        &copy; 2024 Grocerease. All rights reserved.
    </div>
</footer>

    <script>
        // JavaScript to add the scroll effect for the footer
        window.addEventListener('scroll', () => {
            const footer = document.querySelector('.footer');
           

            // Check if user has scrolled to the bottom of the page
            if (window.innerHeight + window.scrollY >= document.body.offsetHeight) {
               
                footer.classList.add('visible'); // Show footer
            } else {
            
                footer.classList.remove('visible'); // Hide footer
            }
        });
    </script>


    <script src="../../../js/welcome.js"></script>
</body>
</html>
