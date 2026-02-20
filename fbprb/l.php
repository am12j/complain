<?php

$servername = "mysql.railway.internal";
$username = "root";  
$password = "KBJZKuGuWMLZrZFhOVfAKIJgGGSlUAbu";  
$dbname = "railway";  

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $user = $_POST['username'];
    $pass = $_POST['password'];  // Password is used as primary key

    // Query to check if the password exists in the database
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, password matches
        session_start();
        $_SESSION['username'] = $user;  // Start session and save username
        header("Location: dashboard.php");  // Redirect to dashboard or logged-in page
        exit();
    } else {
        // Incorrect credentials
        echo "Wrong credentials!";
    }
}

$conn->close();
?>




