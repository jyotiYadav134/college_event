<?php
session_start(); 

if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
}
if (isset($_SESSION['user'])) {
    unset($_SESSION['user']);
}

echo "<script>alert('You have been logged out');</script>";

echo "<script>window.location.href='login.php';</script>";
exit();
?>
