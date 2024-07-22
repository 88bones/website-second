<?php include 'connection.php'; ?>

<?php
if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];

    // Start a transaction
    mysqli_begin_transaction($conn);

    try {
        // Delete reviews associated with the user
        $sql_delete_reviews = "DELETE FROM `reviews` WHERE `userid` = '$userid'";
        $result_delete_reviews = mysqli_query($conn, $sql_delete_reviews);
        if (!$result_delete_reviews) {
            throw new Exception("Failed to delete reviews: " . mysqli_error($conn));
        }

        // Delete the user
        $sql_delete_user = "DELETE FROM `users` WHERE `userid` = '$userid'";
        $result_delete_user = mysqli_query($conn, $sql_delete_user);
        if (!$result_delete_user) {
            throw new Exception("Failed to delete user: " . mysqli_error($conn));
        }

        // Commit the transaction
        mysqli_commit($conn);

        // Redirect to the users-create.php page
        header('Location: users-create.php');
    } catch (Exception $e) {
        // Rollback the transaction in case of an error
        mysqli_rollback($conn);
        die("Query failed: " . $e->getMessage());
    }
}
?>
