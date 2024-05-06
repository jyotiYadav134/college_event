<?php
include 'admin_header.php';
include 'session.php';?>
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
            <input type="text" id="name" name="event_name" required>
            <label for="date">Event Date</label>
            <input type="date" name="event_date" id="date" required>
            <label for="time">Event Time:</label>
            <input type="time" id="time" name="e_time" required>

            <label for="venue">Event Venue:</label>
            <input type="text" id="venue" name="venue" required>

            <label for="location">Event Location:</label>
            <input type="text" id="location" name="e_location" required>

            
            <label for="text">Event Description:</label>
            <input type="text" id="description" name="description" required>


            <label for="image">Event Image:</label>
            <input type="file" id="image" name="image" required>

            <input type="submit" name="add" value="Add Event">
        </form>
    </div>
<?php
include '../db/dbconnect.php';

    if(isset($_POST['add'])){
        $name=$_POST['event_name'];
        $date=$_POST['event_date'];
        $time=$_POST['e_time'];
        $venue=$_POST['venue'];
        $location=$_POST['e_location'];
        $description=$_POST['description'];
        $Picture = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $folder = "pics/" . $Picture;
        move_uploaded_file($temp, $folder);
        $sql="INSERT INTO event(venue,e_time,e_picture,e_location,event_name,description,event_date) values
        ('$venue','$time','$folder','$location','$name','$description','$date') ";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<script>
            alert("event added successfully!");
            window.location.href = "event.php";</script>';
        }
    }
?>
</body>
<?php
include '../footer/adminfooter.php';
?>
</html>