<?php
session_start();
include('config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $user_input_pass = $_POST['password'];

    // 1. UPDATE THIS LINE: Add 'fullname' to the SELECT statement
    $stmt = $conn->prepare("SELECT id, fullname, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc(); 
        $stored_hash = $row['password'];

        if (password_verify($user_input_pass, $stored_hash)) {
            $_SESSION['user_id'] = $row['id'];
            // 2. NOW THIS WILL WORK: because fullname is in the $row array
            $_SESSION['user_name'] = $row['fullname']; 
            $_SESSION['logged_in'] = true;
            
            header("Location: dashboard.php");
            exit();
        }
    }

    // If something fails, go back to login with an error
    header("Location: login.php?error=1");
    exit();
}
?>