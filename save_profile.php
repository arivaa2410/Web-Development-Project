<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "user_profiles";

// Connect to the database
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize user input
function sanitizeInput($data) {
    global $conn;
    return mysqli_real_escape_string($conn, trim($data));
}

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // General tab
    $username = sanitizeInput($_POST["username"]);
    $name = sanitizeInput($_POST["name"]);
    $email = sanitizeInput($_POST["email"]);

    // Change password tab
    $currentPassword = sanitizeInput($_POST["currentPassword"]);
    $newPassword = sanitizeInput($_POST["newPassword"]);
    $repeatPassword = sanitizeInput($_POST["repeatPassword"]);

    // Info tab
    $birthday = sanitizeInput($_POST["birthday"]);
    $country = sanitizeInput($_POST["country"]);

    // Contacts tab
    $phone = sanitizeInput($_POST["phone"]);
   

   

    // Perform database operations (Update users table)
    $sql = "UPDATE users SET username='$username', name='$name', email='$email', birthday='$birthday', country='$country', phone='$phone'; // Assuming the user ID is 1 for simplicity.

    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
