<?php
include 'admin_header.php';
include 'session.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        

        .container {
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }
        input[type="text"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="file"] {
            margin-bottom: 30px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>Add Student</h2>
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div class="form-group">
                <label for="number">Phone:</label>
                <input type="text" name="phone" id="phone" required>
            </div>
            <div class="form-group">
                <label for="semester">Semester:</label>
                <input type="text" name="semester" id="semester" required>
            </div>
            <div class="form-group">
                <label for="mail">Email:</label>
                <input type="email" name="email" id="email" required>
            </div>
            <div class="form-group">
                <label for="uname">Username:</label>
                <input type="text" name="uname" id="uname" required>
            </div>
            <div class="form-group">
                <label for="pass">Password:</label>
                <input type="password" name="pass" id="pass" required>
            </div>
            <div>
            <label for="image">Image:</label>
                <input type="file" name="image" id="image" required>
            </div>
            
            <div class="form-group">
                <input type="submit" name="register" value="Register">
            </div>
        </form>
    </div>
    <?php
if(isset($_POST['register'])){
    include '../db/dbconnect.php';
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $semester=$_POST['semester'];
    $email=$_POST['email'];
    $uname=$_POST['uname'];
    $pass=$_POST['pass'];
    $Picture = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $folder = "../admin/pics/" . $Picture;
        move_uploaded_file($temp, $folder);
    try{
     
        $sql="INSERT INTO student(student_name, phone, Email, Password, s_user_id, semester,s_picture) 
        values('$name','$phone','$email','$pass','$uname','$semester','$folder')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<script>
            alert("student added successfully!");
            window.location.href = "event.php";</script>';
        
        }
    } catch (mysqli_sql_exception $e) {
        echo 'error:  ' . $e->getMessage();
    }
}
?>

</body>
</html>

<?php include "../footer/footer.php" ?>

