<?php
session_start(); // 1. ALWAYS the very first line

$servername = "interchange.proxy.rlwy.net";
$username = "root";  
$password = "KBJZKuGuWMLZrZFhOVfAKIJgGGSlUAbu";  
$dbname = "railway";  
$port = 28720;

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Using basic query as per your request (Note: Prepared statements are safer!)
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['username'] = $user;
        
        // Since dashboard.php is on Render, this works. 
        // If it's on Vercel, use the full https://... URL
        header("Location: dashboard.php"); 
        exit();
    } else {
        echo "Wrong credentials!";
    }
}
$conn->close();
?>