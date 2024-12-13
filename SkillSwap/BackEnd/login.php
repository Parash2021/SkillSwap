<?php

require_once 'vendor/autoload.php';

use TiDB\Client;

// ... (database connection settings)

// ... (create TiDB client)

// Function to log in a user
function loginUser($data) {
    global $client, $database, $usersTable;
    // ... (Code to check if email exists, verify password, and set session)
}

// Handle login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $loginResult = loginUser($data);

    if (isset($loginResult['error'])) {
        // Display error message
    } else {
        // Set session variables for user authentication
        session_start();
        $_SESSION['user_id'] = $loginResult['user_id'];

        // Redirect to the homepage or other protected area
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>SkillSwap - Login</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="login.php">
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit">Login</button>
    </form>
</body>
</html>