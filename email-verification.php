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
    <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" required>
    <input type="text" name="verification_code" placeholder="Enter verification code" required />
    <input type="submit" name="verify_email" value="Verify Email">
</form>

<?php
 
    if (isset($_POST["verify_email"]))
    {
        $email = $_POST["email"];
        $verification_code = $_POST["verification_code"];
 
        // connect with database
        $conn = mysqli_connect("localhost", "root", "", "testdb");
 
        // mark email as verified
        $sql = "UPDATE users SET email_verified_at = NOW() WHERE email = '" . $email . "' AND verification_code = '" . $verification_code . "'";
        $result  = mysqli_query($conn, $sql);
 
        if (mysqli_affected_rows($conn) == 0)
        {
            die("Verification code failed.");

        }
 
        echo "<p>You can login now.</p>";
        header("Location: login.php");
        exit();
    }
 
?>
</body>
</html>