<?php
include 'admin_header.php';
include 'session.php';
?>
<style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}


img{
      width:200px;
      height:100px;
      object-fit:cover;
}

main {
    padding: 20px;
}</style>

    <body>
    <div class="container"> 
    <h1>Students</h1>
      <div class="gallery">
        <table border="">
          <tr>
          
    <th>Id</th>
    <th>Name</th>
    <th>Phone</th>
    <th>Semester</th>
    <th>Password</th>
    <th>Username</th>
    <th>Mail</th>
    <th>Image</th>
    <th>Action</th>
    
          </tr>
          <?php
          include '../db/dbconnect.php';

          $sql = "SELECT * FROM student";
          $result = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result);
          if ($num > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
             ?>
              <tr>
                <td><?php echo $row['student_id']; ?></td>
                <td> <?php echo $row['student_name']; ?> </td>
                <td> <?php echo $row['phone']; ?> </td>
                <td> <?php echo $row['semester']; ?> </td>
                <td> <?php echo $row['Password']; ?> </td>
                <td> <?php echo $row['s_user_id']; ?> </td> 
                <td> <?php echo $row['Email']; ?> </td>
                <td><img  src="<?php echo $row['s_picture']; ?>"></td>
                
                <td><a href="edit_student.php?student_id=<?php echo $row['student_id'] ?>">Edit</a> |
                <a href="delete_student.php?student_id=<?php echo $row['student_id'] ?>">Delete</a></td>
              </tr>

          <?php }
          }
          ?>
        </table>

      </div>
       </div>

</body>
    <?php
include '../footer/footer.php';
?>
