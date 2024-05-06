<?php
include '../db/dbconnect.php';
if($_GET['std_id']){
    $s_id=$_GET['std_id'];
}
$sql="SELECT * FROM student where student_id='$s_id'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$vsql="SELECT * FROM student where student_id='$s_id'";
$sresult=mysqli_query($conn,$vsql);
$vrow=mysqli_fetch_assoc($sresult);
$e_id=$vrow['e_id'];
if($row['student_status']=='pending_volunteer'){
    $ssql="UPDATE student SET student_status='volunteer' WHERE student_id='$s_id'";
    $rresult=mysqli_query($conn,$ssql);
    $vql="insert into volunteer(std_id,evet_id) values('$s_id','$e_id')";
    $vresult=mysqli_query($conn,$vql);
}else if($row['student_status']=='pending_participant'){
    $ssql="UPDATE student SET student_status='participant' WHERE student_id='$s_id'";
    $rresult=mysqli_query($conn,$ssql);
    $pql="insert into participants(stud_id,evt_id) values('$s_id','$e_id')";
    $presult=mysqli_query($conn,$pql);
}
header('Location:admin_request.php');
?>


