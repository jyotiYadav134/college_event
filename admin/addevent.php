<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* CSS styling */
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
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            margin-bottom: 20px;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
            color: #666;
        }

        input[type="text"],
        input[type="date"],
        input[type="time"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="file"] {
            margin-bottom: 30px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>

    <!-- Add JavaScript function to validate the date -->
    <script>
        function validateDate() {
            // Get the date input element
            const dateInput = document.getElementById('date');
            // Get the selected date
            const selectedDate = new Date(dateInput.value);
            // Get the current date
            const currentDate = new Date();
            // Set the current date's time components to zero for comparison
            currentDate.setHours(0, 0, 0, 0);

            // Check if the selected date is before the current date
            if (selectedDate < currentDate) {
                alert('Event date cannot be in the past. Please choose a future date.');
                // Prevent form submission
                return false;
            }

            // If the selected date is valid, allow form submission
            return true;
        }
    </script>
</head>

<body>
    <div class="container">
        <h2>Add Event</h2>
        <form id="eventForm" action="" method="POST" enctype="multipart/form-data" onsubmit="return validateDate();">
            <label for="name">Event Name:</label>
            <input type="text" id="name" name="event_name" required>

            <label for="date">Event Date:</label>
            <input type="date" id="date" name="event_date" required>

            <label for="time">Event Time:</label>
            <input type="time" id="time" name="e_time" required>

            <label for="venue">Event Venue:</label>
            <input type="text" id="venue" name="venue" required>

            <label for="location">Event Location:</label>
            <input type="text" id="location" name="e_location" required>

            <label for="description">Event Description:</label>
            <textarea id="description" name="description" required></textarea>

            <label for="image">Event Image:</label>
            <input type="file" id="image" name="image" required>

            <input type="submit" name="add" value="Add Event">
        </form>
    </div>
</body>

<?php
// Include PHP code for handling form submission here
include '../db/dbconnect.php';
if (isset($_POST['add'])) {
    // Retrieve form data
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $event_time = $_POST['e_time'];
    $venue = $_POST['venue'];
    $e_location = $_POST['e_location'];
    $description = $_POST['description'];
    $image_file = $_FILES['image']['name'];
    $temp_image = $_FILES['image']['tmp_name'];
    $image_path = "pics/" . $image_file;

    // Move uploaded image to the specified folder
    move_uploaded_file($temp_image, $image_path);

    // Insert event data into the database
    $sql = "INSERT INTO event (venue, e_time, e_picture, e_location, event_name, description, event_date)
            VALUES ('$venue', '$event_time', '$image_path', '$e_location', '$event_name', '$description', '$event_date')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo '<script>
            alert("Event added successfully!");
            window.location.href = "event.php";
        </script>';
    } else {
        echo '<script>
            alert("Failed to add event. Please try again.");
        </script>';
    }
}

// Include footer file
include '../footer/adminfooter.php';
?>
</html>
