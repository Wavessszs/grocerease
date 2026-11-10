<?php
include '../../db_conn.php';

$table = $_GET['table'];
$id = $_GET['id'];

// Fetch existing data
$data_result = $conn->query("SELECT * FROM `$table` WHERE id = $id");
$row = $data_result->fetch_assoc();
$columns_result = $conn->query("SHOW COLUMNS FROM `$table`");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            padding: 10px 15px;
            margin: 5px;
            border: none;
            border-radius: 4px;
            color: white;
            background-color: #007BFF;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Update Record</h1>
        <form action="crud_update.php" method="post">
            <input type="hidden" name="table" value="<?php echo htmlspecialchars($table); ?>">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
            <?php while ($column = $columns_result->fetch_assoc()): ?>
                <label><?php echo htmlspecialchars($column['Field']); ?>:</label>
                <input type="text" name="<?php echo htmlspecialchars($column['Field']); ?>" value="<?php echo htmlspecialchars($row[$column['Field']]); ?>" required>
            <?php endwhile; ?>
            <button type="submit" name="action" value="update">Update</button>
        </form>
    </div>
</body>
</html>

<?php $conn->close(); ?>
