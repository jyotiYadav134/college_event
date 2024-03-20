<?php

include '../db/dbconnect.php';
include 'admin_header.php';
include 'session.php';
if(isset($_SESSION['username'])) {
    $admin_id = $_SESSION['username']; 
} else {
    header("Location: ../auth/login.php"); 
    exit();
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - College Event Management System</title>
    <link rel="stylesheet" href="styles.css">
</head>
<style>
    

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

main {
    padding: 20px;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}

</style>
<body>
<?php
    //    $admin_id = mysqli_real_escape_string($conn, $user_admin_id);
        include '../db/dbconnect.php';
       $admin_query = "SELECT * FROM admin";
       $result_admin = mysqli_query($conn, $admin_query);
       $num_admin = mysqli_num_rows($result_admin);
       // Check if at least one row is returned
       if ($num_admin > 0) 
       {
           $admin_row = mysqli_fetch_array($result_admin);
           $admin_id = $admin_row['admin_id'];
           
        //    echo $num_admin;
       } 
       else 
       {
           $db_name = "Unknown Admin";
       }
   ?>

    <main>
        <center><h2>Welcome to the Admin Dashboard</h2></center>
        <p>Choose an option from the navigation menu to get started.</p>
        
    </main>
    <?php
include '../footer/footer.php';
?>

</body>
</html>
