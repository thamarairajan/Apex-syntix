<?php
include('config/session.php');
include('config/db_config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['logged_in'])) {
    // 1. Sanitize Inputs
    $blog_id = (int)$_POST['blog_id'];
    $comment = mysqli_real_escape_string($conn, $_POST['comment']);
    $user_name = $_SESSION['user_name']; // Take name directly from session for security

    // 2. Insert into Database
    $sql = "INSERT INTO blog_comments (blog_id, user_name, comment, created_at) 
            VALUES ($blog_id, '$user_name', '$comment', NOW())";

    if (mysqli_query($conn, $sql)) {
        // 3. REDIRECT back to the exact blog post
        // This clears the POST data and the input box automatically
        header("Location: blog-single.php?id=" . $blog_id);
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // If someone tries to access this file directly without logging in
    header("Location: login.php");
    exit();
}
?>