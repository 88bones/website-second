<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bikes</title>
    <link rel="stylesheet" href="add.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!--<script>
        function validateForm() {
            var brand = document.querySelector('input[name="brand"]:checked');
            var bname = document.querySelector('input[name="bname"]');
            var btype = document.querySelector('input[name="btype"]:checked');
            var enginecc = document.querySelector('input[name="enginecc"]');
            var price = document.querySelector('input[name="price"]');
            var image = document.querySelector('input[name="image"]');

            var errorMessages = [];

            if (!brand) {
                errorMessages.push("Brand is required");
            }
            if (!bname.value.trim()) {
                errorMessages.push("Model Name is required");
            }
            if (!btype) {
                errorMessages.push("Bike Type is required");
            }
            if (!enginecc.value.trim()) {
                errorMessages.push("Engine CC is required");
            }
            if (!price.value.trim()) {
                errorMessages.push("Price is required");
            }
            if (!image.value.trim()) {
                errorMessages.push("Image is required");
            }

            if (errorMessages.length > 0) {
                // Display error messages
                var errorList = document.getElementById('error-list');
                errorList.innerHTML = '';
                errorMessages.forEach(function(error) {
                    var li = document.createElement('li');
                    li.textContent = error;
                    errorList.appendChild(li);
                });

                return false; // Prevent form submission
            }

            return true; // Allow form submission
        }
    </script>-->
</head>

<body>
    <?php include 'menu.php'; ?>
    <div class="addbikes">
        <form action="" method="POST" enctype="multipart/form-data" onsubmit="validateForm()">
            <h2>Add Bikes</h2><br>
            <div class="form-items">
                <label for="brand">Brand</label><br>
                <input type="radio" name="brand" value="Yamaha">
                <label for="yamaha">Yamaha</label>
                <input type="radio" name="brand" value="Honda">
                <label for="honda">Honda</label>
                <input type="radio" name="brand" value="Bajaj">
                <label for="bajaj">Bajaj</label>
                <input type="radio" name="brand" value="KTM">
                <label for="ktm">KTM</label>
                <input type="radio" name="brand" value="Royal-Enfield">
                <label for="royal-enfield">Royal Enfield</label>
                <br><br>
                <label for="bname">Model Name</label><br>
                <input type="text" name="bname" /><br><br>
                <label for="btype">Bike Type</label><br>
                <div class="btype">
                    <input type="radio" name="btype" value="sport">
                    <label for="sport">Sport</label>
                    <input type="radio" name="btype" value="cruiser">
                    <label for="cruiser">Cruiser</label>
                    <input type="radio" name="btype" value="commuter">
                    <label for="commuter">Commuter</label>
                    <input type="radio" name="btype" value="naked">
                    <label for="ktm">Naked</label>
                </div><br>
                <label for="enginecc">Engine CC</label><br>
                <input type="number" name="enginecc" /><br><br>
                <label for="price">Price</label><br>
                <input type="number" name="price" /><br><br>
                <label for="image">Image</label><br>
                <input type="file" name="image"><br><br>
                <div class="sb-btm">
                    <input type="submit" value="Submit" name='submit'>
                </div>
            </div>
        </form>
    </div>

    <div id="error-list" style="color: red;"></div>


    <?php include 'connection.php'; ?>
    <?php
    if (isset($_POST['submit'])) {
        $brand = $_POST['brand'];
        $bname = $_POST['bname'];
        $btype = $_POST['btype'];
        $cc = $_POST['enginecc'];
        $price = $_POST['price'];

        // Image upload handling
        $target_dir = "uploads/";
        $target_file = $target_dir . ($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["image"]["size"] > 9000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file " . (($_FILES["image"]["name"])) . " has been uploaded." . " ";
                $image = $target_file;

                // Insert bike data into the database
                $result = mysqli_query($conn, "INSERT INTO bikes (brand, bname, btype, enginecc, price, image) VALUES ('$brand', '$bname', '$btype', '$cc', '$price', '$image')");
                if ($result == '') {
                    echo "Bike added successfully!";
                } else {
                    echo "Error ";
                }
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
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
                <th>Image</th>
                <th>Actions</th>
                
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
                        <td>' . $result['price'] . '</td>';

        if (!empty($result['image'])) {
            echo '<td><img src="' . $result['image'] . '"height="60" width="100"></td>';
        } else {
            echo '<td>No image</td>';
        };


        echo '<td><a href="update-bike.php?bikeid=' . $result['bikeid'] . '">Edit</a></td>
                        <td><a href="delete-bike.php?bikeid=' . $result['bikeid'] . '">Delete</a></td>

</tr>';
    }
    ?>
</body>

</html>