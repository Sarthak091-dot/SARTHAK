<?php
session_start();

// Hardcoded credentials (Replace with a database later)
$valid_username = "admin";
$valid_password = "admin123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == $valid_username && $password == $valid_password) {
        $_SESSION["loggedin"] = true;
        $_SESSION["username"] = $username;
        header("Location: welcome.php"); // Redirect after login
        exit;
    } else {
        echo "<script>alert('Invalid username or password!'); window.location='index.php';</script>";
    }
}
?>
