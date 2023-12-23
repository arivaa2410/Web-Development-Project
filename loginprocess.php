<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Assuming GET method is used; you can change this according to your form method

    // Retrieve form data
    $username = $_GET['Uname'];
    $password = $_GET['Pass'];

    // Perform authentication (replace this with your authentication logic)
    // For demonstration purposes, using hardcoded username and password
    $valid_username = "your_username"; // Replace with your valid username
    $valid_password = "your_password"; // Replace with your valid password

    if ($username === $valid_username && $password === $valid_password) {
        // Successful login
        echo "<h2>Login Successful!</h2>";
        // Redirect to the home page or another page after successful login
        // header("Location: HomePage.html");
    } else {
        // Invalid credentials
        echo "<h2>Invalid Username or Password!</h2>";
    }
}
?>