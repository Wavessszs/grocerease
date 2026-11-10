<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .navbar {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 9999; /* Ensures navbar stays on top */
        }
        
        .nav-sidebar {
            position: fixed;
            top: 40px; /* Adjusted height for fixed navbar */
            left: 0;
            width: 50px;
            height: calc(100vh - 0px); /* Full height minus the navbar */
            background-color: #333;
            padding: 1rem;
            transition: width 0.5s;
            z-index: 9999; 
        }

        .nav-sidebar:hover {
            width: 180px;
        }

        .nav-sidebar .nav-link {
            text-align: center;
        }

        .nav-sidebar .nav-link span {
            display: none;
        }

        .nav-sidebar:hover .nav-link {
            text-align: left;
        }

        .nav-sidebar:hover .nav-link span {
            display: inline;
        }

        /* Dropdown menu styling */
        .nav-sidebar .dropdown-menu {
            background-color: #333; /* Matches the sidebar color */
            border: none;
        }

        .nav-sidebar .dropdown-item {
            color: white;
        }

        .nav-sidebar .dropdown-item:hover {
            background-color: #444; /* Slightly lighter background on hover */
        }

        /* Main content */
        .main-content {
            margin-left: 50px; /* Sidebar width */
            margin-top: 30px; /* Add some space between navbar and main content */
            padding: 1rem;
            transition: margin-left 0.5s;
}

        .nav-sidebar:hover ~ .main-content {
            margin-left: 200px;
        }

        .nav-sidebar .nav-item ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: none; /* Hide the submenu by default */
        }
        
        .nav-sidebar:hover .nav-item ul {
            display: block; /* Show the submenu on hover */
        }
        
        .nav-sidebar .nav-item ul li {
            padding: 0.5rem;
        }
        
        .nav-sidebar .nav-item ul li a {
            color: white;
            text-decoration: none;
        }
        
        .nav-sidebar .nav-item ul li a:hover {
            background-color: #444;
        }
        
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#">Admin Panel</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            </ul>
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="profile.php">Profile</a>
                    <a class="dropdown-item" href="../../logout.php">Logout</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="nav-sidebar bg-dark">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link text-white" href="admin.php"><i class="fas fa-tachometer-alt"></i><span> Dashboard</span></a></li>
            
            <!-- Modified Items menu -->
            <li class="nav-item">
                <a class="nav-link text-white" href="#" data-toggle="collapse" data-target="itemsSubMenu" aria-expanded="false" aria-controls="itemsSubMenu">
                    <i class="fas fa-boxes"></i><span> Products</span><i class="fas fa-caret-down"></i>
                </a>
                <div class="collapse" id="itemsSubMenu">
                    <ul>
                        <li class="nav-item"><a class="nav-link text-white" href="items.php">View Items</a></li>
                        <li class="nav-item"><a class="nav-link text-white" href="new_entry.php">Add New Item</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item"><a class="nav-link text-white" href="orders.php"><i class="fas fa-clipboard-list"></i><span> Order Items</span></a></li>
            <li class="nav-item"><a class="nav-link text-white" href="registered_user.php"><i class="fas fa-users"></i><span> Registered Users</span></a></li>
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script>
    $(document).ready(function() {
        // Enable collapse interaction on click
        $('.nav-link[data-toggle="collapse"]').click(function(e) {
            e.preventDefault();
            var $el = $(this).parent().find('.collapse');
            $el.toggleClass('show');
        });
    });
</script>
    <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script>
</body>
</html>