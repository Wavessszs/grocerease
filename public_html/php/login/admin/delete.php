<?php
include '../../db_conn.php';

$action = $_POST['action'];
$table = trim($_POST['table']);
$id = trim($_POST['id']) ?? null;

if ($action === 'update') {
    // Redirect to update form
    header("Location: update.php?table=$table&id=$id");
    exit();
} elseif ($action === 'delete') {
    if ($id) {
        $stmt = $conn->prepare("DELETE FROM `$table` WHERE id = ?");
        $stmt->bind_param("i", $id);
        if ($stmt->execute()) {
            echo "Record deleted successfully. <a href='admin_dashboard.php'>Go back</a>";
        } else {
            echo "Error deleting record: " . $conn->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>
