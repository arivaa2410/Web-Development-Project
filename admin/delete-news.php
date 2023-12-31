<?php
include_once '../db_connection.php';

if (!$_GET['news_id']) {
    header('Location: news.php');
}

$news_id = $_GET['news_id'];

//delete news
$sql = "DELETE FROM news WHERE news_id = '$news_id'";
$result = mysqli_query($conn, $sql);

if ($result) {
    header('Location: news.php');
    exit;
} else {
    // If there's an error, display it as an alert
    echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    header('Location: news.php');
}
