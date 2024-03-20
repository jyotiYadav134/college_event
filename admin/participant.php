<?php

include '../db/dbconnect.php';
include 'admin_header.php';

// Fetch participation requests from the database

$sql = "SELECT * FROM participations_requests";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<p>Event Title: " . $row["event_title"] . "</p>";
        echo "<p>Student Name: " . $row["student_name"] . "</p>";
        echo "<p>Status: " . $row["status"] . "</p>";
        // Add accept and decline buttons with form submission
        echo "<form action='process_request.php' method='post'>";
        echo "<input type='hidden' name='request_id' value='" . $row["id"] . "'>";
        echo "<input type='submit' name='accept' value='Accept'>";
        echo "<input type='submit' name='decline' value='Decline'>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "No participation requests.";
}

// Close database connection
mysqli_close($connection);
?>
