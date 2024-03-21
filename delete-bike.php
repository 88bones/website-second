<?php
include 'connection.php';


if (isset($_GET['bikeid'])) {
    $bikeid = $_GET['bikeid'];

    $sql = "DELETE FROM bikes WHERE bikeid = $bikeid";

    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Failed!!" . mysqli_error($conn));
    } else {
        header('Location: add.php');
                        }
}
?>