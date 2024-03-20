<?php
include '../db/dbconnect.php';
$sid=$_GET['student_id'];
$sql="delete from student where student_id='$sid'";
$result=mysqli_query($conn,$sql);
header('Location: students.php');
?>