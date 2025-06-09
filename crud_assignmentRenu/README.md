# PHP CRUD Application with File Upload

## 📋 Project Overview

This is a beginner-friendly **CRUD (Create, Read, Update, Delete)** web application built using **PHP** and **MySQL**, featuring **file upload**, **checkboxes**, **radio buttons**, and a **date picker**. The project demonstrates a full-stack implementation using native PHP and HTML.

---

## ✅ Features Implemented

- 📝 Create records with:
  - Text input (e.g., Name)
  - Textarea (e.g., Description)
  - Date picker (e.g., Date of Birth)
  - Radio buttons (e.g., Gender)
  - Checkboxes (e.g., Preferences)
  - File upload (e.g., Profile Picture or Document)

- 📄 Read/View records in a table format

- ✏️ Update existing records, including replacing uploaded files

- ❌ Delete records and associated files

- 📥 Download uploaded files

---

## 🛠️ Technologies Used

- **Frontend**: HTML, CSS (optional: Bootstrap)
- **Backend**: PHP (Procedural style)
- **Database**: MySQL
- **Server**: XAMPP / Apache

---

## 🗃️ Database Setup

1. Open **phpMyAdmin** or MySQL CLI.
2. Create the database:

```sql
CREATE DATABASE crud_assignment;
Select the database and create the records table:

sql
Copy
Edit
USE crud_assignment;

CREATE TABLE records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    description TEXT,
    birth_date DATE,
    gender VARCHAR(10),
    preferences VARCHAR(255),
    file_path VARCHAR(255)
);
📁 Project File Structure
pgsql
Copy
Edit
/crud_project/
├── create.php          # Form to add a new record
├── edit.php            # Form to edit existing record
├── index.php           # Displays all records
├── save.php            # Handles create/update logic
├── delete.php          # Handles record deletion
├── download.php        # Handles file download
├── db.php              # Database connection
├── uploads/            # Folder where uploaded files are stored
├── style.css           # Optional CSS styling
└── README.md           # Project documentation
🔧 How to Run the Project
1. Requirements
PHP 7.x or 8.x

MySQL 5.x or 8.x

XAMPP, WAMP, or any LAMP stack

2. Setup Steps
Clone or download the project files into your XAMPP htdocs folder:

makefile
Copy
Edit
C:\xampp\htdocs\crud_project\
Create a folder named uploads inside the project root:

bash
Copy
Edit
crud_project/uploads/
Ensure write permissions for the uploads/ directory.

Start Apache and MySQL from XAMPP.

Import the SQL schema into phpMyAdmin under the database crud_assignment.

Configure the database connection in db.php if needed:

php
Copy
Edit
$host = "localhost";
$user = "root";
$password = "";
$dbname = "crud_assignment";
Visit the application in your browser:

arduino
Copy
Edit
http://localhost/crud_project/index.php
📌 Important Notes
Uploaded files are saved in the /uploads/ folder.

File uploads are limited to common types like JPG, PNG, PDF (can be modified in save.php).

File size is restricted to 2MB (adjustable).

Form inputs are validated both on the frontend (via HTML5) and backend (via PHP).

Records can be edited or deleted directly from the table view.

Old files are deleted from the server during record deletion.

🌟 Bonus Features (Optional)
✅ Pagination (e.g., 10 records per page)

🔍 Search and filter functionality

🎨 Styled with Bootstrap

🔒 Secure login system (using sessions)

🚀 Deployed to a live server (if needed)

📸 Screenshots
(Add screenshots here in the final version)

bash
Copy
Edit
/screenshots/home.png
/screenshots/create-form.png
/screenshots/edit-form.png
/screenshots/file-download.png
📞 Support
If you face any issues or have questions, feel free to reach out to your instructor or project mentor.

👨‍💻 Author
Name: Renukaprasad K R

Email: renuprasadkr444@gmail.com

Internship/Project: I-STEM Internship Assignment

📄 License
This project is free to use for learning and academic purposes.

yaml
Copy
Edit

---

Let me know if you'd like me to generate the screenshots or package the code into a `.zip` file for easier sharing.







