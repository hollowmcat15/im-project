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

// Fetch brands from the database
$result = $conn->query("SELECT * FROM brands");

// Display the CRUD table
if ($result->num_rows > 0) {
    echo '<table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Brand Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>
                <td>' . $row['id'] . '</td>
                <td>' . $row['brand_name'] . '</td>
                <td>' . $row['status'] . '</td>
                <td>
                    <a href="edit_brand.php?id=' . $row['id'] . '" class="btn btn-warning">Edit</a>
                    <a href="brand_crud.php?deleteBrand=' . $row['id'] . '" class="btn btn-danger">Delete</a>
                </td>
            </tr>';
    }

    echo '</tbody></table>';
} else {
    echo 'No brands found.';
}

$conn->close();
?>
