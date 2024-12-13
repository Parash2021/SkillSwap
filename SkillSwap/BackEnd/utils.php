<?php

require_once 'vendor/autoload.php';

use mysqli;

// Database connection settings from environment variables
$host = getenv('gateway01.ap-southeast-1.prod.aws.tidbcloud.com');
$port = getenv('4000');
$user = getenv('Ar4FPiXsECAAH4S.root');
$password = getenv('Yf4Pw5yjBtK1p9su');
$database = 'skill_swap';

// Create a TiDB client (using MySQLi)
$conn = new mysqli($host, $user, $password, $database, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Helper function to fetch data from the database
function fetchData($sql, $params = []) {
    global $conn;
    $stmt = $conn->prepare($sql);
    if ($params) {
        $types = str_repeat('s', count($params)); // Assuming all parameters are strings
        $stmt->bind_param($types, ...$params);
    }
    $stmt->execute();
    $result = $stmt->get_result();
    $data = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }
    return $data;
}

// Helper function for password hashing
function hashPassword($password) {
    return password_hash($password, PASSWORD_DEFAULT);
}

// Helper function to verify password 
function verifyPassword($password, $hashedPassword) {
    return password_verify($password, $hashedPassword);
}

?>