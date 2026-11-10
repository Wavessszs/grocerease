<?php
function renderProductCarousel($category, $conn) {
    $sql = "SELECT id, name, description, price, image_url FROM items WHERE category = '$category'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
                <div class="product-card" data-product-id="' . $row["id"] . '" onclick="window.location.href=\'product.php?id=' . $row["id"] . '\'">
                    <img src="' . $row["image_url"] . '" alt="' . htmlspecialchars($row["name"]) . '">
                    <h3>' . htmlspecialchars($row["name"]) . '</h3>
                    <p>' . htmlspecialchars($row["description"]) . '</p>
                    <div class="price">P' . number_format($row["price"], 2) . '</div>
                    <div class="quantity-selector">
                        <button class="decrease">-</button>
                        <span class="quantity">1</span>
                        <button class="increase">+</button>
                    </div>
                    <button class="add-to-cart" onclick="addToCart(' . $row["id"] . ', \'' . htmlspecialchars($row["name"]) . '\')">Add to Cart</button>
                </div>
            ';
        }
    } else {
        echo '<p>No products available in ' . htmlspecialchars($category) . '.</p>';
    }
}

function getRandomProducts($conn) {
    $sql = "SELECT id, name, description, price,distributor, image_url FROM items ORDER BY RAND() LIMIT 10";
    $result = $conn->query($sql);

     if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Choose discount tag based on the 'location' column
            $discountTag = "";
            if ($row["distributor"] === 'SM') {
                $discountTag = '<img src="../../../images/SM.png" alt="Online Discount" class="discount-photo">';
            } elseif ($row["distributor"] === 'CSI') {
                $discountTag = '<img src="../../../images/CSI.png" alt="In-Store Discount" class="discount-photo">';
            } elseif ($row["distributor"] === 'MAGIC') {
                $discountTag = '<img src="../../../images/MAGIC.png" alt="Special Discount" class="discount-photo">';
            }

            echo '
                <div class="product-card" data-product-id="' . $row["id"] . '" onclick="window.location.href=\'product.php?id=' . $row["id"] . '\'">
                    <!-- Product image container -->
                    <div class="product-image-container">
                        <img src="' . $row["image_url"] . '" alt="' . htmlspecialchars($row["name"]) . '">
                        ' . $discountTag . ' <!-- Discount tag image overlaid -->
                    </div>
                    <h3>' . htmlspecialchars($row["name"]) . '</h3>
                    <p>' . htmlspecialchars($row["description"]) . '</p>
                    <div class="price">P' . number_format($row["price"], 2) . '</div>
                    <div class="quantity-selector">
                        <button class="decrease">-</button>
                        <span class="quantity">1</span>
                        <button class="increase">+</button>
                    </div>
                    <button class="add-to-cart" onclick="addToCart(' . $row["id"] . ', \'' . htmlspecialchars($row["name"]) . '\')">Add to Cart</button>
                </div>
            ';
        }
    } else {
        echo '<p>No products available in ' . htmlspecialchars($category) . '.</p>';
    }
}
function PANGTAGS($tags, $conn) {
    $sql = "SELECT id, name, description, price, image_url FROM items WHERE tags = '$tags'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
                <div class="product-card" data-product-id="' . $row["id"] . '" onclick="window.location.href=\'product.php?id=' . $row["id"] . '\'">
                    <img src="' . $row["image_url"] . '" alt="' . htmlspecialchars($row["name"]) . '">
                    <h3>' . htmlspecialchars($row["name"]) . '</h3>
                    <p>' . htmlspecialchars($row["description"]) . '</p>
                    <div class="price">P' . number_format($row["price"], 2) . '</div>
                    <div class="quantity-selector">
                        <button class="decrease">-</button>
                        <span class="quantity">1</span>
                        <button class="increase">+</button>
                    </div>
                    <button class="add-to-cart" onclick="addToCart(' . $row["id"] . ', \'' . htmlspecialchars($row["name"]) . '\')">Add to Cart</button>
                </div>
            ';
        }
    } else {
        echo '<p>No products available in ' . htmlspecialchars($category) . '.</p>';
    }
}

function rdpc($tags, $conn) {
    $sql = "SELECT id, name, description, price, image_url, distributor FROM items WHERE tags = '$tags'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Choose discount tag based on the 'location' column
            $discountTag = "";
            if ($row["distributor"] === 'SM') {
                $discountTag = '<img src="../../../images/SM.png" alt="Online Discount" class="discount-photo">';
            } elseif ($row["distributor"] === 'CSI') {
                $discountTag = '<img src="../../../images/CSI.png" alt="In-Store Discount" class="discount-photo">';
            } elseif ($row["distributor"] === 'MAGIC') {
                $discountTag = '<img src="../../../images/MAGIC.png" alt="Special Discount" class="discount-photo">';
            }

            echo '
                <div class="product-card" data-product-id="' . $row["id"] . '" onclick="window.location.href=\'product.php?id=' . $row["id"] . '\'">
                    <!-- Product image container -->
                    <div class="product-image-container">
                        <img src="' . $row["image_url"] . '" alt="' . htmlspecialchars($row["name"]) . '">
                        ' . $discountTag . ' <!-- Discount tag image overlaid -->
                    </div>
                    <h3>' . htmlspecialchars($row["name"]) . '</h3>
                    <p>' . htmlspecialchars($row["description"]) . '</p>
                    <div class="price">P' . number_format($row["price"], 2) . '</div>
                    <div class="quantity-selector">
                        <button class="decrease">-</button>
                        <span class="quantity">1</span>
                        <button class="increase">+</button>
                    </div>
                    <button class="add-to-cart" onclick="addToCart(' . $row["id"] . ', \'' . htmlspecialchars($row["name"]) . '\')">Add to Cart</button>
                </div>
            ';
        }
    } else {
        echo '<p>No products available in ' . htmlspecialchars($category) . '.</p>';
    }
}
?>

<script>
function addToCart(productId, productName) {
    // You can replace this alert with actual AJAX or form submission logic to add the item to the cart
    alert(productName + " has been added to your cart.");
    
    // Add your logic to update the cart here
}
</script>
