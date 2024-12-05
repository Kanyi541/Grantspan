<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['user_name'])) {
    // Return the user's name as JSON
    echo json_encode(['name' => $_SESSION['user_name']]);
} else {
    // Return a default response for guests
    echo json_encode(['name' => 'Guest']);
}
?>
