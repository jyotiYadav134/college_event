<?php
include '../db/dbconnect.php';
if($_GET['std_id']){
    $s_id=$_GET['std_id'];
}
$sql="SELECT * FROM student
 where student_id='$s_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$e_id=$row['e_id'];
if($row['student_status']=='pending_volunteer'){
    $ssql="UPDATE student SET student_status='volunteer' WHERE student_id='$s_id'";
    $rresult=mysqli_query($conn,$ssql);
    $vql="insert into volunteer(v_status,std_id,evet_id) values('volunteer','$s_id','$e_id')";
    $vresult=mysqli_query($conn,$vql);
}else if($row['student_status']=='pending_participant'){
    $ssql="UPDATE student SET student_status='participant' WHERE student_id='$s_id'";
    $rresult=mysqli_query($conn,$ssql);
    $pql="insert into participants(p_status,stud_id,evt_id) values('participant','$s_id','$e_id')";
    $presult=mysqli_query($conn,$pql);
}
header('Location:admin_request.php');
?>


