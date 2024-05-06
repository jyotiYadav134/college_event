<?php include "student_header.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="style.css">
  <style>
    /* Additional CSS styles */
    body {
      background-color: #f4f4f4;
      font-family: Arial, sans-serif;
    }
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
    }
    .detail {
      margin-bottom: 20px;
    }
    .detail h2 {
      color: #007bff;
      margin-top: 0;
    }
    .detail p {
      margin: 10px 0;
      color: #666;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Welcome <?php
    include '../db/dbconnect.php';
    session_start();
    $user=$_SESSION['username'] ;
    echo $user;
    $ssql ="SELECT * from student where s_user_id='$user'";
    $rresult=mysqli_query($conn,$ssql);
    $rrow=mysqli_fetch_assoc($rresult);
    ?></h1>
    <div class="detail">
      <h2>Student Details:</h2>
      <img src="<?php echo $rrow['s_picture']; ?>" alt="Student Image">
      <p><strong>Name:</strong> <?php 
      echo $rrow['student_name']; ?></p>
      <p><strong>Email:</strong> <?php echo $rrow['Email']; ?></p>
      <p><strong>Semester:</strong> <?php echo $rrow['semester']; ?></p>
      <button><a href="editprofle.php?student_id=<?php echo $rrow['student_id']; ?>">Edit Profile</a></button>
    </div>
  </div>
</body>
</html>
