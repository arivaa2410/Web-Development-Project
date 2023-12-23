<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verify reCAPTCHA first
    $recaptcha_secret = "6LfqMjcpAAAAAJRrpUFoL_1xVJoBEvJY44RuP756";
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
    

    if ($captcha_success->success) {
        echo "<h2>Error: Please complete the reCAPTCHA.</h2>";
    } else {
        // If reCAPTCHA verification succeeds, then process the form data
        $first_name = $_POST['first-name'];
        $last_name = $_POST['last-name'];
        $user_name = $_POST['user-name'];
        $password = $_POST['pass-id']; // Note: Passwords should be hashed for security in a real application
        $email = $_POST['email'];
        $country = $_POST['country'];

        // Process the data (e.g., save to a database, etc.)

        // Display success message
        echo "<h2>Registration Successful!</h2>";
        echo "<p>First Name: $first_name</p>";
        echo "<p>Last Name: $last_name</p>";
        echo "<p>User Name: $user_name</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Country: $country</p>";
    } 
  }
?>