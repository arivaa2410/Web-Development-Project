<?php
// Assuming you have a database connection established
// Include your database connection code here
error_reporting(E_ALL);
ini_set('display_errors', '1');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the news ID is set and is a valid integer
    if (isset($_POST['news_id']) && is_numeric($_POST['news_id'])) {
        $newsId = $_POST['news_id'];

        // Perform the deletion in the database
        $sql = "DELETE FROM news WHERE news_id = ?";
        $stmt = $conn->prepare($sql);

        // Bind the news ID parameter
        $stmt->bind_param('i', $newsId);

        // Execute the statement
        if ($stmt->execute()) {
            // Deletion successful
            echo json_encode(['success' => true]);
        } else {
            // Deletion failed
            echo json_encode(['success' => false, 'error' => 'Database error']);
        }

        // Close the statement
        $stmt->close();
    } else {
        // Invalid news ID
        echo json_encode(['success' => false, 'error' => 'Invalid news ID']);
    }
} else {
    // Invalid request method
    echo json_encode(['success' => false, 'error' => 'Invalid request method']);
}

// Close the database connection
$conn->close();
?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var deleteButtons = document.getElementsByClassName('delete-btn');

        Array.from(deleteButtons).forEach(function (button) {
            button.addEventListener('click', function () {
                var newsId = this.getAttribute('data-news-id');

                if (confirm('Are you sure you want to delete this news?')) {
                    // Send an AJAX request to delete_news.php
                    var xhr = new XMLHttpRequest();
                    xhr.open('POST', 'delete_news.php', true);
                    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                    
                    // Set up the callback function for when the request completes
                    xhr.onload = function () {
                        var response = JSON.parse(xhr.responseText);

                        if (response.success) {
                            // Deletion successful, you may want to update the table or reload the page
                            window.location.reload();
                        } else {
                            // Deletion failed, handle the error
                            alert('Error: ' + response.error);
                        }
                    };

                    // Send the request with the news ID as POST data
                    xhr.send('news_id=' + encodeURIComponent(newsId));
                }
            });
        });
    });
</script>
