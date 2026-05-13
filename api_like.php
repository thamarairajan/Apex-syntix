<?php
include('config/session.php');
include('config/db_config.php');

header('Content-Type: application/json');

if (!isset($_SESSION['logged_in'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit;
}

$blog_id = (int)$_GET['id'];
$u_id = $_SESSION['user_id'];

// Check if already liked to toggle
$check = mysqli_query($conn, "SELECT id FROM blog_likes WHERE blog_id = $blog_id AND user_id = $u_id");

if (mysqli_num_rows($check) > 0) {
    mysqli_query($conn, "DELETE FROM blog_likes WHERE blog_id = $blog_id AND user_id = $u_id");
} else {
    mysqli_query($conn, "INSERT INTO blog_likes (blog_id, user_id) VALUES ($blog_id, $u_id)");
}

// Get new count
$res = mysqli_query($conn, "SELECT COUNT(*) as total FROM blog_likes WHERE blog_id = $blog_id");
$new_count = mysqli_fetch_assoc($res)['total'];

echo json_encode(['success' => true, 'new_count' => $new_count]);

?>