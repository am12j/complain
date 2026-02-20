<?php
// Database connection
$servername = "interchange.proxy.rlwy.net";
$username = "root";  
$password = "KBJZKuGuWMLZrZFhOVfAKIJgGGSlUAbu";  
$dbname = "railway";  

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $problem = $_POST['problem'];
    $description = $_POST['description'];

    
    $sql = "INSERT INTO complaints (name, email, problem, description) VALUES ('$name', '$email', '$problem', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Complaint submitted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
