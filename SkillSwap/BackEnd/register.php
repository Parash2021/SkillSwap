<?php

require_once 'vendor/autoload.php';

use TiDB\Client;
use TiDB\Error;

// ... (database connection settings)

// ... (create TiDB client)

// Function to register a new user
function registerUser($data) {
    global $client, $database, $usersTable;
    // ... (Code to check if email exists, hash password, and insert data)
}

// Handle registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = $_POST;
    $registrationResult = registerUser($data);

    if (isset($registrationResult['error'])) {
        // Display error message
    } else {
        // Redirect to login page or show success message
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>SkillSwap - Register</title>
</head>
<body>
    <h1>Register</h1>
    <form method="POST" action="register.php">
        <input type="text" name="username" placeholder="Username" required>
        <input type="email" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <!-- ... other fields (profession, skills, about, experience) -->
        <button type="submit">Register</button>
    </form>
</body>
</html>