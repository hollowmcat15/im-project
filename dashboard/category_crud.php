<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "project";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Add category
if(isset($_POST['addCategory'])){
    $categoryName = $_POST['categoryName'];
    $status = $_POST['status'];

    $sql = "INSERT INTO category (category_name, status) VALUES ('$categoryName', '$status')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Category added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Edit category
if(isset($_POST['editCategory'])){
    $editCategoryId = $_POST['editCategoryId'];
    $editCategoryName = $_POST['editCategoryName'];
    $editStatus = $_POST['editStatus'];

    $sql = "UPDATE category SET category_name='$editCategoryName', status='$editStatus' WHERE id='$editCategoryId'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Category updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete category
if(isset($_GET['deleteCategory'])){
    $deleteCategoryId = $_GET['deleteCategory'];

    $sql = "DELETE FROM category WHERE id='$deleteCategoryId'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Category deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>