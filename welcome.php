<?php
session_start();

// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
            padding: 50px;
        }
        h1 {
            color: #333;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            display: inline-block;
            box-shadow: 0px 0px 10px gray;
        }
        .logout-btn {
            display: inline-block;
            padding: 10px 20px;
            background: red;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
        }
        .logout-btn:hover {
            background: darkred;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Welcome, <?php echo $_SESSION['username']; ?>! 🎉</h1>
        <p>You have successfully logged in.</p>
        <li><a href="#"><a href="loogin.html">Home</a></li>
        <a class="logout-btn" href="logout.php">Logout</a>
    </div>

</body>
</html>
