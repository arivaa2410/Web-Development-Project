<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
    $host = 'localhost'; // or your host
    $db   = 'webdev';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    // Set up PDO connection
    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    try {
         $pdo = new PDO($dsn, $user, $pass, $options);
    } catch (\PDOException $e) {
         throw new \PDOException($e->getMessage(), (int)$e->getCode());
    }

    // Verify reCAPTCHA first
    $recaptcha_secret = "6LeO7EApAAAAAAoz8ji4rOMfGYBLZ6S7COgWeOEx";
    $recaptcha_response = $_POST['g-recaptcha-response'];
    $url = 'https://www.google.com/recaptcha/api/siteverify';
    $data = [
        'secret' => $recaptcha_secret,
        'response' => $recaptcha_response
    ];
    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data)
        ]
    ];
    $context = stream_context_create($options);
    $verify = file_get_contents($url, false, $context);
    $captcha_success = json_decode($verify);
    
    if (!$captcha_success->success) {
         // If reCAPTCHA verification succeeds, then process the form data
         $first_name = $_POST['first-name'];
         $last_name = $_POST['last-name'];
         $user_name = $_POST['user-name'];
         $password = password_hash($_POST['pass-id'], PASSWORD_DEFAULT); // Hash the password
         $email = $_POST['email'];
         $country = $_POST['country'];
 
         // SQL to insert data
         $sql = "INSERT INTO users (first_name, last_name, user_name, password, email, country) VALUES (?, ?, ?, ?, ?, ?)";
         $stmt= $pdo->prepare($sql);
         $stmt->execute([$first_name, $last_name, $user_name, $password, $email, $country]);
 
         // Redirect to login page
         header('Location: login.php');
         exit;
        
    } else {
        echo "<h2>Error: Please complete the reCAPTCHA.</h2>";
    } 
}
?>
