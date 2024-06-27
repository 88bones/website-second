<?php
//start the session
session_start();

include 'connection.php';
include 'functions.php';

$user_data = check_login($conn);


//both works to redirect the user to the login page if the user is not logged in
// if(!isset($_SESSION["user"])) {
//     header("Location: signin-new.php");
// }
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css?v=<?php echo time() ?>">
    <title>Information System</title>

</head>

<body>
    <?php
    include 'menu.php';
    ?>

    <div class="container">
        <div class="search">
            <form id="searchbar" action="search-results.php" method="GET">
                <p id="filter-tag">Search the right bike</p>
                <div class="select-box">

                    <input type="text" id="search-input" name="search-input" placeholder="eg: R15M, MT-15" />
                    <button type="submit" id="search-filter">Search</button>
            </form>
        </div>

        </form>
    </div>
    </div>

    <div class="functiontag">
        <h2>Explore or Compare</h2>
    </div>
    <div class="function-container">
        <div class="funtion-item">
            <ul type="none">
                <li><a href="bike-list.php"><img src="/website-second/images/function-img/motorbike.png" width="50px" height="50px"></a></li>
                <li><a href="bike-review.php"><img src="/website-second/images/function-img/review.png" width="50px" height="50px"></a></li>
                <li><a href="calculation.php"><img src="/website-second/images/function-img/tax.png" width="50px" height="50px"></a></li>
                <li><a href="compare.php"><img src="/website-second/images/function-img/compare.png" width="50px" height="50px"></a></li>
            </ul>
        </div>
    </div>


</body>

</html>