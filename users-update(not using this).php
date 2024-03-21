<?php include 'connection.php'; ?>

<?php

$userid = $_GET['userid'];
$name = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$role = $_POST['role'];

$sql = "UPDATE users SET name='$name', username='$username', email='$email', password='$password', role='$role' WHERE userid='$userid'";

if(mysqli_query($conn, $sql)) {
    header('Location: users-create.php');
} else {
    echo "Error: ". $sql. "<br>". mysqli_error($conn);
    header('Location: users-create.php');
}

$conn->close();

?>
