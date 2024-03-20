<?php
include '../db/dbconnect.php';
if($_GET['std_id']){
    $s_id=$_GET['std_id'];
}
$sql="SELECT * FROM student where student_id='$s_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
if($row['student_status']=='pending_volunteer'){
    $ssql="UPDATE student SET student_status='volunteer' WHERE student_id='$s_id'";
    $rresult=mysqli_query($conn,$ssql);
}else if($row['student_status']=='pending_participant'){
    $ssql="UPDATE student SET student_status='participant' WHERE student_id='$s_id'";
    $rresult=mysqli_query($conn,$ssql);
}
header('Location:admin_request.php');
?>

