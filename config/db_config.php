<?php
// Apex Syntix Database Configuration
// Standard settings for a local XAMPP/WAMP environment
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Dotenv\Dotenv;

// Check if the file exists to avoid more errors
if (file_exists(dirname(__DIR__) . '/.env')) {
    $dotenv = Dotenv::createImmutable(dirname(__DIR__));
    $dotenv->load();
} else {
    die("Digital Error: .env file missing in the root directory.");
}


$host = $_ENV['DB_HOST'];
$db_user = $_ENV['DB_USER'];      // Default for local development
$db_pass = "";          // Default for local development
$db_name = $_ENV['DB_NAME'];

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