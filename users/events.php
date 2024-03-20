<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Display</title>
    <style>
        .event-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
        }
        
        .event-card {
            background-color: #ffffff;
            border: 1px solid #dddddd;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .event-card h3 {
            margin-top: 0;
            margin-bottom: 10px;
        }
        
        .event-card p {
            margin: 0;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <h2>Event List</h2>
    <div class="event-container">
        <?php
        include '../db/dbconnect.php';
        $sql = "SELECT * FROM event";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="event-card">';
            echo '<h3>' . $row['venue'] . '</h3>';
            echo '<p><strong>Time:</strong> ' . $row['e_time'] . '</p>';
            echo '<p><strong>Location:</strong> ' . $row['e_location'] . '</p>';
            echo '<img src='../admin/event.php".$row['e_picture'] .';
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>
