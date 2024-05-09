<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - College Event Management System</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General styles */
        body {
            font-family: 'Open Sans', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5; /* Light gray background */
        }

        /* Main content padding */
        main {
            padding: 30px;
        }

        /* Footer styles */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }

        /* Dashboard Buttons Section */
        .dashboard-buttons {
            display: flex;
            justify-content: center;
            gap: 20px; /* Space between buttons */
            margin-bottom: 20px; /* Margin below buttons */
        }

        /* Button styling */
        .btn {
            display: inline-block;
            padding: 10px 20px;
            width: 200px;
            height:200px;
            background-color: #007bff; /* Bootstrap primary blue color */
            color: #fff;
            text-decoration: none;
            text-align:center;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-size: 20px; /* Increase the font size */
        }

        .btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }
        .count{
            font-size:60px;
            color:black;
        }
    </style>
</head>

<body>
    <!-- Include the admin header and session handling -->
    <?php
    include '../db/dbconnect.php';
    include 'admin_header.php';
    include 'session.php';
    if (!isset($_SESSION['username'])) {
        header("Location: ../auth/login.php");
        exit();
    }
    ?>

    <!-- Main content -->
    <main>
        <div class="container">
            <!-- Dashboard Buttons Section -->
            <div class="dashboard-buttons">
                <?php
                // Calculate the count of upcoming events, past events, and students
                $today = date('Y-m-d');

                // Count of upcoming events
                $upcoming_event_count_query = "SELECT COUNT(*) as count FROM event WHERE event_date >= '$today'";
                $upcoming_event_count_result = mysqli_query($conn, $upcoming_event_count_query);
                $upcoming_event_count = mysqli_fetch_assoc($upcoming_event_count_result)['count'];

                // Count of past events
                $past_event_count_query = "SELECT COUNT(*) as count FROM event WHERE event_date < '$today'";
                $past_event_count_result = mysqli_query($conn, $past_event_count_query);
                $past_event_count = mysqli_fetch_assoc($past_event_count_result)['count'];

                // Count of students
                $student_count_query = "SELECT COUNT(*) as count FROM student";
                $student_count_result = mysqli_query($conn, $student_count_query);
                $student_count = mysqli_fetch_assoc($student_count_result)['count'];

                ?>

                <!-- Buttons with total counts -->
                <a href="event.php" class="btn">
                    Upcoming Events 
                    <p class='count'>
                    <?php echo $upcoming_event_count; ?>
                    </p>
                </a>
                <a href="event.php" class="btn">
                    Past Events 
                    <p class='count'>
                    <?php echo $past_event_count; ?>
                    </p>
                </a>
                <a href="students.php" class="btn">
                Students
                <p class='count'>
                <?php echo $student_count; ?>
                </p>
                    
                </a>
            </div>
        </div>
    </main>

    <!-- Include the admin footer -->
    <?php include '../footer/adminfooter.php'; ?>
</body>

</html>
