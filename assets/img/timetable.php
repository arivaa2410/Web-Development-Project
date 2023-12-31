<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Railway Schedule</title>
    <style>
        body {
            font-family: helvetica;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #8bc9e4;
        }

        header {
            background-color: #598fb7;
            color: black    ;
            text-align: center;
            padding: 1em;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header img {
            max-width: 70px;
            height: auto;
            margin-bottom: 10px;
        }

        h1, h2 {
            margin: 0;
        }

        h1 {
            color: #1f5588;
            font-family: 'Times New Roman', Times, serif;
        }

        h2 {
            color: black;
            font-family: Arial, sans-serif;
        }

        nav {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        nav a {
            text-decoration: none;
            color: #1f5588;
            padding: 10px;
            margin: 0 10px;
            border-radius: 5px;
            background-color: #fff;
        }

        nav a:hover {
            background-color: #1f5588;
            color: #fff;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        footer {
            background-color: #1f5588;
            color: #fff;
            text-align: center;
            padding-bottom: 10px;
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <header>
        <img src="trainlogov2.png">
        <h1>Railway Transportation News Announcement System</h1>
        <h2>Embark On a Journey, Let the Rail Unfolds</h2>
    </header>

    <nav>
        <a href="news.php">News</a>
        <a href="library.php">Library</a>
        <a href="timetable.php">Train Timetable</a>
        <a href="profile.php">User Profile</a>
        <a href="logout.php">Logout</a>
    </nav>

    <main>
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "trainschedule";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch train schedules from the database
        $sql = "SELECT
                    ts.ScheduleID,
                    t.TrainName,
                    ts.DepartureStationName,
                    ts.DepartureTime,
                    ts.ArrivalStationName,
                    ts.ArrivalTime,
                    ts.Platform
                FROM
                    trainschedule ts
                INNER JOIN
                    trains t ON ts.TrainID = t.TrainID";
        $result = $conn->query($sql);
        ?>

        <!-- Render the table -->
        <table>
            <thead>
                <tr>
                    <th>Schedule ID</th>
                    <th>Train Name</th>
                    <th>Departure Station</th>
                    <th>Departure Time</th>
                    <th>Arrival Station</th>
                    <th>Arrival Time</th>
                    <th>Platform</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) : ?>
                    <tr>
                        <td><?= $row['ScheduleID'] ?></td>
                        <td><?= $row['TrainName'] ?></td>
                        <td><?= $row['DepartureStationName'] ?></td>
                        <td><?= $row['DepartureTime'] ?></td>
                        <td><?= $row['ArrivalStationName'] ?></td>
                        <td><?= $row['ArrivalTime'] ?></td>
                        <td><?= $row['Platform'] ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <!-- End of the table rendering -->

        <?php
        $conn->close();
        ?>
    </main>

    <footer>
        <h3>© 2023 Railway Transportation News Announcement System. All rights reserved.</h3>
    </footer>
</body>
</html>
