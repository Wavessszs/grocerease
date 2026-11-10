<?php
include '../../header.php';
include '../../db_conn.php';

// Get initial query parameters (if any)
$query = isset($_GET['betlog']) ? $_GET['betlog'] : '';
$searchQuery = $conn->real_escape_string($query);

// SQL to fetch products including the search query
$sql = "SELECT id, name, description, price, image_url FROM items WHERE (name LIKE '%$searchQuery%' OR category LIKE '%$searchQuery%' OR tags LIKE '%$searchQuery%')";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Search Results for "<?php echo htmlspecialchars($query); ?>"</title>
    <style>/* Basic reset */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    color: #333;
    padding: 20px;
    margin-top: 60px;
}

h1 {
    font-size: 24px;
    color: #2c3e50;
    margin-bottom: 20px;
}

.container {
    display: flex;
    gap: 20px;
    margin-top: 20px;
}

/* Filter container styles */
.filter-container {
    width: 250px;
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.filter-item {
    margin-bottom: 15px;
    position: relative;
}

.category-select {
    position: relative;
}

.sub-options {
    display: none; /* Hide sub-options initially */
    position: absolute; /* Position it below the select */
    top: 100%; /* Below the category select */
    left: 0;
    background-color: #ffffff; /* Match the select background */
    border: 1px solid #ddd; /* Border for the main dropdown */
    z-index: 1000; /* Make sure it's above other elements */
    width: 100%; /* Full width for dropdown */
    border-radius: 4px; /* Slightly rounded corners */
    overflow: hidden; /* Clip any overflow */
}

.category-select:hover .sub-options {
    display: block; /* Show on hover */
}

.sub-option {
    position: relative; /* To position sub-sub-options */
    border-top: 1px solid #ddd; 

}


.sub-option a {
 
    text-decoration: none; /* Removes the underline */
    color: inherit;/* Border for separation */
}
.sub-option:first-child {
    border-top: none; /* Remove the top border for the first option */
}

.sub-sub-options {
    display: none; /* Hide sub-sub-options initially */
    position: absolute; /* Position it to the right of the sub-option */
    top: 0;
    left: 100%; /* Show to the right of the parent */
    margin-left: 0; /* Remove margin to eliminate gaps */
    background-color: #ffffff; /* Match background */
    border: 1px solid #ddd; /* Border for sub-sub-options */
    z-index: 1000;
    border-radius: 4px; /* Rounded corners */
    
}

.sub-option:hover .sub-sub-options {
    display: block; /* Show sub-sub-options on hover */
}

.sub-sub-option {
    display: flex; /* Use flexbox for alignment */
    align-items: center; /* Center items vertically */
    justify-content: center; /* Center items horizontally */
    height: 60px; 
    width: 120px;/* Fixed height for uniformity */
    padding: 5px 10px; /* Add some padding for clickable areas */
    border-top: 1px solid #ddd; /* Top border for separation */
    cursor: pointer; /* Pointer cursor for sub-sub-options */
    text-decoration: none; /* Removes the underline */
    color: inherit;
}

.sub-sub-option:first-child {
    border-top: none; /* Remove the top border for the first sub-sub-option */
}

.sub-sub-option:hover {
    background-color: #f0f0f0; /* Light gray background on hover */
}

.filter-item label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
}

.filter-item select {
    width: 100%;
    padding: 8px;
    border-radius: 4px;
    border: 1px solid #ddd;
}

/* Card container */
.card-container {
    flex-grow: 1;
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.card {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 8px;
    width: 250px;
    text-align: center;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.2s;
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Align items */
}

.card:hover {
    transform: scale(1.05);
}

.card img {
    width: 100%;
    border-top-left-radius: 8px;
    border-top-right-radius: 8px;
}

.card h2 {
    font-size: 18px;
    color: #2c3e50;
    margin: 10px 0;
}

.card p {
    margin: 5px 0;
    color: #555;
}

.card a {
    padding: 10px;
    background-color: #28a745; /* Green accent */
    color: #fff;
    text-decoration: none;
    border-radius: 4px;
    margin-top: auto; /* Push button to the bottom */
    transition: background-color 0.3s;
}

.card a:hover {
    background-color: #218838; /* Darker green on hover */
}

.sub-sub-option a {
    text-decoration: none; /* Removes the underline */
    color: inherit; /* Inherits the color from the parent element */
}

.sub-sub-option a:hover {
    color: #28a745; /* Change to your desired hover color */
}
.category-select {
    margin-top: 20px;
    /* Set a solid border with desired thickness and color */
    border-radius: 4px; /* Optional: adds rounded corners */
    padding: 5px; /* Optional: adds some padding inside the border */
    position: relative; /* Maintain the relative positioning for dropdowns */
}
.category-select:hover {
    background-color: #f0f0f0;
     transition: background-color 1s; /* Change to red on hover */
}

.sub-option{
    padding:10px;
}
.category-type {
    color: #000; /* Initial text color */
    transition: color 0.3s; /* Smooth transition effect */
}

.category-type:hover {
    color:#28a745; /* Change to red on hover */
}

    </style>
</head>
<body>

<div class="search-result">
    <h1>Search Results for "<?php echo htmlspecialchars($query); ?>"</h1>
</div>

<div class="container">
    <!-- Filter Section -->
    <div class="filter-container">
        <h2>Filters</h2>

        <!-- Category Filter -->
<div class="filter-item"><label class="cats" for="category">Category</label>
<div class="category-select">
   <div class="sub-option">
    <a href="searchpage.php?betlog=GROCERY">
    <label class="category-type" for="grocery-type">Grocery</label>
    </a>
    <div class="sub-sub-options">
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=SNACKS">
                <label>Snacks</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=SAUCES">
                <label>Sauces</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=MEAT">
                <label>Meat</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=SEAFOOD">
                <label>Seafood</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=DAIRY">
                <label>Dairy</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=CANNED">
                <label>Canned</label>
            </a>
        </div>
    </div>
</div>

<!-- Beverages Options -->
<div class="sub-option">
    <a href="searchpage.php?betlog=BEVERAGES">
    <label class="category-type" for="beverage-type">Beverages</label>
    </a>
    <div class="sub-sub-options">
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=DRINKS">
                <label>Drinks</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=WATER">
                <label>Water</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=ALCOHOL">
                <label>Alcohol</label>
            </a>
        </div>
    </div>
</div>

<!-- Households Options -->
<div class="sub-option">
    <a href="searchpage.php?betlog=HOUSEHOLD">
    <label class="category-type" for="household-type">Households</label>
    </a>
    <div class="sub-sub-options">
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=LAUNDRY">
                <label>Laundry</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=TOOLS">
                <label>Tools</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=INSECTICIDES">
                <label>Insecticides</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=FRESHENERS">
                <label>Fresheners</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=PEST">
                <label>Pest Control</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=HOUSE">
                <label>House Care</label>
            </a>
        </div>
    </div>
</div>

<!-- Health Options -->
<div class="sub-option">
    <a href="searchpage.php?betlog=HEALTH">
    <label class="category-type" for="health-type">Health</label>
    </a>
    <div class="sub-sub-options">
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=HAIR">
                <label>Hair Care</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=ORAL">
                <label>Oral Care</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=SKIN">
                <label>Skin Care</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=PERSONAL">
                <label>Personal Care</label>
            </a>
        </div>
        <div class="sub-sub-option">
            <a href="searchpage.php?betlog=BABY">
                <label>Baby Care</label>
            </a>
        </div>
    </div>
</div>

</div>

</div>


        <!-- Location Filter -->
        <div class="filter-item">
            <label for="location">Location</label>
            <select id="location">
                <option value="">Select Location</option>
                <option value="LINGAYEN">Lingayen</option>
                <option value="DAGUPAN">Dagupan</option>
                <option value="BINMALEY">Binmaley</option>
            </select>
        </div>

        <!-- Distributor Filter -->
        <div class="filter-item">
            <label for="distributor">Distributor</label>
            <select id="distributor">
                <option value="">Select Distributor</option>
                <option value="CSI">CSI</option>
                <option value="MAGIC">MAGIC</option>
                <option value="SM">SM</option>
            </select>
        </div>

        <!-- Sorting Dropdown -->
        <div class="filter-item">
            <label for="sort">Sort By</label>
            <select id="sort">
                <option value="best-selling">Best Selling</option>
                <option value="a-to-z">A to Z</option>
                <option value="z-to-a">Z to A</option>
                <option value="low-to-high">Price: Low to High</option>
                <option value="high-to-low">Price: High to Low</option>
                <option value="new">What's New</option>
            </select>
        </div>
    </div>

    <!-- Card Section -->
    <div class="card-container" id="card-container">
        <!-- Initial cards based on the search query -->
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card'>
                        <img src='{$row['image_url']}' alt='{$row['name']}'>
                        <h2>{$row['name']}</h2>
                        <p>Php{$row['price']}</p>
                        <p>{$row['description']}</p>
                        <a href='product.php?id={$row['id']}'>View Item</a>
                    </div>";
            }
        } else {
            echo "<p>No products found</p>";
        }
        ?>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Function to load filtered products via AJAX
        function loadProducts() {
            let category = $('#category').val();
            let location = $('#location').val();
            let distributor = $('#distributor').val();
            
            let sort = $('#sort').val();
            let searchQuery = '<?php echo $searchQuery; ?>'; // Pass the search query

            $.ajax({
                url: 'filter.php', // Backend script to process the filtering
                method: 'POST',
                data: {
                    category: category,
                    location: location,
                    distributor: distributor,
                    sort: sort,
                    search: searchQuery // Include search query in the data
                },
                success: function(response) {
                    $('#card-container').html(response);
                }
            });
        }

        // Trigger AJAX filter on change of any filter inputs
        $('#category, #location, #distributor, #sort').on('change', loadProducts);

        // Initial load
        loadProducts();
    });
const categorySelect = document.getElementById("category");
const subOptions = document.querySelectorAll(".sub-option");

categorySelect.addEventListener("change", function () {
    subOptions.forEach(option => {
        option.style.display = "none"; // Hide all sub-options
    });

    // Show corresponding sub-options based on selection
    if (categorySelect.value) {
        const selectedOption = categorySelect.value + "-options"; // Match the class name
        document.querySelector(`.${selectedOption}`).style.display = "block";
    }
});

</script>

</body>
</html>

<?php
$conn->close();
?>
