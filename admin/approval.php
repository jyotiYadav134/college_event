<?php
include '../db/dbconnect.php';
if($_GET['request_id']){
    $r_id=$_GET['request_id'];
}
$sql="UPDATE rent SET r_status='approved',is_returned = 0 WHERE r_id='$r_id'";
$result=mysqli_query($conn,$sql);
header('Location:rental_request.php');

?>