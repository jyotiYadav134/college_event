<?php
include '../db/dbconnect.php';
$sql="SELECT * from student";
$result= mysqli_query($conn,$sql);
$esql="SELECT * from student";
$eresult=mysqli_query($conn,$esql);
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
        .rental-request {
            margin-bottom: 20px;
            border: 1px solid #ddd;
            padding: 10px;
            background-color: #fff;
        }
        .bt{
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
        .bt:hover {
            background-color: rgb(69, 160, 73);
        }
        
    </style>
</head>
<body>
    <div class="main-content">
        <h1>Requests</h1>
        <?php
            while($row=mysqli_fetch_assoc($result)){
                ?>
                <div class="rental-request">
                    <p><strong>Student Name: </strong> <?php echo $row['student_name']; ?></p>
                    <p><strong>Student Email: </strong> <?php echo $row['Email']; ?></p>
                    <p><strong>Event id: </strong> <?php
                    while($erow=mysqli_fetch_assoc($eresult)){
                        echo $erow['event_id']; 
                        } ?></p>
                    <p><strong>Request: </strong> <?php echo $row['r_end_date']; ?></p>
                    <?php if ($row['r_status'] == 'approved'): ?>
                        <span>Approved</span>
                    <?php elseif ($row['r_status'] == 'rejected'): ?>
                        <span>Rejected</span>
                    <?php else: ?>
                        <a href="approval.php?request_id=<?php echo $row['r_id']; ?>"><button class="bt">Approve</button></a>
                        <a href="rejection.php?request_id=<?php echo $row['r_id']; ?>"><button class="bt">Reject</button></a>
                    <?php endif; ?>
                </div>
            <?php
            }
         ?>  
    </div>

</body>
</html>