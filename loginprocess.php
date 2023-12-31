<?php
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Retrieve form data
    $username = $_GET['Uname'];
    $password = $_GET['Pass'];

    // Database connection settings
    $servername = "localhost";
    $db_username = "root";
    $db_password = "";
    $dbname = "webdev";

    try {
        // Create connection using PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $db_username, $db_password);
        // Set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare a SQL statement to retrieve user credentials
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':user_name', $username);
        $stmt->execute();

        // Check if a user with the provided username exists
        if ($stmt->rowCount() > 0) {
            // Fetch user details
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            $hashed_password = $user['password'];

            // Verify the password
            if (password_verify($password, $hashed_password)) {
                // Successful login
                // Redirect to the homepage
                header("Location: homepage.php");
                exit;
            } else {
                // Invalid password
                echo "<h2>Invalid Password!</h2>";
            }
        } else {
            // User does not exist
            echo "<h2>Invalid Username!</h2>";
        }
    } catch (PDOException $e) {
        // Handle database connection errors
        echo "Connection failed: " . $e->getMessage();
    }

    // Close the database connection
    $conn = null;
}
?>
