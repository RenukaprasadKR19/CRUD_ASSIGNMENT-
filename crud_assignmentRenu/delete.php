<?php
include 'db.php';
$id = $_GET['id'] ?? 0;

// Get file path to delete physical file
$result = $conn->query("SELECT file_path FROM records WHERE id = $id");
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if ($row['file_path'] && file_exists($row['file_path'])) {
        unlink($row['file_path']);
    }
}

// Delete record
$conn->query("DELETE FROM records WHERE id = $id");

header("Location: index.php");
exit;
?>
