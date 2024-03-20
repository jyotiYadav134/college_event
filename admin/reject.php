<?php
include '../db/dbconnect.php';
if($_GET['std_id']){
    $s_id=$_GET['std_id'];
}
$sql="UPDATE student SET student_status='rejected' WHERE student_id='$s_id'";
$result=mysqli_query($conn,$sql);
header('Location: admin_request.php');
?>
