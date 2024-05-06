<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
    
        }

        header {
            background-color: skyblue;
            color: #fff;
            padding: 20px 0;
            text-align: center;
            
        }

        .ccontainer {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            
        }

        .nav-links {
            list-style-type: none;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        .nav-links li {
            display: inline;
            margin-right: 20px;
        }

        .nav-links li:last-child {
            margin-right: 0;
        }

        .nav-links li a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .nav-links li a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <div class="ccontainer">
            <h1>Student Dashboard</h1>
            <nav>
                <ul class="nav-links">
                    <li><a href="student_dashboard.php">Profile</a></li>
                    <li><a href="events.php">Event List</a></li>
                    <li><a href="participants.php">Participated List</a></li>
                    <li><a href="../auth/logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>
