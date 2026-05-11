<?php
// Database connection
include('config/db_config.php'); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $email    = $_POST['email'];
    $pass     = $_POST['password'];
    $conf_pass = $_POST['confirm_password'];
    $role     = $_POST['role'];

    // 1. Basic Verification: Check if passwords match
    if ($pass !== $conf_pass) {
        die("Error: Passwords do not match. Please go back.");
    }

    // 2. Check if Email Already Exists (Critical for UX)
    $checkEmail = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();

    if ($result->num_rows > 0) {
        die("Error: This email is already registered in the Apex Syntix network.");
    }
    $checkEmail->close();

    // 3. Security: Hash the password
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

    // 4. Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        header("Location: login.php?signup=success");
        exit(); // Always use exit after a header redirect
    } else {
        echo "Digital Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>