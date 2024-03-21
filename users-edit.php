<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Edit</title>
    <link rel="stylesheet" href="user-edit.css">
</head>
<body>
<?php

include 'connection.php';
include 'menu.php';

// Get the user ID from the URL query string
$userid = isset($_GET['userid']) ? (int) $_GET['userid'] : '';

echo "User ID: $userid";
// Validate user ID (optional)
if ($userid <= 0) {
  echo "Invalid user ID.";
  exit;
}

$sql = "SELECT * FROM users WHERE userid = '$userid'";
$result = $conn->query($sql);

if ($result->num_rows === 1) {
  $user = $result->fetch_assoc();

  // Pre-fill the form with existing data
  $user_name = $user['name'];
  $user_uname = $user['username'];
  $user_email = $user['email'];
  $user_pass = $user['password'];
  $user_role = $user['role'];

  echo "<h2>Edit Users</h2>
  <form action='users-edit.php' method='post'  enctype='multipart/form-data'>
    <input type='hidden' name='userid' value='$userid'>
    <label for='user_name'>Name:</label>
    <input type='text' name='user_name' id='user_name' value='$user_name' required>
    <br>
    <label for='user_uname'>Username:</label>
    <input type='text' name='user_uname' id='user_uname' value='$user_uname' required>
    <br>
    <label for='user_email'>Email:</label>
    <input type='email' name='user_email' id='user_email' value='$user_email' required>
    <br>
    <label for='user_pass'>Password:</label>
    <input type='text' name='user_pass' id='user_pass' value='$user_pass' required>
    <br>
    <label for='user_role'>Role:</label>
      <select name='user_role'>
        <option value='$user_role'>Admin</option>
        <option value='$user_role'>User</option>
      </select>
    <br>

    <button type='submit'>Save Changes</button>
  </form>";
} else {
  // echo "User with Id ".$user_id." not found.";
  die("User with Id ".$user_id." not found.");
}

?>

    
</body>
</html>