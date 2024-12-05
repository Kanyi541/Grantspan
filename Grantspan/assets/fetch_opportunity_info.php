<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "grantspan";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a search term is provided
$search = isset($_GET['search']) ? trim($_GET['search']) : '';

// Prepare the SQL query
$sql = "SELECT id, title, created_at, amount, deadline, email, tel, founder_website FROM opportunity_info";

// If there is a search term, modify the query to filter the results
if (!empty($search)) {
    $sql .= " WHERE title LIKE ? OR email LIKE ?";
}

// Prepare the statement
$stmt = $conn->prepare($sql);

// Bind parameters if a search term is present
if (!empty($search)) {
    $searchParam = "%" . $search . "%";
    $stmt->bind_param("ss", $searchParam, $searchParam);
}

// Execute the query
$stmt->execute();
$result = $stmt->get_result();

// Check for query execution
if (!$result) {
    die("Query error: " . $conn->error);
}

// Prepare the output
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Format created_at if it's a valid timestamp
        $created_at = isset($row['created_at']) ? date('d-m-Y H:i:s', strtotime($row['created_at'])) : 'N/A';

        echo "<tr data-id='" . htmlspecialchars($row['id']) . "'>
                <td>" . htmlspecialchars($row['title']) . "</td>
                <td>" . $created_at . "</td>
                <td>" . htmlspecialchars($row['amount']) . "</td>
                <td>" . htmlspecialchars($row['deadline']) . "</td>
                <td>" . htmlspecialchars($row['email']) . "</td>
                <td>" . htmlspecialchars($row['tel']) . "</td>
                <td><a href='" . htmlspecialchars($row['founder_website']) . "' target='_blank'>Visit</a></td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='7'>No opportunity info found</td></tr>";
}

// Close the connection
$conn->close();
?>
