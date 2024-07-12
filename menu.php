<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="menu.css?v=<?php echo time(); ?>">
</head>

<body>
    <div class="top-bar">
        <div class="menu-bar">
            <a class="logo" href="home.php">2-Wheelers IS</a>
            <div class="menu-items">
                <a href="home.php">Home</a>
                <a href="compare.php">Compare</a>
                <a href="bike-list.php">Bikes</a>
                <a href="calculation.php">Calculate</a>
                <a href="bike-review.php">Reviews</a>
                <!--<a href="admin-page.php">Admin</a>-->
                <?php
                include 'connection.php';
                if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin') {
                    echo '<a href="admin-page.php">Admin</a>';
                }
                ?>
            </div>
            <form action="">
                <?php
                if (isset($_SESSION['username'])) {
                    $username = $_SESSION['username'];
                    echo "<span class='username'> $username |</span>";
                } ?>
                <button class="login"><a href="logout.php">Logout</a></button>
            </form>
        </div>
    </div>

</body>

</html>