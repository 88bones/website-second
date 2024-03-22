<?php

function check_login($conn) {

    if(isset($_SESSION['userid'])) {

        $userid = $_SESSION['userid'];
        $sql = "SELECT * FROM users WHERE userid = '$userid' limit 1 ";

        $result = mysqli_query($conn, $sql);

        if($result &&  mysqli_num_rows($result) > 0) {

            $user_data = mysqli_fetch_assoc($result);
            return $user_data;
        }
    }

    //redirect to login page
    header("location: signin-new.php");
    // exit;
    die;

}
