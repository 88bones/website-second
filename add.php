<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bikes</title>
    <link rel="stylesheet" href="add.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php
    include 'menu.php';
    ?>

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="addbikes">
            <div class="brand">
                <label for="BRAND">Brand</label><br>
                <input type="radio" name="brand" value="Yamaha">
                <label for="yamaha">Yamaha</label>
                <input type="radio" name="brand" value="Honda">
                <label for="honda">Honda</label>
                <input type="radio" name="brand" value="Bajaj">
                <label for="bajaj">Bajaj</label>
                <input type="radio" name="brand" value="KTM">
                <label for="ktm">KTM</label>
                <input type="radio" name="brand" value="Royal-Enfield">
                <label for="royal-enfield">Royal Enfiled</label>
            </div>

            <div class="mname">
                <label for="bname">Model Name</label>
                <input type="text" name="bname" />
            </div>

            <label for="btype">Bike Type</label>
            <div class="btype">
                <input type="radio" name="btype" value="sport">
                <label for="sport">Sport</label>
                <input type="radio" name="btype" value="cruiser">
                <label for="cruiser">Cruiser</label>
                <input type="radio" name="btype" value="commuter">
                <label for="commuter">Commuter</label>
                <input type="radio" name="btype" value="naked">
                <label for="ktm">Naked</label>
            </div>

            <label for="cc">Engine CC</label>
            <input type="number" name="enginecc" /><br>

            <label for="price">Price</label>
            <input type="number" name="price" /><br>

            <input type="file" name="image">
            <input type="submit" value="Upload">
            <div class="sb-btm">
                <input type="submit" value="Submit" name='submit'>
            </div>

        </div>
    </form>


    <?php
    include 'connection.php';
    $error = 0;

    if (isset($_POST['submit'])) {
        $brand = $_POST['brand'];
        $bname = $_POST['bname'];
        $btype = $_POST['btype'];
        $cc = $_POST['enginecc'];
        $price = $_POST['price'];

        $result = mysqli_query($conn, "INSERT INTO bikes(bikeid, brand, bname, btype, enginecc, price, image) 
                VALUES ('','$brand','$bname','$btype','$cc','$price','')");
    }
    ?>

    <!--list of bikes-->
    <?php
    include 'connection.php';
    $sql = "SELECT * FROM bikes";
    $row = mysqli_query($conn, $sql);
    echo '
                   <div class="data">
                    <table border=0 px solid cellspacing=1>
                    <tr>
                    <th>BIKE ID</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Type</th>
                    <th>Displacement</th>
                    <th>Price</th>
                    
                    </tr>
                    </div>
                    ';
    while ($result = mysqli_fetch_assoc($row)) {
        echo '<tr>
                            <td>' . $result['bikeid'] . '</td>
                            <td>' . $result['bname'] . '</td>
                            <td>' . $result['brand'] . '</td>
                            <td>' . $result['btype'] . '</td>
                            <td>' . $result['enginecc'] . '</td>
                            <td>' . $result['price'] . '</td>
                            <td><a href="bike-edit.php?id=' . $result['bikeid']. '">Edit</a></td>
    </tr>';

        echo '<br>';
    }
    echo '</table>';
    ?>

    </table>
    </div>
</body>

</html>