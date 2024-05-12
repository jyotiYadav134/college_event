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

.ccontainer {
    max-width: 400px;
    margin: 0 auto;
    padding: 50px;
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
    <div class="ccontainer">
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
    <select name="semester" id="semester" required>
        <option value="" disabled selected>Select a semester</option>
        <option value="1">1st</option>
        <option value="2">2nd</option>
        <option value="3">3rd</option>
        <option value="4">4th</option>
        <option value="5">5th</option>
        <option value="6">6th</option>
        <option value="7">7th</option>
        <option value="8">8th</option>
    </select>
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
    $hashPasskey = password_hash($_POST['pass'], PASSWORD_BCRYPT);

    $Picture = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $folder = "../admin/pics/" . $Picture;
        move_uploaded_file($temp, $folder);
    try{
     
        $sql="INSERT INTO student(student_name, phone, Email, Password, s_user_id, semester,s_picture,student_status) 
        values('$name','$phone','$email','$hashPasskey','$uname','$semester','$folder','not enrolled')";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "Registered";
        }
    } catch (mysqli_sql_exception $e) {
        echo 'error:  ' . $e->getMessage();
    }
    if($result){
        echo '<script>
        alert("registred successfully!");
        window.location.href = "login.php";</script>';
    
    }
}
?>

</body>
</html>

<?php include "../footer/footer.php" ?>
