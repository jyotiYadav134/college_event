<?php
// Include necessary files for header and session handling
include 'admin_header.php';
include 'session.php';

// Database connection
include '../db/dbconnect.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Past Events</title>
    <style>
        /* Include your existing CSS styles here */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f8f9fa;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #007bff;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9ecef;
        }

        .action-links a {
            color: #007bff;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .action-links a:hover {
            color: #0056b3;
        }

        img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 4px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Past Events</h1>
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Event Name</th>
                    <th>Date</th>
                    <th>Time</th>
                    <th>Venue</th>
                    <th>Location</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query for past events
                $sql = "SELECT * FROM event WHERE event_date < CURDATE() ORDER BY event_date DESC";
                $result = mysqli_query($conn, $sql);

                // Error handling for the query
                if (!$result) {
                    echo "Error fetching past events: " . mysqli_error($conn);
                } else {
                    // Iterate through each past event
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$i}</td>";
                        echo "<td>" . htmlspecialchars($row['event_name']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['event_date']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['e_time']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['venue']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['e_location']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td><img src='" . htmlspecialchars($row['e_picture']) . "' alt='Event Image'></td>";
                        echo "<td>";
                        // Add action links for editing and deleting past events
                        echo "<a href='edit_event.php?event_id=" . urlencode($row['event_id']) . "'>Edit</a> | ";
                        echo "<a href='delete_event.php?event_id=" . urlencode($row['event_id']) . "'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";

                        $i++;
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
<?php
include '../footer/adminfooter.php';
?>
</html>
