<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Request Form</title>
    <style>
        /* Add your CSS styles here */
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
            margin-left: 250px;
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
            <input type="submit" name="submit" class="submit" value="Submit">
        </form>
    </div>

    <?php
    // PHP section to handle form submission
    include '../db/dbconnect.php'; // Include your database connection file
    session_start();
    if (!isset($_SESSION['username'])) {
        header("Location: ../auth/login.php");
        exit;
    }
    if (isset($_POST['submit'])) {
        $currentUser = $_SESSION['username'];
        $request_type = $_POST['request_type'];

        // Convert request type to the corresponding database field value
        if ($request_type == "volunteer") {
            $request_type = 'pending_volunteer';
        } else {
            $request_type = 'pending_participant';
        }

        // Check for the event ID from GET request
        $e_id = isset($_GET['e_id']) ? $_GET['e_id'] : null;

        // Check if the student has already made a request for the event
        $checkQuery = "SELECT * FROM student WHERE s_user_id='$currentUser' AND e_id='$e_id'";
        $checkResult = mysqli_query($conn, $checkQuery);

        if (mysqli_num_rows($checkResult) > 0) {
            // If a request already exists, display a message
            echo "<p>You have already made a request for this event.</p>";
            if($checkResult){
              echo '<script>
              alert("You have already made a request for this event.");
              window.location.href = "events.php";</script>';  
            }
        } else {
            // If no existing request is found, proceed with updating the student's request
            $updateQuery = "UPDATE student SET student_status='$request_type', e_id='$e_id' WHERE s_user_id='$currentUser'";
            $updateResult = mysqli_query($conn, $updateQuery);

            if ($updateResult) {
                // Redirect to student dashboard if the update is successful
                header("Location: events.php");
                exit();
            }
        }
    }
    ?>
</body>

</html>
