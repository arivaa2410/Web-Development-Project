<?php
// Database configuration
$host = 'localhost';
$dbname = 'webdev';
$username = 'root';
$password = '';

// Create a new PDO instance
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

$error = '';
$success = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $token = $_GET['token'];

    // Validate password
    if ($new_password !== $confirm_password) {
        $error = "Passwords do not match!";
    } else {
        // Check if token and email are valid
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email AND reset_token = :token");
        $stmt->execute(['email' => $email, 'token' => $token]);
        $user = $stmt->fetch();

        if ($user) {
            // Update password
            $new_password_hash = password_hash($new_password, PASSWORD_DEFAULT);
            $update_stmt = $pdo->prepare("UPDATE users SET password = :new_password WHERE email = :email");
            $update_stmt->execute(['new_password' => $new_password_hash, 'email' => $email]);

            // Clear reset token
            $update_stmt = $pdo->prepare("UPDATE users SET reset_token = NULL WHERE email = :email");
            $update_stmt->execute(['email' => $email]);

            $success = "Password updated successfully!";
        } else {
            $error = "Invalid token or email!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
     <!-- CSS Style -->
     <link rel="stylesheet" href="./assets/css/style1.css"/>
</head>

<body>
            <div class="topleft4"><b> Railway Transportation News Announcement System </b></div>
            
            <div class="topleft5"> Embark On a Journey, Let the Rail Unfolds </div>
            
            <br><br><br><br><br><br><br><br><br><br>
    <header> 
    <center>
    <h1><b>Reset Password</b></h1>
    </center>
    </header><br><br>

    <?php if($error): ?>
        <p style="color: red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <?php if($success): ?>
        <p style="color: green;"><?= htmlspecialchars($success) ?></p>
    <?php endif; ?>
    <center>
    <form action="reset_password.php?token=<?= htmlspecialchars($_GET['token']) ?>" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>

        <label for="new_password">New Password:</label><br>
        <input type="password" id="new_password" name="new_password" required><br>

        <label for="confirm_password">Confirm New Password:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" required><br>

        <button type="submit">Reset Password</button>
    </form>
    </center>
</body>
</html>