<?php
// delete_news.php

// Assuming you have a database connection established
// Replace the following with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "webdev";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the news_id from the AJAX request
$newsId = isset($_POST['news_id']) ? $_POST['news_id'] : '';

// Perform the deletion
$sql = "DELETE FROM news WHERE news_id = '$newsId'";

if ($conn->query($sql) === TRUE) {
    // Deletion successful
    echo "News deleted successfully";
} else {
    // Error handling
    echo "Error deleting news: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
