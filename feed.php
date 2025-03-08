<?php
// Step 1: Database Connection
$servername = "localhost";
$username = "root";
$password = "";  // Keep empty if no password
$database = "feedback_store";  // Use the correct database name

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Check if form data is received
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['message'])) {
        
        // Step 3: Get User Input and Sanitize
        $name = $conn->real_escape_string($_POST['name']);
        $email = $conn->real_escape_string($_POST['email']);
        $message = $conn->real_escape_string($_POST['message']);

        // Step 4: Insert Data into Database
        $sql = "INSERT INTO feedbacks (name, email, message) VALUES ('$name', '$email', '$message')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Feedback submitted successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "All fields are required!";
    }
} else {
    echo "Invalid request!";
}

// Step 5: Close Connection
$conn->close();
?>
