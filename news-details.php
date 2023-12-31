<?php
include_once 'db_connection.php';
if (!$_GET['news_id']) {
    header('Location: news.php');
}

$news_id = $_GET['news_id'];

//fetch news in descending order
$sql = "SELECT * FROM news WHERE news_id = '$news_id'";
$result = mysqli_query($conn, $sql);
$news = mysqli_fetch_assoc($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?= $news['Title']; ?> </title>
    <!-- CSS Style -->
    <link rel="stylesheet" href="./assets/css/style1.css" />
</head>

<body>

    <div class="topleft4"><b> Railway Transportation News Announcement System </b></div>

    <div class="topleft5"> Embark On a Journey, Let the Rail Unfolds </div>

    <br><br><br><br><br><br><br><br><br><br>

    <header>
        <center>
            <h1><b>News</b></h1><br>
        </center>
    </header>

    <div class="news-container">
        <div class="news-card-details">
            <h2><?= $news['Title'] ?></h2>
            <?php $date = date('l, F j, Y g:i A', strtotime($news['Time']));
            ?>
            <p class="news-card__date"><?= $date ?></p>
            <p class="news-card__description"><?= $news['Description'] ?></p>
        </div>
    </div><br><br><br>

    <footer>

        <center>
            <h3>© 2023 Railway Transportation News Announcement System. All rights reserved.</h3>
            <center>

    </footer>
</body>

</html>