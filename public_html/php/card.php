<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Cards</title>
    <style>
        .product-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            padding: 20px;
        }
        .product-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0px 2px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            background-color: white;
            transition: transform 0.3s ease; /* Add transition for hover effect */
        }
        .product-card img {
            max-width: 100%;
            height: auto;
        }
        .product-card h3 {
            font-size: 1.2em;
            margin: 10px 0;
            color: #555;
        }
        .product-card p {
            color: #555;
            font-size: 1em;
            padding: 0 10px;
        }
        .product-card .price {
            font-weight: bold;
            color: #4CAF50;
            font-size: 1.2em;
            margin: 10px 0;
        }
        .product-card:hover {
            transform: scale(1.05); /* Slight zoom effect on hover */
        }
        @media (max-width: 768px) {
            .product-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        @media (max-width: 480px) {
            .product-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>

    <div class="product-grid">
        <?php
           include 'db_conn.php';

            // Fetch product details from the database
            $sql = "SELECT name, description, price, image_url FROM items"; // Adjust limit as needed
            $result = $conn->query($sql);

            // Check if any products were returned
            if ($result->num_rows > 0) {
                // Output data for each product
                while ($row = $result->fetch_assoc()) {
                    echo '
                        <div class="product-card">
                            <img src="' . $row["image_url"] . '" alt="Product Image">
                            <h3>' . $row["name"] . '</h3>
                            <p>' . $row["description"] . '</p>
                            <div class="price">P' . $row["price"] . '</div>
                        </div>
                    ';
                }
            } else {
                echo '<p>No products available.</p>';
            }

            // Close connection
            $conn->close();
        ?>
    </div>

</body>
</html>
