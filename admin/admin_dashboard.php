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
            height: 200px;
            background-color: #007bff; /* Bootstrap primary blue color */
            color: #fff;
            text-decoration: none;
            text-align: center;
            border-radius: 5px;
            transition: background-color 0.3s ease;
            font-size: 20px; /* Increase the font size */
        }

        .btn:hover {
            background-color: #0056b3; /* Darker blue on hover */
        }

        .count {
            font-size: 60px;
            color: black;
        }
    </style>
</head>

<body>
    <!-- Include the admin header and session handling -->
    <?php
    include '../db/dbconnect.php';
    include 'admin_header.php';
    include 'session.php';
    ?>

    <!-- Main content -->
    <main>
        <div class="container">
            <!-- Dashboard Buttons Section -->
            <div class="dashboard-buttons">
                <?php
                // Calculate the count of upcoming events, past events, students, and pending requests
                $today = date('Y-m-d');

                // Count of upcoming events
                $upcoming_event_count_query = "SELECT COUNT(*) as count FROM event WHERE event_date >= '$today'";
                $upcoming_event_count_result = mysqli_query($conn, $upcoming_event_count_query);

                // Error handling for the upcoming events query
                if ($upcoming_event_count_result) {
                    $upcoming_event_count = mysqli_fetch_assoc($upcoming_event_count_result)['count'];
                } else {
                    echo "Error fetching upcoming event count: " . mysqli_error($conn);
                    $upcoming_event_count = 0; // Default to 0 if there's an error
                }

                // Count of past events
                $past_event_count_query = "SELECT COUNT(*) as count FROM event WHERE event_date < '$today'";
                $past_event_count_result = mysqli_query($conn, $past_event_count_query);

                // Error handling for the past events query
                if ($past_event_count_result) {
                    $past_event_count = mysqli_fetch_assoc($past_event_count_result)['count'];
                } else {
                    echo "Error fetching past event count: " . mysqli_error($conn);
                    $past_event_count = 0; // Default to 0 if there's an error
                }

                // Count of students
                $student_count_query = "SELECT COUNT(*) as count FROM student";
                $student_count_result = mysqli_query($conn, $student_count_query);

                // Error handling for the students query
                if ($student_count_result) {
                    $student_count = mysqli_fetch_assoc($student_count_result)['count'];
                } else {
                    echo "Error fetching student count: " . mysqli_error($conn);
                    $student_count = 0; // Default to 0 if there's an error
                }

                // Count of pending requests
                // Calculate pending requests count based on participants and volunteers
                $pending_request_count_query = "
                    SELECT 
                        (SELECT COUNT(*) FROM participants WHERE p_status = 'pending') +
                        (SELECT COUNT(*) FROM volunteer WHERE v_status = 'pending')
                    AS count";
                
                $pending_request_count_result = mysqli_query($conn, $pending_request_count_query);

                // Error handling for the pending requests query
                if ($pending_request_count_result) {
                    $pending_request_count = mysqli_fetch_assoc($pending_request_count_result)['count'];
                } else {
                    echo "Error fetching pending request count: " . mysqli_error($conn);
                    $pending_request_count = 0; // Default to 0 if there's an error
                }
                ?>

                <!-- Buttons with total counts -->
                <a href="event.php" class="btn">
                    Upcoming Events
                    <p class='count'>
                    <?php echo $upcoming_event_count; ?>
                    </p>
                </a>
                <a href="pastevent.php" class="btn">
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
                
                </a>
            </div>
        </div>
    </main>

    <!-- Include the admin footer -->
    <?php include '../footer/adminfooter.php'; ?>
</body>

</html>
