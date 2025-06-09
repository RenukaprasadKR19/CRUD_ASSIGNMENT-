<?php
include 'db.php';
$id = $_GET['id'] ?? 0;

$result = $conn->query("SELECT file_path FROM records WHERE id = $id");
if ($result->num_rows == 0) {
    die("File not found.");
}

$row = $result->fetch_assoc();
$file = $row['file_path'];

if (!file_exists($file)) {
    die("File does not exist.");
}

header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename="' . basename($file) . '"');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($file));
readfile($file);
exit;
?>
