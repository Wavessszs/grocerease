<?php
include '../../db_conn.php';
session_start();

$userId = $_SESSION['user_id'] ?? null;
$userRole = $_SESSION['role'] ?? null;

// Ensure the user is logged in and has the admin role
if (!$userId || $userRole !== 'admin') {
    header('Location: ../login.php');
    exit();
}

// Fetch columns for the 'items' table to dynamically generate the form fields
$table = 'items';
$columns_result = $conn->query("SHOW COLUMNS FROM `$table`");
?>

<?php include 'admin_header.php'; ?>

<style>body {
    font-family: 'Arial', sans-serif;
    background-color: #f0f0f0;
    color: #333;
    padding: 50px 0;
}

.container {
    max-width: 100%; /* Adjusted width for better layout */
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding-top: 80px;
    padding-left: 100px;
}

h1 {
    text-align: left;
    color: #444;
    margin-bottom: 30px;
    font-size: 2em;
}

input[type="text"],
input[type="number"],
textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

input:focus,
textarea:focus {
    border-color: #007BFF;
    box-shadow: 0 0 8px rgba(0, 123, 255, 0.2);
}

button {
    padding: 10px 20px;
    margin-top: 10px;
    border: none;
    border-radius: 4px;
    color: white;
    background-color: green;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

button:hover {
    background-color: white;
    color: green;
}

.button-container {
    text-align: right; /* Align the button to the right */
}

#eanError {
    color: red;
    display: none;
}

</style>

<div class="container">
    <h1>Add New Item</h1>
    <form action="new_entry_process.php" method="post" onsubmit="return validateEAN()">
        <input type="hidden" name="table" value="<?php echo htmlspecialchars($table); ?>">
        
        <?php while ($column = $columns_result->fetch_assoc()): ?>
            <?php if ($column['Field'] != 'id' && $column['Field'] != 'created_at' && $column['Field'] != 'updated_at'): // Exclude auto-incrementing and timestamp fields ?>
                
                <label for="<?php echo htmlspecialchars($column['Field']); ?>">
                    <?php echo htmlspecialchars(ucwords(str_replace('_', ' ', $column['Field']))); ?>:
                </label>
                
                <?php if ($column['Field'] == 'description'): // Use textarea for description ?>
                    <textarea name="<?php echo htmlspecialchars($column['Field']); ?>" required></textarea>
                
                <?php elseif ($column['Field'] == 'EAN'): // Restrict EAN to 13 digits ?>
                    <input 
                        type="text" 
                        name="EAN" 
                        maxlength="13" 
                        oninput="validateEANLength(this)" 
                        required
                    >
                    <span id="eanError" style="color: red; display: none;">EAN must be exactly 13 digits.</span>
                    
                <?php else: ?>
                    <input 
                        type="<?php echo ($column['Field'] == 'price' || $column['Field'] == 'stock_quantity') ? 'number' : 'text'; ?>" 
                        name="<?php echo htmlspecialchars($column['Field']); ?>" 
                        <?php echo ($column['Field'] == 'price') ? 'step="0.01"' : ''; ?>
                        required
                    >
                <?php endif; ?>
            <?php endif; ?>
        <?php endwhile; ?>
        <div class="button-container">
    <button type="submit" name="action" value="add">Add Item</button>
</div>

    </form>
</div>

<script>
// Restrict EAN to exactly 13 digits
function validateEANLength(input) {
    var eanError = document.getElementById('eanError');

    if (input.value.length !== 13 && input.value.length > 0) {
        eanError.style.display = 'inline'; // Show error message
        input.setCustomValidity('EAN must be exactly 13 digits.');
    } else {
        eanError.style.display = 'none'; // Hide error message
        input.setCustomValidity(''); // Reset the custom validity
    }
}
</script>

<?php include 'footer.php'; ?>

<?php $conn->close(); ?>
