<?php include 'connection.php'; ?>
<?php include 'menu.php'; ?>

<?php
 $stylesheet_url = "update-bike.css";
 echo "<link rel='stylesheet' href='{$stylesheet_url}'>";

    if (isset($_GET['bikeid'])) {
        $bikeid = $_GET['bikeid'];


        $sql = "SELECT * FROM bikes WHERE bikeid = '$bikeid'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Query failed" . mysqli_error($conn));
        } else {
            $row = mysqli_fetch_assoc($result);
            // print_r($row);
        }
    }

?>


<?php
    if (isset($_POST['update_bikes'])) {
        if (isset($_GET['bikeid_new'])) {
            $idnew = $_GET['bikeid_new'];
        }

        $brand = $_POST['brand'];
        $bname = $_POST['bname'];
        $btype = $_POST['btype'];
        $enginecc = $_POST['enginecc'];
        $price = $_POST['price'];

        $sql = "UPDATE bikes SET brand = '$brand', bname = '$bname', btype = '$btype', enginecc = '$enginecc', price = '$price' WHERE bikeid = '$idnew'";
        $result = mysqli_query($conn, $sql);

        if (!$result) {
            die("Query failed" . mysqli_error($conn));
        } else {
            header('Location: add.php?update_msg=Data successfully updated.');
        }
    }


?>


<form action="update-bike.php?bikeid_new=<?php echo $bikeid; ?>" method="POST" enctype="multipart/form-data">
    <!-- <h2>Edit Bike</h2> -->
    
        <!-- <input type='hidden' name='bikeid' value='$bikeid'> -->

        <!-- <div class="bike-body">
            <label for='brand'>Brand:</label>
            <input type='text' name='brand' id='brand' value="<?php echo $row['brand'] ?>" required>
        </div><br> -->
        <div class="bike-body">
                    <label for="brand">Brand</label>
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
                    <br><br>
                </div>

        <div class="bike-body">    
            <label for='bname'>Bike Name:</label>
            <input type='text' name='bname' id='bname' value='<?php echo $row['bname'] ?>' required>
        </div><br>

        <!-- <div class="bike-body">
            <label for='btype'>Type:</label>
            <input type='text' name='btype' id='btype' value="<?php echo $row['btype'] ?>" required>
        </div><br> -->
        <div class="bike-body">
                <label for="btype">Bike Type:</label>
                <!-- <div class="btype"> -->
                    <input type="radio" name="btype" value="sport">
                    <label for="sport">Sport</label>
                    <input type="radio" name="btype" value="cruiser">
                    <label for="cruiser">Cruiser</label>
                    <input type="radio" name="btype" value="commuter">
                    <label for="commuter">Commuter</label>
                    <input type="radio" name="btype" value="naked">
                    <label for="ktm">Naked</label>
                <!-- </div><br> -->
                </div>

        <div class="bike-body">
            <label for='cc'>Displacement (cc):</label>
            <input type='number' name='enginecc' id='enginecc' value='<?php echo $row['enginecc'] ?>' required>
        </div><br>

        <div class="bike-body">
            <label for='price'>Price:</label>
            <input type='number' name='price' id='price' value='<?php echo $row['price'] ?>' required>
        </div><br>

        <div class="sb-btm">
                <!-- <input type="submit" value="Submit" name='submit'> -->
            <input type="submit" class="btn btn-success" name="update_bikes" value="UPDATE">
        </div>
    
</form>