<?php
// s.php - Handle Sign Up

// Database connection settings
$servername = "localhost";
$username = "root";  // Change this to your MySQL username
$password = "";  // Change this to your MySQL password
$dbname = "your_database_name";  // Change this to your database name

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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $pass = $_POST['password'];  // Password will be the primary key

    // Insert the new user into the database (password will be primary key)
    $sql = "INSERT INTO users (username, name, email, phone, password) 
            VALUES ('$user', '$name', '$email', '$phone', '$pass')";

    if ($conn->query($sql) === TRUE) {
        echo "Account created successfully! <a href='l.html'>Login here</a>";
    } else {
        // Handle error if password already exists
        if ($conn->errno == 1062) {
            echo "Error: The password already exists. Please choose another password.";
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

$conn->close();
?>
