<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike List</title>
    <link rel="stylesheet" href="bike-list.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php

    session_start();
    include 'menu.php';
    include 'connection.php';

    // Handle form submission for filtering
    $filterType = isset($_POST['filter-type']) ? $_POST['filter-type'] : '';
    $filterBrand = isset($_POST['bike-select1']) ? $_POST['bike-select1'] : '';
    $filterPriceMin = isset($_POST['price-min']) ? $_POST['price-min'] : '';
    $filterPriceMax = isset($_POST['price-max']) ? $_POST['price-max'] : '';

    $sql = "SELECT * FROM bikes WHERE 1=1";

    // Add filters to the query
    if ($filterType) {
        $sql .= " AND btype = '$filterType'";
    }
    if ($filterBrand) {
        $sql .= " AND brand = '$filterBrand'";
    }
    if ($filterPriceMin && $filterPriceMax) {
        $sql .= " AND price BETWEEN $filterPriceMin AND $filterPriceMax";
    }

    $result = $conn->query($sql);
    ?>
    <div class="whole">
        <div class="filter-container">
            <div class="filter-types">
                <h3>Filters</h3>
                <div class="filterss">
                    <form action="" method="post" enctype="multipart/form-data" id="filter">
                        <div class="filter-items">
                            <div class="types">
                                <select id="filter-type" name="filter-type">
                                    <option value="">Select a bike type</option>
                                    <?php
                                    $sql = "SELECT DISTINCT btype FROM bikes";
                                    $resultType = $conn->query($sql);
                                    if ($resultType->num_rows > 0) {
                                        while ($row = $resultType->fetch_assoc()) {
                                            echo "<option value='" . $row["btype"] . "'>" . $row["btype"] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No items found</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="brand">
                                <select id="bike-select1" name="bike-select1">
                                    <option value="">Select a brand</option>
                                    <?php
                                    $sql = "SELECT DISTINCT brand FROM bikes";
                                    $resultBrand = $conn->query($sql);
                                    if ($resultBrand->num_rows > 0) {
                                        while ($row = $resultBrand->fetch_assoc()) {
                                            echo "<option value='" . $row["brand"] . "'>" . $row["brand"] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No items found</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="price-range">
                                <div>
                                    <label for="price-min">Min Price:</label>
                                    <input type="number" id="price-min" name="price-min" placeholder="100000">
                                </div>
                                <div>
                                    <label for="price-max">Max Price:</label>
                                    <input type="number" id="price-max" name="price-max" placeholder="99999999">
                                </div>
                            </div>
                            <div>
                                <input type="submit" name="submit" value="Filter">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="bike-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="card-container">
                        <div class="card-holder">
                            <div class="card-image">
                                <img src="' . $row['image'] . '" alt="' . $row['bname'] . '">
                            </div>
                            <div class="card-info">
                                <h2>' . $row['brand'] . ' ' .  $row['bname'] . '</h2>
                                <p><strong>Type:</strong>' . ' ' .  $row['btype'] . '</p>
                                <p><strong>Price</strong>: Rs. ' . ' ' .  $row['price'] . '</p>
                                <p><strong>Engnine Capacity: </strong>' . ' ' .  $row['enginecc'] . 'cc</p>
                            </div>
                        </div>
                    </div>';
                }
            } else {
                echo '<p id="error">No bikes found</p>';
            }
            ?>
        </div>
</body>
</div>


</html>