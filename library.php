<?php
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

// Fetch news data from the database
$sql = "SELECT news_id, Title, Time, Description FROM news";
$result = $conn->query($sql);

// Close the database connection
$conn->close();
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Library </title>
        <!-- CSS Style -->
        <link rel="stylesheet" href="./assets/css/style.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    </head>
    <style>
    img {
        display: block;
        margin: 20px auto 0; /* Set top margin to create space from the top */
        padding: 10px; /* Set padding around the image */
    }

    .topleft4, .topleft5 {
            text-align: center; /* Center-align the text */
            margin-top: 120px; /* Add margin to the top of the text */
        }

    nav {
        display: flex;
        flex-direction: column; /* Arrange items in a column */
        width: 200px; /* Set the width of the navigation bar to 100% */
        padding: 20px; /* Set padding as per your preference */
    }

    nav ul {
        list-style-type: none;
        padding: 0;
        margin: 0;
        display: flex; /* Arrange list items in a row */
        flex-direction: column; /* Arrange list items in a column */
    }

    nav li {
        padding: 20px;
    }

    nav a {
        text-decoration: none;
        color: #333;
        display: block;
        border-bottom: 1px solid #ddd; /* Add a border between items */

    }

    nav a:hover {
        background-color: #ddd;
    }

    .news-box {
            text-align: center; /* Center-align the text */
            margin-top: 120px; /* Add margin to the top of the text */
        }

    h2{
        text-align: center; /* Center-align the text */
    }
    </style>

<style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        .delete-btn {
            background-color: #ff6666;
            color: #fff;
            border: none;
            padding: 8px;
            cursor: pointer;
        }

        #return-content {
        text-align: center; /* Center-align the content within .footer-content */
        }

        #return-content a {
        color: #00163D; /* Link color */
        text-decoration: none; /* Remove underline */
        font-weight: bold; /* Make the text bold */
        margin-right: 15px; /* Add some space to the right */
        }

        #return-content a i {
        margin-right: 5px; /* Adjust the space between the icon and text */
        }

        #return-content a:hover {
        text-decoration: underline; /* Underline on hover */
        color: #fff; /* Link color */
        }
    </style>

    <body>
            
            <img src="assets/img/railwayicon2.jpg" alt="railway icon" width="300" height="100">

            <div class="topleft4"><b> Railway Transportation News Announcement System </b></div>
            
            <div class="topleft5"> Embark On a Journey, Let the Rail Unfolds </div>
            
            <br><br><br><br><br><br><br><br><br><br>
       
      <header> 
        <center>
          <h1><b>LIBRARY</b></h1>
        </center>
      </header><br><br>

      <center>
        <h1><b> WELCOME TO RAILWAY TRANSPORTATION NEWS ANNOUNCEMENT SYSTEM </b></h1><br>
       </center>

       <div id="return-content">
       <p><a href="homepage.php"><i class="fas fa-home"></i>Home</a></p>
       </div>

       <div id="news-content">
        <h2>My News Library</h2>

        <!-- Sample table structure -->
        <table>
            <thead>
                <tr>
                    <th>News ID</th>
                    <th>News Title</th>
                    <th>Date & Time</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
            // Output data in the table if there are rows in the result
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['news_id']}</td>
                        <td>{$row['Title']}</td>
                        <td>{$row['Time']}</td>
                        <td>{$row['Description']}</td>
                        <td>
                           <button class='delete-btn' data-news-id='{$row['news_id']}'>Delete</button>
                        </td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='3'>No news found</td></tr>";
        }
        ?>
            </tbody>
        </table>
    </div>

    <script>
        // JavaScript code to handle the delete button click
        document.addEventListener('DOMContentLoaded', function () {
            // Get all delete buttons by their class name
            var deleteButtons = document.getElementsByClassName('delete-btn');

            // Attach a click event listener to each delete button
            Array.from(deleteButtons).forEach(function (button) {
                button.addEventListener('click', function () {
                    // Get the news ID from the data attribute
                    var newsId = this.getAttribute('data-news-id');

                    // Confirm the deletion
                    if (confirm('Are you sure you want to delete this news?')) {
                        // Perform the deletion using AJAX
                        var xhr = new XMLHttpRequest();
                        xhr.onreadystatechange = function () {
                            if (xhr.readyState === XMLHttpRequest.DONE) {
                                if (xhr.status === 200) {
                                    // Reload the page after successful deletion
                                    window.location.reload();
                                } else {
                                    // Handle error
                                    console.error('Error deleting news');
                                }
                            }
                        };
                        
                        // Send the AJAX request to the PHP script for deletion
                        xhr.open('POST', 'delete_news.php', true);
                        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                        xhr.send('news_id=' + encodeURIComponent(newsId));
                    }
                });
            });
        });
    </script>

    <!--Footer -->
    <?php include('footer.php'); ?>
    <!-- /Footer--> 
</body>
</html>

