<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Dashboard</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="container">
    <h1>Welcome to the Student Dashboard</h1>
    <form action="process.php" method="POST">
      <label for="name">Name:</label>
      <input type="text" id="name" name="name" required>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="choice">Choose an option:</label>
      <select id="choice" name="choice" required>
        <option value="volunteer">Volunteer</option>
        <option value="participant">Participant</option>
      </select>
      <button type="submit">Submit</button>
    </form>
  </div>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $choice = $_POST['choice'];

  // You can add your own logic here, like saving to a database or sending an email notification.
  
  echo "Thank you, $name! You have chosen to be a $choice.";
}
?>
