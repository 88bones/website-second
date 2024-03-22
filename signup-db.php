<?php
$server="localhost";
$user="root";
$pass="";
$db="bikes";

$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$conn = mysqli_connect($server,$user,$pass,$db);

if($conn->connect_error) {
    die("Error: ".$conn->connect_error);
}

$sql = "INSERT INTO `users`(`name`, `username`, `email`, `password`) VALUES('$name', '$username','$email', '$password')";

$result = mysqli_query($conn,$sql);

if(isset($result)) {
    header('Location: home.php');
} else {
    header('Location: signup.php?error=invalid');   
}



$conn->close();

?>