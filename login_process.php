<?php
include 'config/session.php';
include('config/db_config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $user_input_pass = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, fullname, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {

        $row = $result->fetch_assoc();

        $stored_hash = $row['password'];

        if (password_verify($user_input_pass, $stored_hash)) {

            session_regenerate_id(true);

            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_name'] = $row['fullname'];
            $_SESSION['logged_in'] = true;

            header("Location: dashboard.php");
            exit();
        }
    }

    header("Location: login.php?error=1");
    exit();
}
?>