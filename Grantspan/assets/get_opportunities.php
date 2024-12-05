<?php
// get_opportunities.php

// Database connection
$conn = new mysqli("localhost", "root", "", "grantspan");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT title, description, amount, deadline FROM opportunities";
$result = $conn->query($sql);

// Check if query execution was successful
if (!$result) {
    die("Query failed: " . $conn->error);
}

// Prepare the data to send back as JSON
$opportunities = [];
while ($row = $result->fetch_assoc()) {
    $opportunities[] = $row;
}

// Return the data in JSON format
echo json_encode($opportunities);

// Close the connection
$conn->close();
?>
