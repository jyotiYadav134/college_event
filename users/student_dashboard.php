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
    $user=$_SESSION['username'] ;
    echo $user;
    $ssql ="SELECT * from student where s_user_id='$user'";
    $rresult=mysqli_query($conn,$ssql);
    $rrow=mysqli_fetch_assoc($rresult);
    ?> 
  </h1>
  <div class="detail">
    <p>Email: <?php
    echo $rrow['Email'];
    ?>  </p>
    <p>
    Semester: <?php
    echo $rrow['semester'];
    ?>  
    </p>
  </div>
 

   <div> 
            <?php
            $sql="SELECT * FROM event ";
            $result=mysqli_query($conn,$sql);
            $num=mysqli_num_rows($result);
            while($row=mysqli_fetch_assoc($result)){
            ?>
            <img  src="../admin/<?php echo $row['e_picture']; ?>">
              
  <div class="req">
    <h2>Become a volunteer or participant</h2>
    <button><a href="student_request.php?e_id=<?php echo $row['event_id']?>">register</a></button>
  </div>
  </div>
            <?php
            }
            ?>
        </div>
</body>
</html>
