<?php
include 'connection.php';

if (isset($_GET['reviewid'])) {
    $reviewid = $_GET['reviewid'];

    $sql = "DELETE FROM reviews WHERE reviewid = $reviewid";

    if ($conn->query($sql) === TRUE) {
        echo "Review deleted successfully!";
    } else {
        echo "Error deleting review: " . $conn->error;
    }

    $conn->close();
}

header("Location: bike-review-display.php");
exit();
