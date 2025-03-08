<?php
session_start();
$conn = new mysqli("localhost", "root", "", "t1");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username and password exist in the database
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $_SESSION['username'] = $username; // Store session for logged-in user
        header("Location: welcome.php"); // Redirect to a restricted page
        exit();
    } else {
        echo "Invalid username or password!";
    }
}
?>
