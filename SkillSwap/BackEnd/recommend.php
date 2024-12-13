<?php

// ... (include TiDB driver, connection settings, database definitions)

// Start session to check if user is logged in
session_start();

// Check if user is authenticated
if (!isset($_SESSION['