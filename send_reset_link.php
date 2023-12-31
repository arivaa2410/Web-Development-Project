<?php
// Database connection
$host = 'localhost';
$dbname = 'webdev';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch();

        $reset_token = bin2hex(random_bytes(32));
        $updateStmt = $pdo->prepare("UPDATE users SET reset_token = ? WHERE id = ?");
        $updateStmt->execute([$reset_token, $user['id']]);

        $reset_page = "/resetpassword.php?token=" . urlencode($reset_token);
        $reset_link = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $reset_page;

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'email4webproject@gmail.com';
            $mail->Password   = 'dbfwmuoynosljpwq';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;

            $mail->setFrom('email4webproject@gmail.com', 'Mailer');
            $mail->addAddress($email);

            $mail->isHTML(true);
            $mail->Subject = 'Password Reset Link';
            $mail->Body    = "Here is your password reset link: " . $reset_link;
    
            $mail->send();
            echo 'If an account with this email exists, a reset link has been sent.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "If an account with this email exists, a reset link has been sent.";
    }
}
?>