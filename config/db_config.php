<?php
// Apex Syntix Database Configuration
// Standard settings for a local XAMPP/WAMP environment

$host = "localhost";
$db_user = "root";      // Default for local development
$db_pass = "";          // Default for local development
$db_name = "apex_syntix_db";

// Create connection using MySQLi
$conn = new mysqli($host, $db_user, $db_pass, $db_name);

// Check connection
if ($conn->connect_error) {
    // In production, you would log this error instead of showing it
    die("Digital Connection Failed: " . $conn->connect_error);
}

// Set charset to utf8mb4 for better compatibility (emojis, special characters)
$conn->set_charset("utf8mb4");

// Now $conn is ready to be used in your logic files
?>