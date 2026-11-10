    <?php
    include '../../db_conn.php';
    session_start();

    $userId = $_SESSION['user_id'] ?? null;
    $userRole = $_SESSION['role'] ?? null;

    // Ensure the user is logged in and has the courier role
    if (!$userId || $userRole !== 'admin') {
        header('Location: ../login.php'); // Redirect to login if not a courier
        exit();
    }
    // Fetch tables
    $tables_result = $conn->query("SHOW TABLES");
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
        button {
            padding: 10px 20px; /* Increased padding for better touch targets */
            margin: 5px;
            border: none;
            border-radius: 5px; /* Slightly more rounded corners */
            color: white;
            background-color: #007BFF;
            font-size: 16px; /* Increased font size for better readability */
            cursor: pointer;
            transition: background-color 0.3s, transform 0.2s; /* Smooth transition for hover effects */
        }
        button:hover {
            background-color: #0056b3; /* Darker blue for hover effect */
            transform: translateY(-2px); /* Slightly lifts the button on hover */
        }
        button:active {
            transform: translateY(0); /* Resets the button position when active */
        }
        button:focus {
            outline: none; /* Remove default focus outline */
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5); /* Add a subtle shadow for focus */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Admin Panel</h1>
        <h2>Select a Table</h2>
        <form action="admin_dashboard.php" method="get">
            <select name="table" onchange="this.form.submit()">
                <option value="">Select a table</option>
                <?php while ($row = $tables_result->fetch_row()): ?>
                    <option value="<?php echo htmlspecialchars($row[0]); ?>"
                        <?php if (isset($_GET['table']) && $_GET['table'] === $row[0]) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($row[0]); ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </form>
        <button onclick="window.location.href= 'new_entry.php';">New</button>
        <?php if (isset($_GET['table'])): ?>
            <?php
            $table = $_GET['table'];

            // Fetch data from the selected table
            $data_result = $conn->query("SELECT * FROM `$table`");
            $columns_result = $conn->query("SHOW COLUMNS FROM `$table`");
            ?>
            
            <h2>Data for Table: <?php echo htmlspecialchars($table); ?></h2>
            
            <table>
                <thead>
                    <tr>
                        <?php while ($column = $columns_result->fetch_assoc()): ?>
                            <th><?php echo htmlspecialchars($column['Field']); ?></th>
                        <?php endwhile; ?>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $data_result->fetch_assoc()): ?>
                        <tr>
                            <?php foreach ($row as $value): ?>
                                <td><?php echo htmlspecialchars($value); ?></td>
                            <?php endforeach; ?>
                            <td>
                                <form action="delete.php" method="post">
                                    <input type="hidden" name="table" value="<?php echo htmlspecialchars($table); ?>">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                    <button type="submit" name="action" value="update">Update</button>
                                </form>
                                <form action="delete.php" method="post">
                                    <input type="hidden" name="table" value="<?php echo htmlspecialchars($table); ?>">
                                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">
                                    <button type="submit" name="action" value="delete">Delete</button>
                                </form>
                            
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php endif; ?>
    </div>
</body>
</html>

<?php $conn->close(); ?>
