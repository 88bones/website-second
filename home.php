<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>Information System</title>

</head>

<body>
    <?php
        include 'menu.php';
    ?>

    <div class="container">
        <div class="search">
            <form id="searchbar" name="searchbar" action="">
                <p id="filter-tag">Search the right bike</p>
                <div class="select-box">
                    <input type="text" id="search" placeholder="eg: R15M, MT-15" />
                    <button type="submit" id="search-filter">Search</button>
                </div>
        </div>
        </form>
    </div>


    <!--<div class="compare-container">
        <div class="compare-box">
            <div class="compare-first">
                <select name="bikes" id="bikes" placeholder="sss">
                    <option value="" selected>Select Brand</option>
                    <option value="yamaha">Yamaha</option>
                    <option value="honda">Honda</option>
                    <option value="bajaj">Bajaj</option>
                    <option value="ktm">KTM</option>
                    <option value="royal-enfield">Royal Enfield</option>
                </select>
            </div>

            <div class="compare-second">
                <select name="bikes" id="bikes" placeholder="sss">
                    <option value="" selected>Select Brand</option>
                    <option value="yamaha">Yamaha</option>
                    <option value="honda">Honda</option>
                    <option value="bajaj">Bajaj</option>
                    <option value="ktm">KTM</option>
                    <option value="royal-enfield">Royal Enfield</option>
                </select>
            </div>
        </div>
    </div>-->

    <div class="functiontag">
        <h2>Explore or Compare</h2>
    </div>
    <div class="function-container">
        <div class="funtion-item">
            <ul type="none">
                <li><a href=""><img src="/website-second/images/function-img/motorbike.png" width="50px" height="50px"></a></li>
                <li><a href=""><img src="/website-second/images/function-img/motorcycle.png" width="50px" height="50px"></a></li>
                <li><a href=""><img src="/website-second/images/function-img/tax.png" width="50px" height="50px"></a></li>
                <li><a href=""><img src="/website-second/images/function-img/compare.png" width="50px" height="50px"></a></li>
            </ul>
        </div>
    </div>


</body>

</html>