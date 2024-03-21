<?php include 'connection.php'; ?>

<?php

    if(isset($_GET['userid'])) {
        $userid=$_GET['userid'];

        $sql = "DELETE FROM `users` WHERE `userid` = '$userid'";

        $result = mysqli_query($conn, $sql);

        if(!$result) {
            die("Query failed".mysqli_error($conn));
        } else {
            header('Location: users-create.php');
        }
        
    }
?>