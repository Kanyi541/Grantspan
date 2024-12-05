<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your database username
$password = ""; // Update with your database password
$dbname = "grantspan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get form data
    $title = $_POST['title'];
    $amount = $_POST['amount'];
    $deadline = $_POST['deadline'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $founder_website = $_POST['founder_website'];

    // SQL query to insert data
    $sql = "INSERT INTO opportunity_info (title, amount, deadline, email, tel, founder_website)
            VALUES ('$title', '$amount', '$deadline', '$email', '$tel', '$founder_website')";

    if ($conn->query($sql) === TRUE) {
        echo "New opportunity info added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>
