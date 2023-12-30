<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Home </title>
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

    nav a i{
        margin-right: 5px; /* Adjust the space between the icon and text */

    }

    nav a:hover {
        background-color: #ddd;
    }
    </style>

    <body>
            
            <img src="assets/img/railwayicon2.jpg" alt="railway icon" width="300" height="100">

            <div class="topleft4"><b> Railway Transportation News Announcement System </b></div>
            
            <div class="topleft5"> Embark On a Journey, Let the Rail Unfolds </div>
            
            <br><br><br><br><br><br><br><br><br><br>
       
      <header> 
        <center>
          <h1><b>HOME</b></h1>
        </center>
      </header><br><br>

      <center>
        <h1><b> WELCOME TO RAILWAY TRANSPORTATION NEWS ANNOUNCEMENT SYSTEM </b></h1><br>
       </center>

        <center>
        <div class="homepage">

            <nav id="homepage" method="get" action="homepage.php">
            
            <nav>
            <ul>
             <li><a href="homepage.php"><i class="fas fa-home"></i>Home</a></li>
             <li><a href="news.php"><i class="fas fa-newspaper"></i>News</a></li>
             <li><a href="traintimetable.php"><i class="fa-solid fa-calendar"></i>Train Timetable</a></li>
             <li><a href="library.php"><i class="fas fa-book"></i>Library</a></li>
             <li><a href="userprofile.php"><i class="fas fa-user"></i>User Profile</a></li>
             <li><a href="logout.php"><i class="fas fa-right-from-bracket"></i>Logout</a></li>
             </ul>
            </nav>

        </div>
    </center>

    <!--Footer -->
    <?php include('footer.php'); ?>
    <!-- /Footer--> 

    
