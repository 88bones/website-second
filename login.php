<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $server="localhost";
    $user="root";
    $pass="";
    $db="bikes";

    $conn = new mysqli($server,$user,$pass,$db);
    if($conn->connect_error) {
        die("Error: ".$conn->connect_error);
    }

    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // $role = $_POST['role'];

    $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";

    $result = $conn -> query($sql);

    if($result->num_rows > 0) {
        $_SESSION['username']=$username;
        header('Location: home.php');
    } else {
        header('Location: signin-new.php?error=invalid');   
    }
}
// $conn->close();

?>