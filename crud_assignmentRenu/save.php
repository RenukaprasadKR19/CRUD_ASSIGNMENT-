<?php
include 'db.php';

if(isset($_POST['submit'])) {
    $id = $_POST['id'] ?? null; // For update
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $birth_date = $_POST['birth_date'];
    $gender = $_POST['gender'];
    $preferences = isset($_POST['preferences']) ? implode(',', $_POST['preferences']) : '';

    $upload_dir = 'uploads/';
    $file_path = '';

    // Handle file upload
    if(isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        $allowed_types = ['image/jpeg', 'image/png', 'application/pdf'];
        if(in_array($_FILES['file']['type'], $allowed_types)) {
            if($_FILES['file']['size'] <= 2 * 1024 * 1024) { // 2MB limit
                $filename = time().'_'.basename($_FILES['file']['name']);
                $target_file = $upload_dir . $filename;
                if(move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                    $file_path = $conn->real_escape_string($target_file);
                } else {
                    die("Failed to upload file.");
                }
            } else {
                die("File size exceeds 2MB.");
            }
        } else {
            die("Invalid file type.");
        }
    } else {
        if ($id) {
            // For update, keep existing file path if no new file uploaded
            $result = $conn->query("SELECT file_path FROM records WHERE id=$id");
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $file_path = $row['file_path'];
            }
        }
    }

    if ($id) {
        // Update existing record
        $stmt = $conn->prepare("UPDATE records SET name=?, description=?, birth_date=?, gender=?, preferences=?, file_path=? WHERE id=?");
        $stmt->bind_param("ssssssi", $name, $description, $birth_date, $gender, $preferences, $file_path, $id);
        $stmt->execute();
        $stmt->close();
    } else {
        // Insert new record
        $stmt = $conn->prepare("INSERT INTO records (name, description, birth_date, gender, preferences, file_path) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $description, $birth_date, $gender, $preferences, $file_path);
        $stmt->execute();
        $stmt->close();
    }

    header("Location: index.php");
    exit;
}
?>
