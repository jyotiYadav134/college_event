<?php
include '../db/dbconnect.php';

if(isset($_GET['event_id'])) {
    $e_id = $_GET['event_id'];
    
    if(isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
        
        $sql = "DELETE FROM event WHERE event_id='$e_id'";
        $result = mysqli_query($conn, $sql);

        if($result) {
            echo "<script>alert('Your event has been deleted'); window.location.href = 'event.php';</script>";
            exit();
        } else {
            echo "<script>alert('Failed to delete event'); window.location.href = 'event.php';</script>";
            exit();
        }
    } else {
        
        echo "<script>
                var result = confirm('Are you sure you want to delete this event?');
                if (result) {
                    window.location.href = 'delete_event.php?event_id=$e_id&confirm=true';
                } else {
                    window.location.href = 'event.php';
                }
              </script>";
        exit();
    }
} else {
    echo "<script>alert('Event ID is missing.'); window.location.href = 'event.php';</script>";
    exit();
}
?>
