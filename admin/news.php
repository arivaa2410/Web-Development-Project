<?php
include_once '../db_connection.php';
//fetch news in descending order
$sql = "SELECT * FROM news ORDER BY news_id DESC";
$result = mysqli_query($conn, $sql);
$allnews = mysqli_fetch_all($result, MYSQLI_ASSOC);

//if get news idd, open the news in edit mode
if (isset($_GET['news_id'])) {
    $news_id = $_GET['news_id'];
    $sql = "SELECT * FROM news WHERE news_id = '$news_id'";
    $result = mysqli_query($conn, $sql);
    $news = mysqli_fetch_assoc($result);


    echo "<script>document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('addNewsBtn').click();
    });</script>";
}

if (isset($_POST['title']) && isset($_POST['description'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $date = date('Y-m-d H:i:s');

    // Check if the news_id and news_id_current are set, initializing them if available
    $news_id = isset($_POST['news_id']) ? $_POST['news_id'] : null;
    $news_id_current = isset($_POST['news_id_current']) ? $_POST['news_id_current'] : null;

    // Prepare the SQL statement for either updating existing news or inserting new news
    if ($news_id_current) {
        $sql = "UPDATE news SET Title = '$title', Description = '$description' WHERE news_id = '$news_id_current'";
    } else {
        // Check if the news with the given ID already exists in the database
        $sql_check = "SELECT * FROM news WHERE news_id = '$news_id'";
        $result_check = mysqli_query($conn, $sql_check);
        if (!$result_check || mysqli_num_rows($result_check) > 0) {
            // If the news ID exists, show an alert and exit
            echo "<script>alert('News ID already exists!'); window.location.href = 'news.php';</script>";
            exit;
        }

        // Insert new news if the ID doesn't exist
        $sql = "INSERT INTO news (news_id, Title, Description, Time) VALUES ('$news_id', '$title', '$description', '$date')";
    }

    // Execute the SQL query
    if (mysqli_query($conn, $sql)) {
        header('Location: news.php');
        exit;
    } else {
        // If there's an error, display it as an alert
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
        header('Location: news.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin - Manage News</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <h1>Admin Dashboard</h1>
    </header>

    <aside>
        <ul>
            <li><a href="news.php">Manage News</a></li>
            <!-- Other dashboard options can be added here -->
        </ul>
    </aside>

    <main>
        <a href="#" style="color: blue" id="addNewsBtn">Add News</a>
        <br><br>
        <section class="table-section">
            <h2>News List</h2>
            <table id="newsTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($allnews as $index => $news) { ?>
                        <tr>
                            <td><?= $news['news_id'] ?></td>
                            <td><?= $news['Title'] ?></td>
                            <td><?= $news['Time'] ?></td>
                            <td>
                                <a style="color: blue" href="news.php?news_id=<?= $news['news_id'] ?>&edit=true">Edit</a>
                                <a style="color: red" onclick="return(confirm('Are you sure you want to delet this news?'))" href="delete-news.php?news_id=<?= $news['news_id'] ?>">Delete</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </main>

    <div id="newsModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <?php
            $edit = isset($_GET['edit']) ? $_GET['edit'] : false;
            $news_id = isset($_GET['news_id']) ? $_GET['news_id'] : '';

            if ($edit) {
                // Fetch the news data based on the news_id
                $sql = "SELECT * FROM news WHERE news_id = '$news_id'";
                $result = mysqli_query($conn, $sql);
                $newsData = mysqli_fetch_assoc($result);

                // Fill the form fields with the fetched data
                $news_id_value = $newsData['news_id'];
                $title_value = $newsData['Title'];
                $description_value = $newsData['Description'];
            } else {
                // Set default values for the form fields
                $news_id_value = '';
                $title_value = '';
                $description_value = '';
            }
            ?>

            <form method="post" id="newsForm">

                <label for="news_id">News ID</label>
                <input type="text" name="news_id" id="news_id" value="<?= $news_id_value ?>" <?php echo isset($_GET['edit']) ? 'readonly' : '' ?> required>
                <label for="title">Title</label>
                <input type="text" name="title" id="title" value="<?= $title_value ?>" required>
                <label for="description">Description</label>
                <textarea name="description" id="description" cols="30" rows="10" required><?= $description_value ?></textarea>

                <?php if ($edit) { ?>
                    <input type="hidden" name="news_id_current" value="<?= $news_id ?>">
                    <button type="button" class="closeNewsBtn" onclick="location.href='news.php'">Close</button>
                <?php } ?>

                <button type="submit" id="saveNewsBtn">Save</button>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>