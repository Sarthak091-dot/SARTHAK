<?php
$servername = "localhost";
$username = "root"; // Change if different
$password = ""; // Change if your database has a password
$dbname = "t1"; // Change to your database name

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Check if the username already exists
    $check_user = "SELECT * FROM users WHERE username='$user'";
    $result = $conn->query($check_user);

    if ($result->num_rows > 0) {
        echo "Username already exists! Try another one.";
    } else {
        // Insert new user
        $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
        if ($conn->query($sql) === TRUE) {
            echo "Signup successful! <a href='login.php'></a>";
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
$conn->close();
?>















<div class="login-container">
    <h2>Login</h2>
    <form action="LoGin4.php" method="POST">
        <link rel="stylesheet" href="LOG.css">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit" class="login-btn">Log In</button>
    </form>
</div>