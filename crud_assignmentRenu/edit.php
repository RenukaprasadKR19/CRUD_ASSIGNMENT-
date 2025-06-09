<?php
include 'db.php';
$id = $_GET['id'] ?? 0;
$result = $conn->query("SELECT * FROM records WHERE id = $id");
if ($result->num_rows == 0) {
    die("Record not found.");
}
$row = $result->fetch_assoc();
$preferences = explode(',', $row['preferences']);
?>

<form action="save.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id'] ?>">

    <label>Name:</label>
    <input type="text" name="name" value="<?= htmlspecialchars($row['name']) ?>" required><br>

    <label>Description:</label>
    <textarea name="description"><?= htmlspecialchars($row['description']) ?></textarea><br>

    <label>Date of Birth:</label>
    <input type="date" name="birth_date" value="<?= $row['birth_date'] ?>"><br>

    <label>Gender:</label>
    <input type="radio" name="gender" value="Male" <?= $row['gender'] == 'Male' ? 'checked' : '' ?>> Male
    <input type="radio" name="gender" value="Female" <?= $row['gender'] == 'Female' ? 'checked' : '' ?>> Female<br>

    <label>Preferences:</label>
    <input type="checkbox" name="preferences[]" value="Option1" <?= in_array('Option1', $preferences) ? 'checked' : '' ?>> Option1
    <input type="checkbox" name="preferences[]" value="Option2" <?= in_array('Option2', $preferences) ? 'checked' : '' ?>> Option2
    <input type="checkbox" name="preferences[]" value="Option3" <?= in_array('Option3', $preferences) ? 'checked' : '' ?>> Option3<br>

    <label>Upload File:</label>
    <?php if ($row['file_path']): ?>
        <a href="<?= htmlspecialchars($row['file_path']) ?>" target="_blank">Current file</a><br>
    <?php endif; ?>
    <input type="file" name="file"><br>

    <input type="submit" name="submit" value="Update">
</form>
