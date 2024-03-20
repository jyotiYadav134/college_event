<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Information Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }
        h1{
            text-align:center;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"],
        input[type="number"],
        input[type="password"],
        input[type="email"],
        input[type="file"],
        input[type='tel'],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    
    <form action="" method="POST" enctype="multipart/form-data">
    <h1>EDIT</h1>
        <label for="name">Name:
            <input type="text" name="name" id="name" >
        </label>
        <label for="phone">Phone:
            <input type="tel" name="phone" id="phone">
        </label>
        <label for="semester">Semester:
            <input type="text" name="semester" id="semester">
        </label>
        <label for="username">Username:
            <input type="text" name="username" id="username">
        </label>
        <label for="pass">Password:
            <input type="password" name="pass" id="pass">
        </label>
        <label for="mail">Mail:
            <input type="email" name="mail" id="mail">
        </label>
        <label for="image">Image:
            <input type="file" name="image" id="image" accept="image/*">
        </label>
        <input type="submit" name="edit" value="Edit">
    </form>
    <?php
    include '../db/dbconnect.php';
    if(isset($_POST['edit'])){
        $name=$_POST['name'];
        $phone=$_POST['phone'];
        $semester=$_POST['semester'];
        $username=$_POST['username'];
        $password=$_POST['pass'];
        $mail=$_POST['mail'];
        $Picture = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $folder = "pics/" . $Picture;
        move_uploaded_file($temp, $folder);
        $sid=$_GET['student_id'];
        $sql="UPDATE student set student_name='$name',phone='$phone',Email='$mail',Password='$password',s_user_id='$username',semester='$semester',s_picture='$folder'
        WHERE student_id='$sid'";
        $result=mysqli_query($conn,$sql);
        if($result){
            echo "edited successfully";
        }

    }
    
    ?>
</body>
</html>
