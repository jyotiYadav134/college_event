<?php include "../head/top.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Event Management System</title>
    <style>
        /* General styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        nav ul li {
            display: inline;
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        .landing {
            padding: 50px 0;
            background-color: #f9f9f9;
            text-align: center;
        }

        .landing h2 {
            margin-bottom: 30px;
            font-size: 28px;
            color: #333;
        }

        .events {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .event {
            width: 300px;
            border: 1px solid #ccc;
            margin: 10px;
            padding: 20px;
            background-color: #fff;
            transition: transform 0.3s ease;
        }

        .event:hover {
            transform: translateY(-5px);
        }

        .event h3 {
            margin-top: 0;
            font-size: 24px;
            color: #333;
        }

        .event p {
            margin-bottom: 10px;
            font-size: 16px;
            color: #666;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: skyblue; /* Changed to sky blue */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #555;
        }

        footer {
            background-color: skyblue; /* Changed from black to sky blue */
            color: #fff;
            padding: 20px 0;
            text-align: center;
        }
    </style>
</head>

<body>
    <section class="landing">
        <div class="container">
            <h2>Upcoming Events</h2>
            <div class="events">
                <!-- Event listings will be dynamically inserted here -->
                <?php
                // Connect to the database
                include '../db/dbconnect.php';

                // Get the current date
                $today = date('Y-m-d');

                // Query for upcoming events
                $sql = "SELECT * FROM event WHERE event_date >= '$today'";
                $result = mysqli_query($conn, $sql);

                // Check if any events were returned
                if (mysqli_num_rows($result) > 0) {
                    // Loop through the result set and display each event
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="event">';
                        echo '<h3>' . htmlspecialchars($row['event_name']) . '</h3>';
                        echo '<img src="../admin/' . htmlspecialchars($row['e_picture']) . '" alt="Event Image" width="200" height="150">';
                        echo '<p>Date: ' . htmlspecialchars($row['event_date']) . '</p>';
                        echo '<p>Time: ' . htmlspecialchars($row['e_time']) . '</p>';
                        echo '<p>Venue: ' . htmlspecialchars($row['venue']) . '</p>';
                        echo '<a href="../auth/login.php" class="btn">Learn More</a>';
                        echo '</div>';
                    }
                } else {
                    // If no upcoming events, display a message
                    echo '<p>No upcoming events found.</p>';
                }

                // Close the database connection
                mysqli_close($conn);
                ?>
            </div>
        </div>
    </section>
</body>

</html>

<?php include "../footer/footer.php"; ?>
