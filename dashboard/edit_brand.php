<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Brand</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <a class="navbar-brand" href="#">PROJECT</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="brand.php">Brand</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="category.php">Category</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="product.php">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="orders.php">Orders</a>
                </li>
            </ul>
        </div>
    </nav>
    <br>
</head>

<body>
    <div class="container">
        <h2>Edit Brand</h2>
        
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

        if(isset($_GET['id'])){
            $brandId = $_GET['id'];
            
            // Fetch brand data from the database
            $result = $conn->query("SELECT * FROM brands WHERE id='$brandId'");
            
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>

                <!-- Edit Brand Form -->
                <form action="brand_crud.php" method="post">
                    <input type="hidden" name="editBrandId" value="<?php echo $row['id']; ?>">
                    
                    <div class="form-group">
                        <label for="editBrandName">Brand Name:</label>
                        <input type="text" class="form-control" id="editBrandName" name="editBrandName" value="<?php echo $row['brand_name']; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="editStatus">Status:</label>
                        <select class="form-control" id="editStatus" name="editStatus">
                            <option value="Available" <?php echo ($row['status'] == 'Available') ? 'selected' : ''; ?>>Available</option>
                            <option value="Not Available" <?php echo ($row['status'] == 'Not Available') ? 'selected' : ''; ?>>Not Available</option>
                        </select>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" name="editBrand">Save Changes</button>
                </form>

                <?php
            } else {
                echo 'Brand not found.';
            }
        } else {
            echo 'Brand ID not provided.';
        }

        $conn->close();
        ?>
        
        <br>
        <a href="brand.php" class="btn btn-secondary">Back to Brand Management</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
