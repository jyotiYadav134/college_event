<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Welcome  <?php 
    include '../db/dbconnect.php';
    session_start();
    $user=$_SESSION['username'];
    echo $user;
    $sql ="SELECT * from student where s_user_id='$user'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    ?> 
  </h1>
  <div class="detail">
    <p>Email: <?php
    echo $row['Email'];
    ?>  </p>
    <p>
    Semester: <?php
    echo $row['semester'];
    ?>  
    </p>
  </div>
  </div>
</body>
</html>
<<?php
include '../db/dbconnect.php';

?>
