<?php 
session_start();
include 'db_conn.php';
$userId = $_SESSION['user_id'] ?? null;
$stmt = $conn->prepare("SELECT full_name FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($userName);
$stmt->fetch();

// Close connections
$stmt->close();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,opsz,wght@0,6..72,200..800;1,6..72,200..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;1,300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <style>
        /* Ensure the body has no default margin and padding */
        body {
            margin: 0;
            padding: 0;
            padding-top: 100px; /* Account for fixed header height */
        }

        .search {
            width: 500px;
            position: relative;
        }

        #search {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 20px;
            box-sizing: border-box;
        }

        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            border: 1px solid #426b1f;
            border-radius: 8px;
            background-color: #fff;
            max-height: 150px;
            overflow-y: auto;
            display: none;
            z-index: 1000;
        }

        .dropdown li {
            padding: 10px;
            cursor: pointer;
        }

        .dropdown li:hover {
            background-color: #f0f0f0;
        }

        /* Style for side panel */
        .sidepanel {
            height: 100%;
            width: 0;
            position: fixed;
            top: 0;
            right: 0;
            background-color: #f8f9fa;
            overflow-x: hidden;
            transition: width 0.5s;
            padding-top: 100px;
            z-index: 999;
            box-shadow: -2px 0 5px rgba(0, 0, 0, 0.1);
        }

        /* Style for side panel when open */
        .sidepanel.open {
            width: 800px; /* Width of the side panel when open */
        }

        /* Style for side panel links */
        .sidepanel a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 22px;
            color: #333;
            display: block;
            transition: color 0.3s;
        }

        .sidepanel a:hover {
            color: #007bff;
        }

        /* Style for close button */
        .sidepanel .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            cursor: pointer;
        }

        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 60px;
            background-color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            transition: padding 0.3s ease, background-color 0.3s ease;
            z-index: 1000;
        }

        .header.shrink {
            padding: 10px 20px;
            background-color: rgba(51, 51, 51, 0.425);
        }

        .logo img {
            height: 40px; /* Adjust logo size */
        }
/* General nav styles */
.nav {
    margin-right: 100px;
}

.nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
    display: flex;
    gap: 10px; /* Adds space between buttons */
    justify-content: center;
    align-items: center;
}

/* General button styles for the nav buttons */
.nav button {
    background-color: #426b1f; /* Button background color */
    color: white; /* Text color */
    border: none; /* Remove default border */
    border-radius: 20px; /* Rounded corners */
    padding: 10px 15px; /* Padding for better click area */
    font-size: 16px; /* Adjust font size */
    font-weight: 500; /* Slightly bolder text */
    cursor: pointer; /* Change cursor to pointer */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Smooth transitions */
}

/* Hover and focus effects for general buttons */
.nav button:hover {
    background-color: #365e14; /* Darker background on hover */
    transform: translateY(-2px); /* Slight lift effect */
}

.nav button:focus {
    outline: none; /* Remove default outline on focus */
    box-shadow: 0 0 5px rgba(66, 107, 31, 0.5); /* Optional shadow for focus */
}

/* Username button styles - add specificity to override general styles */
.nav .username-btn {
    background-color: white; /* White background */
    color: #426b1f; /* Green text color */
    /* border: 2px solid #426b1f; Green border */
    border: none;
    border-radius: 20px; /* Rounded corners */
    padding: 10px 30px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    transition: background-color 0.3s ease, color 0.3s ease;
}

/* Hover effect for the username button */
.nav .username-btn:hover {
    background-color: #426b1f; /* Green background on hover */
    color: white; /* White text on hover */
}

/* Focus state for the username button */
.nav .username-btn:focus {
    outline: none;
    box-shadow: 0 0 5px rgba(66, 107, 31, 0.5); /* Optional shadow for focus */
}


    </style>
</head>
<body>
    <header class="header" id="header">
        <div onclick="window.location.href='welcome.php';" class="logo">
            <img src="../../../images/logo.png" alt="Logo" />
        </div>
        <div class="search">
            <form action="searchpage.php" method="get">
                <input type="text" id="search" name="betlog" placeholder="Search..." oninput="filterFunction()">
            </form>
            <ul id="dropdown" class="dropdown">
                <!-- Suggestions will be dynamically added here -->
            </ul>
        </div>
        <nav class="nav">
            <ul>
                <li><button class="username-btn" onclick="window.location.href='user_profile.php';"><?php echo htmlspecialchars($userName); ?></button></li>
                <li><button onclick="toggleNav()"><span class="material-symbols-outlined">shopping_cart</span></button></li>
            </ul>
        </nav>
    </header>

    <div id="mySidepanel" class="sidepanel">
        <div id="cartContent">
            <!-- Cart content will be dynamically added here -->
        </div>
    </div>

    <script>
        let isOpen = false; // Track whether the side panel is open

        function toggleNav() {
            const sidepanel = document.getElementById("mySidepanel");
            if (isOpen) {
                sidepanel.classList.remove("open");
                isOpen = false;
            } else {
                sidepanel.classList.add("open");
                loadCartContent();
                isOpen = true;
            }
        }
        window.onscroll = function () {
    const header = document.querySelector('.header');
    const search = document.getElementById('search');
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
        header.classList.add('shrink');
        search.style.backgroundColor = 'white'; // Change to white on scroll
    } else {
        header.classList.remove('shrink');
        search.style.backgroundColor = '#F9F6EE'; // Change back to light green
    }
};

        function loadCartContent() {
            const cartContent = document.getElementById('cartContent');
            fetch('viewcart.php')
                .then(response => response.text())
                .then(data => {
                    cartContent.innerHTML = data;
                })
                .catch(error => {
                    console.error('Error fetching cart content:', error);
                    cartContent.innerHTML = '<p>Failed to load cart content.</p>';
                });
        }

        // Function to handle the search input
        function filterFunction() {
            const searchInput = document.getElementById('search').value;

            if (searchInput.length < 2) {
                document.getElementById('dropdown').style.display = 'none';
                return;
            }

            // Fetch search results from 'search.php'
            fetch(`../../serts.php?q=${encodeURIComponent(searchInput)}`)
                .then(response => {
                    if (!response.ok) {
                        console.error(`Network response was not ok: ${response.status} ${response.statusText}`);
                        throw new Error(`Network response was not ok: ${response.statusText}`);
                    }
                    return response.json(); // Parse JSON if the response is okay
                })
                .then(data => {
                    const dropdown = document.getElementById('dropdown');
                    dropdown.innerHTML = ''; // Clear previous results

                    if (data.length === 0) {
                        dropdown.style.display = 'none'; // Hide dropdown if no data
                        return;
                    }

                    // Show dropdown with results
                    dropdown.style.display = 'block';
                    data.forEach(item => {
                        const li = document.createElement('li');
                        li.textContent = item.name;
                        li.dataset.id = item.id;
                        li.onclick = function() {
                            window.location.href = `product.php?id=${this.dataset.id}`;
                        };
                        dropdown.appendChild(li);
                    });
                })
                .catch(error => {
                    console.error('Error fetching search results:', error);
                    alert(`There was a problem fetching the search results: ${error.message}`);
                });
        }

        // Click outside to close dropdown
        document.addEventListener('click', function(event) {
            const dropdown = document.getElementById('dropdown');
            if (!dropdown.contains(event.target)) {
                dropdown.style.display = 'none';
            }
        });

        // Header shrinking effect
        window.addEventListener('scroll', function() {
            const header = document.getElementById('header');
            if (window.scrollY > 50) {
                header.classList.add('shrink');
            } else {
                header.classList.remove('shrink');
            }
        });
         function updateQuantity(productId) {
            const quantity = document.getElementById(`quantity-${productId}`).value;

            fetch('update_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ product_id: productId, quantity: quantity }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('sacses.');
                    location.reload();
                } else {
                    alert('Failed to update quantity.');
                }
            })
            .catch(error => console.error('Error:', error));
        }

        // Simplified removeFromCart function
        function removeFromCart(productId) {
            fetch('remove_from_cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({ product_id: productId }),
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('sacses.');
                    location.reload();
                } else {
                    alert('Failed to remove item from cart.');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</body>
</html>
