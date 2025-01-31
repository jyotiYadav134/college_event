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


    .addevent {
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

    .add-event-btn:hover {
        background-color: #0056b3;
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
        border-radius: 4px;
    }</style>

<body>

    <div class="container"> 
    <h1>Events</h1>
      <div class="gallery">
        <table border="">
          <tr>
          <button class="addevent"><a href="addevent.php">Add event</a></button>
   

    <th>Id</th>
    <th>Event Name</th>
    <th>Date</th>
    <th>Time</th>
    <th>Venue</th>
    <th>Location</th>
    <th>Description</th>
    <th>Image</th>
    <th>Action</th>
          </tr>
          <?php
          include '../db/dbconnect.php';

          $sql = "SELECT * FROM event ORDER BY event_date DESC";
          $result = mysqli_query($conn, $sql);
          $num = mysqli_num_rows($result);
          if ($num > 0) {
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
             ?>
              <tr>
                <td><?php echo $i; ?></td>
                <td> <?php echo $row['event_name']; ?> </td>
                <td> <?php echo $row['event_date']; ?> </td>
                <td> <?php echo $row['e_time']; ?> </td>
                <td> <?php echo $row['venue']; ?> </td>
                <td> <?php echo $row['e_location']; ?> </td>
                <td> <?php echo $row['description']; ?> </td>
                <td><img  src="<?php echo $row['e_picture']; ?>">
                
                <td><a href="edit_event.php?event_id=<?php echo $row['event_id'] ?>">Edit</a> |
                <a href="delete_event.php?event_id=<?php echo $row['event_id'] ?>">Delete</a></td>
              </tr>
 

          <?php $i++; }
          }
          ?>
        </table>

      </div>
        </div>

</body>
    <?php
include '../footer/adminfooter.php';
?>
