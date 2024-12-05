<?php
session_start(); // Start the session
include('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signin'])) {
    // Get user input and password
    $userInput = $_POST['userInput'];
    $password = $_POST['password'];

    // Determine if input is an email or a name
    if (filter_var($userInput, FILTER_VALIDATE_EMAIL)) {
        $sql = "SELECT * FROM users WHERE email = ?";
    } else {
        $sql = "SELECT * FROM users WHERE name = ?";
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare($sql);

    // Check if statement preparation was successful
    if (!$stmt) {
        die("SQL Error: " . $conn->error);
    }

    $stmt->bind_param('s', $userInput);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // User authenticated successfully
            // Store user details in session
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['name'];

            echo "
            <!DOCTYPE html>
            <html>
            <head>
                <title>Redirecting...</title>
                <style>
                    body {
                        display: flex;
                        justify-content: center;
                        align-items: center;
                        height: 100vh;
                        margin: 0;
                        background-color: #F4F4F400;
                        font-family: Arial, sans-serif;
                    }
                    .loading {
                        text-align: center;
                    }
                    .spinner {
                        border: 6px solid #f3f3f3;
                        border-top: 6px solid #3498db;
                        border-radius: 50%;
                        width: 50px;
                        height: 50px;
                        animation: spin 1s linear infinite;
                        margin: 0 auto 20px;
                    }
                    @keyframes spin {
                        0% { transform: rotate(0deg); }
                        100% { transform: rotate(360deg); }
                    }
                </style>
                <script>
                    setTimeout(function() {
                        window.location.href = '/Grantspan/assets/oppotunities.html';
                    }, 3000); // 3-second delay
                </script>
            </head>
            <body>
                <div class='loading'>
                    <div class='spinner'></div>
                    <p>Redirecting to your opportunities...</p>
                </div>
            </body>
            </html>
            ";
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with this name or email.";
    }

    $stmt->close();
}

$conn->close();
?>
