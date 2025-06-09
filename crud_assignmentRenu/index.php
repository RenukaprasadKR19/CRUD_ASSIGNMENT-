<?php
include 'db.php';

$result = $conn->query("SELECT * FROM records ORDER BY id DESC");
?>

<a href="create.php">Add New Record</a>

<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>ID</th><th>Name</th><th>Birth Date</th><th>Gender</th><th>Preferences</th><th>File</th><th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php while($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= htmlspecialchars($row['name']) ?></td>
            <td><?= $row['birth_date'] ?></td>
            <td><?= $row['gender'] ?></td>
            <td><?= htmlspecialchars($row['preferences']) ?></td>
            <td>
                <?php if ($row['file_path']): ?>
                    <a href="download.php?id=<?= $row['id'] ?>">Download</a>
                <?php else: ?>
                    No file
                <?php endif; ?>
            </td>
            <td>
                <a href="edit.php?id=<?= $row['id'] ?>">Edit</a> | 
                <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('Are you sure?');">Delete</a>
            </td>
        </tr>
    <?php endwhile; ?>
    </tbody>
</table>
