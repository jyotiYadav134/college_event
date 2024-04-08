<?php
include 'admin_header.php';
include 'session.php';
?>
<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }

    .container {
        max-width: 1200px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h1 {
        text-align: center;
        color: #007bff;
        margin-bottom: 30px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #007bff;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #e9ecef;
    }

    .action-links {
        display: flex;
        justify-content: space-between;
    }

    .action-links a {
        color: #007bff;
        text-decoration: none;
        transition: color 0.3s ease;
    }

    .action-links a:hover {
        color: #0056b3;
    }

    .fa-edit, .fa-trash-alt {
        margin-right: 5px;
    }

    img {
        width: 100px;
        height: 100px;
        object-fit: cover;
        border-radius: 50%;
    }
    .addstudent {
  background-color: #007bff; /* Blue */
  border: none;
  color: white;
  padding: 10px 20px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px;
  cursor: pointer;
  border-radius: 5px;
  transition: background-color 0.3s ease;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}
</style>

    <body>
    <div class="container"> 
    <h1>Students</h1>
      <div class="gallery">
        <table border="">
          <tr>
          <button class="addstudent"><a href="addstudent.php">Add Student</a></button>
          
    <th>Id</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Semester</th>
    <th>Password</th>
    <th>Username</th>
    <th>Task</th>
    <th>Image</th>
    
    <th>Action</th>
    
          </tr>
          <?php
          include '../db/dbconnect.php';

          $sql = "SELECT * FROM student";
          $result = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result);
          if ($num > 0) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
             ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td> <?php echo $row['student_name']; ?> </td>
                <td> <?php echo $row['phone']; ?> </td>
                <td> <?php echo $row['semester']; ?> </td>
                <td> <?php echo $row['Password']; ?> </td>
                <td> <?php echo $row['s_user_id']; ?> </td>
                <td> <?php echo $row['student_status']; ?> </td>


                <td><img  src="<?php echo $row['s_picture']; ?>"></td>
                
                <td><a href="edit_student.php?student_id=<?php echo $row['student_id'] ?>">Edit</a> |
                <a href="delete_student.php?student_id=<?php echo $row['student_id'] ?>">Delete</a></td>
              </tr>

              <?php $i++; }
          }
          ?>
        </table>

      </div>
       </div>

</body>
    <?php
include '../footer/footer.php';
?>
