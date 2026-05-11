<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; 
include('config/db_config.php'); 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Get and Sanitize Input
    $fullname  = htmlspecialchars($_POST['fullname']);
    $email     = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $pass      = $_POST['password'];
    $conf_pass = $_POST['confirm_password'];
    $role      = $_POST['role'];

    // 2. Validations
    if (empty($fullname) || empty($email) || empty($pass)) {
        die("Error: Please fill in all required fields.");
    }

    if ($pass !== $conf_pass) {
        die("Error: Passwords do not match.");
    }

    // 3. Check if Email Already Exists
    $checkEmail = $conn->prepare("SELECT email FROM users WHERE email = ?");
    $checkEmail->bind_param("s", $email);
    $checkEmail->execute();
    $result = $checkEmail->get_result();

    if ($result->num_rows > 0) {
        die("Error: This email is already registered in the Apex Syntix network.");
    }
    $checkEmail->close();

    // 4. Hash the password
    $hashed_password = password_hash($pass, PASSWORD_BCRYPT);

    // 5. Insert into Database
    $stmt = $conn->prepare("INSERT INTO users (fullname, email, password, role) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $fullname, $email, $hashed_password, $role);

    if ($stmt->execute()) {
        // 6. Registration Success! Now send the Welcome Email
        sendWelcomeEmail($email, $fullname);
        
        // 7. Redirect to login
        header("Location: login.php?signup=success");
        exit();
    } else {
        echo "Digital Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}

// --- The Welcome Email Function ---
function sendWelcomeEmail($userEmail, $userName) {
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'thamarairajanpandiyarajan@gmail.com'; 
        $mail->Password   = $_ENV['SMTP_PASS']; // USE APP PASSWORD
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // $mail->setFrom('thamarairajanpandiyarajan@gmail.com', 'Apex Syntix');
        $mail->addReplyTo('support@apexsyntix.com', 'Apex Syntix Support');
        $mail->addAddress($userEmail, $userName);

        $mail->isHTML(true);
        $mail->Subject = 'Welcome to the Digital World of Apex Syntix';
        
        $mail->Body = "
        <div style='background-color: #000; color: #fff; padding: 40px; font-family: Arial, sans-serif;'>
            <div style='max-width: 600px; margin: auto; border: 1px solid #1a1a1a; padding: 20px; border-radius: 10px;'>
                <h1 style='color: #06b6d4;'>Welcome, $userName!</h1>
                <p style='color: #a1a1aa; font-size: 16px;'>
                    Your Digital Identity has been successfully initialized in <strong>Apex Syntix</strong>.
                </p>
                <div style='margin-top: 30px; text-align: center;'>
                    <a href='http://localhost/Apex/login.php' 
                       style='background-color: #0891b2; color: white; padding: 12px 25px; text-decoration: none; border-radius: 5px; font-weight: bold;'>
                       Initialize Session
                    </a>
                </div>
            </div>
        </div>";

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}
?>