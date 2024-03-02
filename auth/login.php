<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Event Management System</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 50px auto;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
}

h1 {
    text-align: center;
}

.wrapper {
    margin-top: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
input[type="password"],
select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.btn-login {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
}

.btn-login:hover {
    background-color: #0056b3;
}

.register-link {
    text-align: center;
}

.register-link a {
    color: #007bff;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}

    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <div class="wrapper">
            <form method="post" class="login-form">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password">
                </div>

                <div class="form-group">
                    <label for="usertype">User Type</label>
                    <select name="usertype" id="usertype">
                        <option value="1">Admin</option>
                        <option value="2">Student</option>
                    </select>
                </div>

                <input type="submit" value="Login" name="login" class="btn-login">
                <p class="register-link">Don't have an account? <a href="register.php">Register</a> as a student</p>
            </form>
        </div>
    </div>
</body>
</html>
<?php
include '../db/dbconnect.php';
session_start();
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $inputUsertype = $_POST['usertype'];
    if($inputUsertype == 1){
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = $inputUsertype;
        $sql="SELECT * FROM admin ";
        $result=mysqli_query($conn,$sql);
        $row=mysqli_fetch_assoc($result);
        $dbuser=$row['username_id'];
        $dbpass=$row['password'];
        if($username == $dbuser && $password==$dbpass){
            header("../admin/admin_dashboard.php");  
            
        }else{
            echo "invalid data";
        }
        
    } else if ($inputUsertype == 2){
        $_SESSION['username'] = $username;
        $_SESSION['usertype'] = $inputUsertype;
        $sql="SELECT * FROM student ";
        $result=mysqli_query($conn,$sql);
        while($row=mysqli_fetch_assoc($result)){
            $dbUser=$row['s_user_id'];
            $dbPass=$row['Password'];
            if($username == $dbUser && $password==$dbPass){
                header("../users/student_dashboard.php");    
            }
        }

    } 

}
?>
