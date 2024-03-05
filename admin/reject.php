<?php
include '../db/dbconnect.php';
if($_GET['request_id']){
    $r_id=$_GET['request_id'];
}
$sql="UPDATE student SET student_status='Volunteer' WHERE student_id='$r_id'";
$result=mysqli_query($conn,$sql);
header('Location: admin_request.php');
?>