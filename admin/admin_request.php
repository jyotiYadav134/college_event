<?php
include 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        .main-content {
            max-width: 800px;
            margin: 20px auto;
             padding: 0 20px;
        }
        
        button{
            display: inline-block;
            padding: 10px 20px;
            background-color: rgb(76, 175, 80);
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        button:hover {
            background-color: rgb(69, 160, 73);
        }
        a{
            text-decoration:none;
            color:white;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <h1>Requests</h1>

           <?php
include '../db/dbconnect.php';
$sql="SELECT * FROM student";
$result=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($result)){
    echo "<br>";    
  echo "Name: ". $row['student_name'];
  echo "<br>";
  if($row['student_status']=='pending_volunteer'){
    echo "Wants to be: Volunteer";
  }elseif($row['student_status']=='pending_participant'){
    echo "Wants to be: Participant";
  }
  if ($row['student_status'] == "volunteer" || $row['student_status'] == "participant"): ?>
      <span>Approved</span>
  <?php elseif ($row['student_status'] == 'rejected'): ?>
      <span>Rejected</span>
  <?php else: ?>
      <a href="approval.php?std_id=<?php echo $row['student_id']; ?>"><button>Approve</button></a>
      <a href="reject.php?std_id=<?php echo $row['student_id']; ?>"><button>Reject</button></a>
  <?php endif; 
  
  }?>
  
    </div>

</body>
</html>