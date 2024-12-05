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

// Query to fetch opportunities
$sql = "SELECT title, description, amount, deadline FROM opportunities";
$result = $conn->query($sql);

// Check for query execution
if (!$result) {
    die("Query error: " . $conn->error);
}

// Prepare the output
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . htmlspecialchars($row['title']) . "</td>
                <td>" . htmlspecialchars($row['description']) . "</td>
                <td>" . htmlspecialchars($row['amount']) . "</td>
                <td>" . htmlspecialchars($row['deadline']) . "</td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='4'>No opportunities found</td></tr>";
}

// Close the connection
$conn->close();
?>
