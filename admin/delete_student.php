<?php
include '../db/dbconnect.php';
include 'session.php';

if (!isset($_SESSION['user'])) {
    header('Location: ../auth/login.php'); 
    exit(); 
}

if (isset($_GET['student_id'])) {
    $sid = $_GET['student_id'];
    $sql = "DELETE FROM student WHERE student_id = '$sid'";
    $result = mysqli_query($conn, $sql);
    header('Location: students.php');
    exit(); // Stop the script
}
?>
