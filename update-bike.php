<?php include 'connection.php'; ?>
<?php include 'menu.php'; ?>
<?php
$stylesheet_url = "update-bike.css?v=<?php echo time(); ?>";
echo "<link rel='stylesheet' href='{$stylesheet_url}'>";

if (isset($_GET['bikeid'])) {
$bikeid = $_GET['bikeid'];

php
Copy code
$sql = "SELECT * FROM bikes WHERE bikeid = '$bikeid'";
$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Query failed: " . mysqli_error($conn));
} else {
    $row = mysqli_fetch_assoc($result);
    $image = $row['image']; // Fetch current image data
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

    // Check if a new image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $imageData = file_get_contents($_FILES['image']['tmp_name']);
        $image = base64_encode($imageData);
    }

    $sql = "UPDATE bikes SET brand = '$brand', bname = '$bname', btype = '$btype', enginecc = '$enginecc', price = '$price', image='$image' WHERE bikeid = '$idnew'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    } else {
        header('Location: add.php?update_msg=Data successfully updated.');
    }
}
?>
<div class="update">
    <form action="update-bike.php?bikeid_new=<?php echo $bikeid; ?>" method="POST" enctype="multipart/form-data">
        <div class="bike-body">
            <label for="brand">Brand</label><br>
            <input type="radio" name="brand" value="Yamaha" <?php echo ($row['brand'] == 'Yamaha') ? 'checked' : ''; ?>> <label for="yamaha">Yamaha</label>
            <input type="radio" name="brand" value="Honda" <?php echo ($row['brand'] == 'Honda') ? 'checked' : ''; ?>> <label for="honda">Honda</label>
            <input type="radio" name="brand" value="Bajaj" <?php echo ($row['brand'] == 'Bajaj') ? 'checked' : ''; ?>> <label for="bajaj">Bajaj</label>
            <input type="radio" name="brand" value="KTM" <?php echo ($row['brand'] == 'KTM') ? 'checked' : ''; ?>> <label for="ktm">KTM</label>
            <input type="radio" name="brand" value="Royal-Enfield" <?php echo ($row['brand'] == 'Royal-Enfield') ? 'checked' : ''; ?>> <label for="royal-enfield">Royal Enfield</label>
            <br><br>
        </div>
php
Copy code
    <div class="bike-body">
        <label for='bname'>Bike Name:</label>
        <input type='text' name='bname' id='bname' value='<?php echo $row['bname'] ?>' required>
    </div><br>

    <div class="bike-body">
        <label for="btype">Bike Type:</label><br>
        <input type="radio" name="btype" value="sport" <?php echo ($row['btype'] == 'sport') ? 'checked' : ''; ?>> <label for="sport">Sport</label>
        <input type="radio" name="btype" value="cruiser" <?php echo ($row['btype'] == 'cruiser') ? 'checked' : ''; ?>> <label for="cruiser">Cruiser</label>
        <input type="radio" name="btype" value="commuter" <?php echo ($row['btype'] == 'commuter') ? 'checked' : ''; ?>> <label for="commuter">Commuter</label>
        <input type="radio" name="btype" value="naked" <?php echo ($row['btype'] == 'naked') ? 'checked' : ''; ?>> <label for="naked">Naked</label>
        <br><br>
    </div>

    <div class="bike-body">
        <label for='enginecc'>Displacement (cc):</label>
        <input type='number' name='enginecc' id='enginecc' value='<?php echo $row['enginecc'] ?>' required>
    </div><br>

    <div class="bike-body">
        <label for='price'>Price:</label>
        <input type='number' name='price' id='price' value='<?php echo $row['price'] ?>' required>
    </div><br>

    <div class="bike-body">
        <label for='image'>Current Image:</label><br>
        <img src='data:image/jpeg;base64,<?php echo $image; ?>' alt='<?php echo $row['bname']; ?>' width='150'><br>
        <label for='image'>Upload New Image:</label>
        <input type='file' name='image' id='image'>
    </div><br>

    <div class="sb-btm">
        <input type="submit" class="btn btn-success" name="update_bikes" value="UPDATE">
    </div>
</form>
</div>