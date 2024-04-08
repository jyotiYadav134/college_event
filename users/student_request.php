<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Request Form</title>
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
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
  text-align: center;
}

.form-group {
  margin-bottom: 20px;
}

label {
  font-weight: bold;
}

.radio-group {
  display: flex;
}

.radio-group input[type="radio"] {
  display: none;
}

.radio-group input[type="radio"] + label {
  padding: 10px 20px;
  margin-right: 10px;
  background-color: #f0f0f0;
  border: 1px solid #ccc;
  border-radius: 5px;
  cursor: pointer;
}

.radio-group input[type="radio"]:checked + label {
  background-color: #007bff;
  color: #fff;
}
.submit {
  padding: 10px 20px;
  background-color: #007bff;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  font-size: 16px;
  margin-left:250px;
}
.submit:hover {
  background-color: #0056b3;
}
</style>
</head>
<body>
  <div class="container">
    <h2>Student Request Form</h2>
    <form action="" method="post">
      <div class="form-group">
        <label>Type of Request:</label><br>
        <div class="radio-group">
          <input type="radio" id="volunteer" name="request_type" value="volunteer" required>
          <label for="volunteer">Volunteer</label>
          <input type="radio" id="participant" name="request_type" value="participant" required>
          <label for="participant">Participant</label>
        </div>
      </div>
        
      <input type="submit" name="submit" class="submit">
    </form>
  </div>
  <?php
  include '../db/dbconnect.php';
  session_start();
  if(isset($_POST['submit'])){
    $currentUser=$_SESSION['username'];
    $request_type =$_POST['request_type'];
    if($request_type=="volunteer"){
      $request_type='pending_volunteer';
    }else{
      $request_type='pending_participant';
    }
    
    $sql = "UPDATE student set student_status='$request_type' where s_user_id='$currentUser'";
    $result=mysqli_query($conn,$sql);
    if($_GET['e_id']){
      $e_id=$_GET['e_id'];
    }
    $ssql="UPDATE student set e_id='$e_id' where s_user_id='$currentUser' ";
    $rresult=mysqli_query($conn,$ssql);
    if($result)
        header("Location: student_dashboard.php");
}

  ?>
</body>
</html>
