<?php include "../head/top.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    background-color: #f5f5f5;
}

.container {
    max-width: 400px;
    margin: 0 auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 15px;
}

label {
    display: block;
    font-weight: bold;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    width: 100%;
    padding: 10px;
    background-color: #007bff;
    border: none;
    border-radius: 5px;
    color: #fff;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

    </style>
</head>
<body>
    <div class="container">
        <h2>Student Registration</h2>
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
            echo "Registered";
        }
    } catch (mysqli_sql_exception $e) {
        echo 'error:  ' . $e->getMessage();
    }
}
?>

</body>
</html>

<?php include "../footer/footer.php" ?>

