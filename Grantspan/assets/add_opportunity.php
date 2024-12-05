<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grantspan";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize inputs
    $title = trim($_POST['title']);
    $description = trim($_POST['description']);
    $amount = trim($_POST['amount']);
    $deadline = trim($_POST['deadline']);

    // Validate inputs
    $errors = [];
    if (empty($title)) $errors[] = "Title is required.";
    if (empty($description)) $errors[] = "Description is required.";
    if (empty($amount)) $errors[] = "Grant Amount is required.";
    if (empty($deadline)) $errors[] = "Deadline is required.";

    if (!empty($errors)) {
        // Display errors and stop execution
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
        exit;
    }

    // Prepare and execute insert query
    $sql = "INSERT INTO opportunities (title, description, amount, deadline) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $title, $description, $amount, $deadline);

    if ($stmt->execute()) {
        echo "New opportunity added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
