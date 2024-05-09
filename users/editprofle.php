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
<?php
    if(isset($_GET['student_id']))
    {include '../db/dbconnect.php';
        include '../admin/session.php';
            
        $student_id=$_GET['student_id'];
       
        $select_student="select * from student where student_id='$student_id'";
        $result_select=mysqli_query($conn,$select_student);
        if(mysqli_num_rows($result_select))
        {
            while($row=mysqli_fetch_assoc($result_select))
            {
                $std_id=$row['student_id'];
               
                $std_name=$row['student_name'];
               
                $std_phone=$row['phone'];
               
              
                $std_user_id=$row['s_user_id'];
             
                $std_semester=$row['semester'];
             
                $std_status=$row['student_status'];
            
                $std_picture= basename($row['s_picture']);
              
                
          
                
            }
        }
    }
        
    ?>
    
    <form action="" method="POST" enctype="multipart/form-data">
    <h1>EDIT PROFILE</h1>
        <label for="name">Name:
            <input type="text" name="name" id="name"  value="<?php echo $std_name?>" >
        </label>
        <label for="phone">Phone:
            <input type="tel" name="phone" id="phone" value="<?php  echo $std_phone?>">
        </label>
        <label for="semester">Semester:
            <input type="text" name="semester" id="semester" value="<?php echo $std_semester?>">
        </label>
        <label for="username">Username:
            <input type="text" name="username" id="username" value="<?php echo $std_user_id?>">
        </label>
      
        </label>
        <label for="image">Image:
            <input type="file" name="image" id="image" accept="image/"*>
            Existing Image: <?php echo $std_picture ?>
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
       
        $Picture = $_FILES['image']['name'];
        $temp = $_FILES['image']['tmp_name'];
        $folder = "../admin/pics/" . $Picture;
        move_uploaded_file($temp, $folder);
        $sid=$_GET['student_id'];
        $sql="UPDATE student set student_name='$name',phone='$phone',s_user_id='$username',semester='$semester',s_picture='$folder' where student_id='$sid'";
        
        $result=mysqli_query($conn,$sql);
        if($result){
            echo '<script>
            alert("profile edited successfully!");
            window.location.href = "student_dashboard.php";</script>';
        }

    }
 
    ?>
    <?php
include '../footer/footer.php';

    ?>
</body>
</html>
