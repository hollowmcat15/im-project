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

// Add Brand
if(isset($_POST['addBrand'])){
    $brandName = $_POST['brandName'];
    $status = $_POST['status'];

    $sql = "INSERT INTO brands (brand_name, status) VALUES ('$brandName', '$status')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Brand added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Edit Brand
if(isset($_POST['editBrand'])){
    $editBrandId = $_POST['editBrandId'];
    $editBrandName = $_POST['editBrandName'];
    $editStatus = $_POST['editStatus'];

    $sql = "UPDATE brands SET brand_name='$editBrandName', status='$editStatus' WHERE id='$editBrandId'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Brand updated successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete Brand
if(isset($_GET['deleteBrand'])){
    $deleteBrandId = $_GET['deleteBrand'];

    $sql = "DELETE FROM brands WHERE id='$deleteBrandId'";
    
    if ($conn->query($sql) === TRUE) {
        echo "Brand deleted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

