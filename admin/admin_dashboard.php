<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        input[type="text"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"] {
            margin-bottom: 30px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Event</h2>
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="name">Event Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="date">Event Date</label>
            <input type="date" name="date" id="date" required>
            <label for="time">Event Time:</label>
            <input type="time" id="time" name="time" required>

            <label for="venue">Event Venue:</label>
            <input type="text" id="venue" name="venue" required>

            <label for="location">Event Location:</label>
            <input type="text" id="location" name="location" required>

            <label for="status">Event Status:</label>
            <select id="status" name="status" required>
                <option value="Upcoming">Upcoming</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Past">Past</option>
            </select>

            <label for="image">Event Image:</label>
            <input type="file" id="image" name="image" required>

            <input type="submit" name="event" value="Add Event">
        </form>
    </div>
<?php
if(isset($_POST['event'])){
    include './db/dbconnect.php';
}
?>
</body>
</html>
