<?php
include 'admin_header.php';
include 'session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }

        .main-content {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            overflow-x: auto;
        }
        
        h1 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e2e2e2;
        }

        button {
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 14px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }

        button.reject {
            background-color: #dc3545;
        }

        button:hover {
            background-color: #218838;
        }

        a {
            text-decoration: none;
            color: #fff;
        }

        .approved {
            color: green;
        }

        .rejected {
            color: red;
        }
    </style>
</head>
<body>
    <div class="main-content">
        <h1>Requests</h1>

        <table>
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Requested For</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../db/dbconnect.php';
                $sql = "SELECT * FROM student";
                $result = mysqli_query($conn, $sql);
                
                while ($row = mysqli_fetch_assoc($result)) {
                    $eid=$row['e_id'];
                    $ssql = "SELECT * from event where event_id='$eid'";
                    $rresult = mysqli_query($conn, $ssql);
                    $rrow = mysqli_fetch_assoc($rresult);
                    if($num=mysqli_num_rows($rresult)>0){
                    echo "<tr>";    
                    echo "<td>" . $row['student_name'] . "</td>";
                    echo "<td>";
                    if ($row['student_status'] == 'pending_volunteer') {
                        echo "Volunteer for " . $rrow['event_name'];
                    } elseif ($row['student_status'] == 'pending_participant') {
                        echo "Participant for " . $rrow['event_name'];
                    }
                    echo "</td>";
                    echo "<td>";
                    if ($row['student_status'] == "volunteer" || $row['student_status'] == "participant") {
                        echo "<span class='approved'>Approved</span>";
                    } elseif ($row['student_status'] == 'rejected') {
                        echo "<span class='rejected'>Rejected</span>";
                    } else {
                        echo "Pending";
                    }
                    echo "</td>";
                    echo "<td>";
                    if ($row['student_status'] != "volunteer" && $row['student_status'] != "participant" && $row['student_status'] != "rejected") {
                        echo "<a href='approval.php?std_id=" . $row['student_id'] . "'><button style='background-color: #007bff;'>Approve</button></a>";
                        echo "<a href='reject.php?std_id=" . $row['student_id'] . "'><button class='reject'>Reject</button></a>";
                    }
                    echo "</td>";
                    echo "</tr>";
                }
            }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>