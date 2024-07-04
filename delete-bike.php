<?php
include 'connection.php';

if (isset($_GET['bikeid'])) {
    $bikeid = intval($_GET['bikeid']); // Sanitize input

    // Start the transaction
    mysqli_begin_transaction($conn);

    try {
        // Delete reviews associated with the bike
        $deleteReviewsSql = "DELETE FROM reviews WHERE bikeid = $bikeid";
        $resultReviews = mysqli_query($conn, $deleteReviewsSql);
        if (!$resultReviews) {
            throw new Exception("Failed to delete reviews: " . mysqli_error($conn));
        }

        // Delete the bike
        $deleteBikeSql = "DELETE FROM bikes WHERE bikeid = $bikeid";
        $resultBike = mysqli_query($conn, $deleteBikeSql);
        if (!$resultBike) {
            throw new Exception("Failed to delete bike: " . mysqli_error($conn));
        }

        // Commit the transaction
        mysqli_commit($conn);
        header('Location: add.php');
    } catch (Exception $e) {
        // Rollback the transaction if something goes wrong
        mysqli_rollback($conn);
        die("Failed!! " . $e->getMessage());
    }
} else {
    echo "Bike ID not provided.";
}
