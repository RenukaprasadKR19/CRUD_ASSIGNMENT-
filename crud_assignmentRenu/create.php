<form action="save.php" method="post" enctype="multipart/form-data">
    <label>Name:</label>
    <input type="text" name="name" required><br>

    <label>Description:</label>
    <textarea name="description"></textarea><br>

    <label>Date of Birth:</label>
    <input type="date" name="birth_date"><br>

    <label>Gender:</label>
    <input type="radio" name="gender" value="Male" checked> Male
    <input type="radio" name="gender" value="Female"> Female<br>

    <label>Preferences:</label>
    <input type="checkbox" name="preferences[]" value="Option1"> Option1
    <input type="checkbox" name="preferences[]" value="Option2"> Option2
    <input type="checkbox" name="preferences[]" value="Option3"> Option3<br>

    <label>Upload File:</label>
    <input type="file" name="file"><br>

    <input type="submit" name="submit" value="Save">
</form>
