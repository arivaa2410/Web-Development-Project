<?php
include_once 'db_connection.php';
//fetch news in descending order
$sql = "SELECT * FROM news ORDER BY news_id DESC";
$result = mysqli_query($conn, $sql);
$allnews = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Login </title>
    <!-- CSS Style -->
    <link rel="stylesheet" href="./assets/css/style1.css" />
</head>

<body>

    <div class="topleft4"><b> Railway Transportation News Announcement System </b></div>

    <div class="topleft5"> Embark On a Journey, Let the Rail Unfolds </div>

    <br><br><br><br><br><br><br><br><br><br>

    <header>
        <center>
            <h1><b> WELCOME TO RAILWAY TRANSPORTATION NEWS ANNOUNCEMENT SYSTEM </b></h1><br>
        </center>
    </header><br><br>
    <center>
        <h2>Latest News</h2>
    </center>
    <br><br>
    <div class="news-container">
        <?php foreach ($allnews as $news) { ?>

            <div class="news-card">
                <h4 class="my-h4"><?= $news['Title'] ?></h4>
                <?php $date = date('l, F j, Y g:i A', strtotime($news['Time']));
                ?>
                <p class="news-card__date"><?= $date ?></p>
                <p class="news-card__description"><?= substr($news['Description'], 0, 150) ?>...</p>
                <center><a href="news-details.php?news_id=<?= $news['news_id'] ?>" class="news-card__link">Read More</a></center>
            </div>
        <?php } ?>

    </div>

    </div><br><br><br>
    <footer>


        <center>
            <h3>© 2023 Railway Transportation News Announcement System. All rights reserved.</h3>
            <center>
    </footer>
</body>

</html>