<?php
// Database configuration
$host = "your_database_host";
$username = "your_database_username";
$password = "your_database_password";
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
    $website = sanitizeInput($_POST["website"]);

    // Social links tab
    $twitter = sanitizeInput($_POST["twitter"]);
    $facebook = sanitizeInput($_POST["facebook"]);
    $googlePlus = sanitizeInput($_POST["googlePlus"]);
    $linkedIn = sanitizeInput($_POST["linkedIn"]);
    $instagram = sanitizeInput($_POST["instagram"]);

    // Perform database operations (Update users table)
    $sql = "UPDATE users SET username='$username', name='$name', email='$email', birthday='$birthday', country='$country', phone='$phone', website='$website', twitter='$twitter', facebook='$facebook', googlePlus='$googlePlus', linkedIn='$linkedIn', instagram='$instagram' WHERE id=1"; // Assuming the user ID is 1 for simplicity.

    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully";
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
