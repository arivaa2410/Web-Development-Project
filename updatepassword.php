<?php
// updatePassword.php

// Database connection - Adjust with your database details
$host = 'localhost';
$dbname = 'your_database';
$user = 'your_username';
$pass = 'your_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'] ?? '';
        $newPassword = $_POST['newPassword'] ?? '';

        // Check for empty inputs
        if (empty($email) || empty($newPassword)) {
            echo 'Email or password cannot be empty.';
            exit;
        }

        // Password hashing
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update password query
        $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE email = :email");
        $stmt->execute([':password' => $hashedPassword, ':email' => $email]);

        if ($stmt->rowCount()) {
            echo 'Password updated successfully.';
        } else {
            echo 'Failed to update password. Please check if the email is correct.';
        }
    }
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
}