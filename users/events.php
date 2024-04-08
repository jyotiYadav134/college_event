<?php include "student_header.php";
include '../db/dbconnect.php';
?>
<style>
    .event-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-around;
        margin-top: 20px;
    }

    .event {
        width: 300px;
        margin-bottom: 20px;
        border-radius: 8px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
        overflow: hidden;
    }

    .event:hover {
        transform: translateY(-5px);
    }

    .event img {
        width: 100%;
        height: 200px;
        object-fit: cover;
        border-top-left-radius: 8px;
        border-top-right-radius: 8px;
    }

    .event-content {
        padding: 20px;
    }

    .event h2 {
        margin-top: 0;
        margin-bottom: 10px;
        color: #333;
        font-size: 1.5rem;
    }

    .event p {
        margin-bottom: 10px;
        color: #666;
    }

    .event button {
        background-color: #007bff;
        color: #fff;
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        transition: background-color 0.3s ease;
        display: block;
        width: 100%;
        text-align: center;
    }

    .event button:hover {
        background-color: #0056b3;
    }
</style>

<div class="container">
    <h2 style="color: #007bff;">Events</h2>
    <div class="event-container">
        <?php
        $sql = "SELECT * FROM event ";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="event">
                <img src="../admin/<?php echo $row['e_picture']; ?>" alt="Event Image">
                <div class="event-content">
                    <h2><?php echo $row['event_name']; ?></h2>
                    <p><strong>Date:</strong> <?php echo $row['event_date']; ?></p>
                    <p><strong>Time:</strong> <?php echo $row['e_time']; ?></p>
                    <p><strong>Venue:</strong> <?php echo $row['venue']; ?></p>
                    <p><strong>Description:</strong> <?php echo $row['description']; ?></p>
                    <div class="req">
                        <button><a href="student_request.php?e_id=<?php echo $row['event_id'] ?>" style="text-decoration: none; color: #fff;">Register</a></button>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
