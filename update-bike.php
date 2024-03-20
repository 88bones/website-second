<?php
include 'connection.php';
include 'menu.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bikeid = $_POST['bikeid'];
    $bike_name = $_POST['bname'];
    $brand = $_POST['brand'];
    $type = $_POST['btype'];
    $displacement = $_POST['enginecc'];
    $price = $_POST['price'];

    $sql = "UPDATE bikes SET bname='$bike_name', brand='$brand', btype='$type', enginecc='$displacement', price='$price' WHERE bikeid=$bikeid";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
        header("Location: update-bike.php?bikeid=$bikeid");
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request method";
}
?>
