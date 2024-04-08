<?php include "../head/top.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>College Event Management System</title>
    <style>
       body {
    margin: 0;
    font-family: Arial, sans-serif;
}

nav ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
    font-size: 18px;
}

.landing {
    padding: 50px 0;
    background-color: #f9f9f9;
    text-align: center;
}

.landing h2 {
    margin-bottom: 30px;
    font-size: 28px;
    color: #333;
}

.events {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.event {
    width: 300px;
    border: 1px solid #ccc;
    margin: 10px;
    padding: 20px;
    background-color: #fff;
    transition: transform 0.3s ease;
}

.event:hover {
    transform: translateY(-5px);
}

.event h3 {
    margin-top: 0;
    font-size: 24px;
    color: #333;
}

.event p {
    margin-bottom: 10px;
    font-size: 16px;
    color: #666;
}

.btn {
    display: inline-block;
    padding: 10px 20px;
    background-color: skyblue; /* Changed to sky blue */
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #555;
}

footer {
    background-color: skyblue; /* Changed from black to sky blue */
    color: #fff;
    padding: 20px 0;
    text-align: center;
}
 </style>
</head>
<body>
 

    <section class="landing">
        <div class="container">
            <h2>Upcoming Events</h2>
            <div class="events">
                <!-- Event listings will be dynamically inserted here -->
                <!-- Sample event listing -->
                <div class="event">
                    <h3>Event Title</h3>
                    <p>Date: January 1, 2025</p>
                    <p>Time: 10:00 AM - 2:00 PM</p>
                    <p>Venue: College Auditorium</p>
                    <a href="#" class="btn">Learn More</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
<?php include "../footer/footer.php" ?>
