<?php

require_once 'vendor/autoload.php';

use TiDB\Client;

// ... (database connection settings)

// ... (create TiDB client)

// Start session to check if user is logged in
session_start();

// Check if user is authenticated
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page
} else {
    $userId = $_SESSION['user_id'];

    // Function to fetch user profile data
    function getUserProfile($userId) {
        global $client, $database, $usersTable;
        