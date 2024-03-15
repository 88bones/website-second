<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare</title>
    <link rel="stylesheet" href="compare.css">
</head>

<body>
    <?php
    include 'menu.php';
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="compare-container">
            <div class="compare-box">
                <h2 id="compare-header">Compare bikes</h2>


                <div class="comparing-menu">
                    <div class="comparing-items">
                        <div class="bike1">

                            <select id="bike-select1">
                                <option value="">Select a bike.</option>
                                <?php
                                include 'connection.php';
                                $sql = "SELECT bname FROM bikes";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["bname"] . "'>" . $row["bname"] . "</option>";
                                    }
                                } else {
                                    echo "No items found";
                                }
                                ?>
                            </select>
                        </div>


                        <div class="bike1">
                            <select id="bike-select2">
                                <option value="">Select a bike</option>
                                <?php
                                include 'connection.php';
                                $sql = "SELECT bname FROM bikes";
                                $result = $conn->query($sql);
                                if ($result->num_rows > 0) {
                                    // Output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option value='" . $row["bname"] . "'>" . $row["bname"] . "</option>";
                                    }
                                } else {
                                    echo "No items found";
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <button type="submit">Compare</button>
                </div>
            </div>
        </div>

        <div class="table-container">
            <div class="table-box">
                <?php
                include 'connection.php';
                $selected_bike = isset($_POST['bname']) ? $_POST['POST']['bname'] : '';  // Corrected typo

                $sql = "SELECT * FROM bikes WHERE bname = '$selected_bike'";
                $row =mysqli_query($conn,$sql);

                echo'
                <body>
                    <div class="data">
                    <table border=0 px solid cellspacing=1>
                    <tr>
                    <th>Brand</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Engine</th>
                    <th>Price</th>
                    </tr>
                    </div>
                    </body>
                    ';
                while($result=mysqli_fetch_assoc($row)){
                    echo '<tr>
                    <td>'.$result['bname'].'</td>';
                }
                echo '</table>';
    
                

                ?>
            </div>
        </div>

    </form>
    <script src="script.js"></script>

</body>

</html>