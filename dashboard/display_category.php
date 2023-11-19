<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch categories from the database
$result = $conn->query("SELECT * FROM category");

// Display the CRUD table
if ($result->num_rows > 0) {
    echo '<table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Category Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['category_name'] . '</td>
                <td>' . $row['status'] . '</td>
                <td>
                    <a href="edit_category.php?id=' . $row['id'] . '" class="btn btn-warning">Edit</a>
                    <a href="category_crud.php?deleteCategory=' . $row['id'] . '" class="btn btn-danger">Delete</a>
                </td>
            </tr>';
    }

    echo '</tbody></table>';
} else {
    echo 'No categories found.';
}

$conn->close();
?>
