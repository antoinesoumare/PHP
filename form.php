<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP FORM - Apply for a JOB</title>
</head>
<body>

<form method="post" action="process_form.php">
  <label for="first_name">First Name:</label>
  <input type="text" name="first_name" id="first_name" required>

  <label for="last_name">Last Name:</label>
  <input type="text" name="last_name" id="last_name" required>

  <label for="email">Email:</label>
  <input type="email" name="email" id="email" required>

  <label for="phone">Phone Number:</label>
  <input type="tel" name="phone" id="phone" required>

  <label for="position">Position Applied For:</label>
  <input type="text" name="position" id="position" required>

  <label for="details">Details:</label>
  <textarea name="details" id="details" required></textarea>

  <input type="submit" value="Submit">
</form>

    
</body>
<?php
// Connect to database
$host = 'localhost';
$user = 'your_username';
$password = 'your_password';
$database = 'your_database';

$conn = mysqli_connect($host, $user, $password, $database);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve form data
$first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
$last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$position = mysqli_real_escape_string($conn, $_POST['position']);
$details = mysqli_real_escape_string($conn, $_POST['details']);

// Insert data into database
$sql = "INSERT INTO your_table (first_name, last_name, email, phone, position, details) 
        VALUES ('$first_name', '$last_name', '$email', '$phone', '$position', '$details')";

if (mysqli_query($conn, $sql)) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close database connection
mysqli_close($conn);
?>

</html>