<?php include "student_header.php"; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!-- Student Dashboard -->
    <section class="student-dashboard">
        <div class="container">
            <h2>Events You Participated In</h2>
            <div class="events">
                <?php
                // Connect to the database
                include '../db/dbconnect.php';
                session_start();
                $student_name = $_SESSION['username'];
                // Query to fetch events the student has participated in
                $sql = "
                    SELECT * from event 
                    join student on student.e_id=event.event_id
                    where student.s_user_id='$student_name'
                    ;
                ";
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
                        echo '<p>Your Status: ' . htmlspecialchars($row['student_status']) . '</p>';
                       
                        echo '</div>';
                    }
                } else {
                    // If the student has not participated in any events, display a message
                    echo '<p>You have not participated in any events yet.</p>';
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
