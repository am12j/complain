<?php
// Start the session at the very top
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // If not logged in, redirect to login page
    header("Location: https://complain-beryl.vercel.app/l.html"); // or your login page
    exit();
}

// Optional: store username in a variable
$username = $_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Civic Infrastructure Dashboard</title>
    <link rel="stylesheet" href="https://complain-beryl.vercel.app/dashboard.css">
</head>
<body>
    <nav>
        <a href="#">Home</a>
        <a href="aboutus.html">About Us</a>
        <a href="tracking.html">Tracking</a>
        <a href="logout.php">Logout</a>
    </nav>

    <header>
        <!-- Display the logged-in username -->
        <h1>Welcome <?php echo htmlspecialchars($username); ?> to Civic Infrastructure Dashboard</h1>
    </header>

    <section class="complaint-section">
        <h2>File a Complaint</h2>
        <p>Click below to submit your complaint.</p>
        <a href="https://complain-beryl.vercel.app/cf.html" class="btn">Go to Complaint Form</a>
    </section>

    <div class="complaint-types">
        <div class="box">Electricity Issue</div>
        <div class="box">Road Problem</div>
        <div class="box">Water Supply Issue</div>
        <div class="box">Sanitation Problem</div>
    </div> 
</body>
</html>
