<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["loginUsername"];
    $password = $_POST["loginPassword"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = $conn->query($sql);

    if ($result === FALSE) {
        // Handle query error
        echo "Error: " . $sql . "<br>" . $conn->error;
        exit();
    }

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            // Successful login
            session_start();
            $_SESSION['username'] = $username;
            header("Location: dashboard/dashboard.php");
            exit();
        } else {
            // Invalid password
            header("Location: login.php?error=invalid");
            exit();
        }
    } else {
        // User not found
        header("Location: login.php?error=usernotfound");
        exit();
    }

    $conn->close();
}
?>

