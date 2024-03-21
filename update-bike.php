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

    $name = $_POST['bname'];
    $brand = $_POST['brand'];
    $btype = $_POST['btype'];
    $engine = $_POST['enginecc'];
    $price = $_POST['price'];

    $sql = "UPDATE bikes SET brand = '$brand', bname = '$name', btype = '$btype', enginecc = '$enginecc', price = '$price' WHERE bikeid = '$idnew'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed" . mysqli_error($conn));
    } else {
        header('Location: add.php');
    }
}


?>


<form action="update-bike.php?bikeid_new=<?php echo $bikeid; ?>" method="POST" enctype="multipart/form-data">
    <h2>Edit Bike</h2>
    
        <input type='hidden' name='bikeid' value='$bikeid'>
        <label for='bike_name'>Bike Name:</label>
        <input type='text' name='bike_name' id='bike_name' value='<?php echo $row['bname']?>' required>
        <br>
        <label for='brand'>Brand:</label>
        <input type='text' name='brand' id='brand' value='<?php echo $row['brand']?>' required>
        <br>
        <label for='type'>Type:</label>
        <input type='text' name='type' id='type' value="<?php echo $row['btype']?>" required>
        <br>
        <label for='displacement'>Displacement (cc):</label>
        <input type='number' name='displacement' id='displacement' value='<?php echo $row['enginecc']?>' required>
        <br>
        <label for='price'>Price:</label>
        <input type='number' name='price' id='price' value='<?php echo $row['price']?>' required>
        <br>
        <input type='submit'>Save Changes</input>
    
</form>