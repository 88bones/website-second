<?php
session_start();
include 'connection.php';
include 'functions.php';

$user_data = check_login($conn);

if ($_SESSION['role'] != 'admin') {
    echo "Access denied";
    die;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="admin-page.css?v=<?php echo time(); ?>"">
</head>

<body>
    <?php
    include 'menu.php';
    ?>

    <div class=" function-container">
    <div class="function-item">
        <ul type=none>
            <li><a href="users-create.php"><img src="/website-second/images/function-img/user.png" width="50px" height="50px"></a>
                <p>Users</p>
            </li>
            <li><a href="add.php"><img src="/website-second/images/function-img/motorbike.png" width="50px" height="50px" alt=""></a>
                <p>Bikes</p>
            </li>
            <li><a href="bike-review-display.php"><img src="/website-second/images/function-img/review.png" width="50px" height="50px"></a>
                <p>Reviews</p>
            </li>
        </ul>
    </div>
    </div>

    </body>

</html>