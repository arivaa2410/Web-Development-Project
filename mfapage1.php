<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <style>
        body {
            font-family: Helvetica;
            background-color: #8bc9e4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        header {
            background-color: #1f5588;
            color: #fff;
            text-align: center;
            padding: 1em;
            width: 100%;
        }

        form {
            background-color: #659ac6;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #154c79;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #063970;
        }


    </style>
</head>
<body>
    <img src="trainlogos.jpg"/>
<h1 style="font-family:Times new Roman; color: #195e83">Railway Transportation News Announcement System</h1>
<h2>Embark On a Journey, Let the Rail Unfolds</h2>
<header>
    <h1>EMAIL AUTHENTICATION</h1>
</header>
<form method="POST">
    <input type="text" name="name" placeholder="Enter name" required />
    <input type="email" name="email" placeholder="Enter email" required />
    <input type="password" name="password" placeholder="Enter password" required />
 
    <input type="submit" name="register" value="Register">
</form>
<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    //Load Composer's autoloader
    require 'vendor/autoload.php';
 
    if (isset($_POST["register"]))
    {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

         // Input Validation
    if (empty($name) || empty($email) || empty($password) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Please fill in all fields with valid data.";
        exit();
    }


        //Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);
 
        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
            //Send using SMTP
            $mail->isSMTP();
 
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';
 
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
 
            //SMTP username
            $mail->Username = 'email4webproject@gmail.com';
 
            //SMTP password
            $mail->Password = 'dbfwmuoynosljpwq';
 
            //Enable TLS encryption;
            $mail->SMTPSecure = 'tls';
 
            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 587;
 
            //Recipients
            $mail->setFrom('email4webproject@gmail.com', 'trainschedule');
 
            //Add a recipient
            $mail->addAddress($email, $name);
 
            //Set email format to HTML
            $mail->isHTML(true);
 
            $verification_code = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
 
            $mail->Subject = 'Email verification';
            $mail->Body    = '<p>Your verification code is: <b style="font-size: 30px;">' . $verification_code . '</b></p>';
 
            $mail->send();
            // echo 'Message has been sent';
 
            $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
 
            // connect with database
            $conn = mysqli_connect("localhost", "root", "", "testdb");
 
            // insert in users table
            $sql = "INSERT INTO users(name, email, password, verification_code, email_verified_at) VALUES ('" . $name . "', '" . $email . "', '" . $encrypted_password . "', '" . $verification_code . "', NULL)";
            mysqli_query($conn, $sql);
 
            header("Location: email-verification.php?email=" . $email);
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
?>

</body>
<footer>

        <h3>© 2023 Railway Transportation News Announcement System. All rights reserved.</h3>

</footer>
</html>
