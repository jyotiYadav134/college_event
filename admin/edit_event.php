<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        h1{
            text-align:center;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="number"],
        input[type="password"],
        input[type="email"],
        input[type="file"],
        input[type='tel'],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        header {
    background-color: #9DD9F3;
    color: #fff;
    padding: 20px;
    text-align: center;
}

header h1 {
    margin: 0;
}

nav ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}

nav ul li a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
<header>
        <h1>Admin Dashboard</h1>
        <nav>
            <ul>
                <li><a href="index.php">Dashboard</a></li>
                <li><a href="event.php">Events</a></li>
                <li><a href="students.php">Students</a></li>
            </ul>
        </nav>
    </header>
    <?php
    if(isset($_GET['event_id']))
    {include '../db/dbconnect.php';
        $event_id=$_GET['event_id'];
        echo $event_id;
        $select_event="select * from event where event_id='$event_id'";
        $result_select=mysqli_query($conn,$select_event);
        if(mysqli_num_rows($result_select))
        {
            while($row=mysqli_fetch_assoc($result_select))
            {
                $evt_id=$row['event_id'];
                $evt_venue=$row['venue'];
                $evt_time=$row['e_time'];
                $evt_picture= basename($row['e_picture']);
                // echo $evt_picture;
                $evt_location=$row['e_location'];
                $evt_name=$row['event_name'];
                $evt_description=$row['description'];
                $evt_date=$row['event_date'];

                // echo $evt_venue;
            }
        }
    }
        
    ?>
    <form action="" method="POST" enctype="multipart/form-data">
    <h1>EDIT</h1>
    <label for="name">Event Name:</label>
            <input type="text" value='<?php echo $evt_name ?>' id="name" name="event_name">

            <label for="date">Event Date</label>
            <input type="date" value='<?php echo $evt_date ?>' name="event_date" id="date">

            <label for="time">Event Time:</label>
            <input type="time" value='<?php echo $evt_time ?>' id="time" name="e_time">

            <label for="venue">Event Venue:</label>
            <input type="text" value='<?php echo $evt_venue ?>' id="venue" name="venue">

            <label for="location">Event Location:</label>
            <input type="text" value='<?php echo $evt_location ?>' id="location" name="e_location">

            
            <label for="text">Event Description:</label>
            <input type="text" value='<?php echo $evt_description ?>' id="description" name="description">


            <label for="image">Event Image:</label>
            <input type="file" id="image" name="image" >
            Existing Image: <?php echo $evt_picture ?>

            <input type="submit" name="update" value="Update Event">
        </form>
     
    <?php
    include '../db/dbconnect.php';
    if(isset($_POST['update'])){
        $name=$_POST['event_name'];
         $date=$_POST['event_date'];
         $time=$_POST['e_time'];
         $venue=$_POST['venue'];
         $location=$_POST['e_location'];
         $description=$_POST['description'];
         $update_picture = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $folder = "./pics/" . $update_picture;
        move_uploaded_file($temp, $folder);
        // echo $folder;
        $sql="UPDATE event set venue='$venue',e_time='$time',e_picture='$folder', e_location='$location',event_name='$name',description='$description',event_date='$date' ";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "Event added successfully";
        }
    }
?>
</body>
<?php
include '../footer/footer.php';

    ?>
</body>
</html>