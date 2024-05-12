<?php
include '../db/dbconnect.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user'])) {
    header('Location: ../auth/login.php');
    exit();
}

// Check if event_id is provided
if (!isset($_GET['event_id'])) {
    echo "<script>alert('Event ID is missing.'); window.location.href = 'event.php';</script>";
    exit();
}

$event_id = $_GET['event_id'];

// Check if the user has confirmed the deletion
if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    // Use a prepared statement to avoid SQL injection
    $stmt = $conn->prepare("DELETE FROM event WHERE event_id = ?");
    $stmt->bind_param("i", $event_id);
    $result = $stmt->execute();
    
    // Check the result of the query
    if ($result) {
        echo "<script>alert('Your event has been deleted.'); window.location.href = 'event.php';</script>";
    } else {
        echo "<script>alert('Failed to delete event. Please try again later.'); window.location.href = 'event.php';</script>";
    }
    
    // Close the prepared statement
    $stmt->close();
} else {
    // Prompt the user to confirm deletion
    echo "<script>
        var result = confirm('Are you sure you want to delete this event?');
        if (result) {
            window.location.href = 'delete_event.php?event_id=$event_id&confirm=true';
        } else {
            window.location.href = 'event.php';
        }
    </script>";
    exit();
}
?>
