<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Bikes</title>
    <link rel="stylesheet" href="add.css?v=<?php echo time(); ?>">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


    <!--<script>
        function validateBikeForm() {
            var isValid = true;
            var brand = document.querySelector('input[name="brand"]:checked');
            var bname = document.querySelector('input[name="bname"]');
            var btype = document.querySelector('input[name="btype"]:checked');
            var enginecc = document.querySelector('input[name="enginecc"]');
            var price = document.querySelector('input[name="price"]');
            var image = document.querySelector('input[name="image"]');
            var errorList = document.getElementById('error-list');

            // Clear previous error messages
            var errorElements = document.getElementsByClassName("error-message");
            while (errorElements.length > 0) {
                errorElements[0].parentNode.removeChild(errorElements[0]);
            }
            var inputs = document.getElementsByClassName("error");
            while (inputs.length > 0) {
                inputs[0].classList.remove("error");
            }

            // Validation checks
            if (!brand) {
                displayError(document.querySelector('.radio-group'), "Brand is required");
                isValid = false;
            }
            if (bname.value.trim() === "") {
                displayError(bname, "Bike Name is required");
                isValid = false;
            }
            if (!btype) {
                displayError(document.querySelector('.btype'), "Bike Type is required");
                isValid = false;
            }
            if (enginecc.value.trim() === "") {
                displayError(enginecc, "Engine CC is required");
                isValid = false;
            }
            if (price.value.trim() === "") {
                displayError(price, "Price is required");
                isValid = false;
            }
            if (image.value.trim() === "") {
                displayError(image, "Image is required");
                isValid = false;
            }

            return isValid;
        }

        function displayError(element, message) {
            element.classList.add("error");
            var errorMessage = document.createElement("div");
            errorMessage.className = "error-message";
            errorMessage.textContent = message;

            // Insert error message after the input field
            element.parentNode.insertBefore(errorMessage, element.nextSibling);
        }
    </script>-->
</head>

<body>
    <?php include 'menu.php'; ?>
    <div class="addbikes">
        <form action="" method="POST" enctype="multipart/form-data">
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
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $brand = isset($_POST['brand']) ? $_POST['brand'] : '';
        $bname = isset($_POST['bname']) ? $_POST['bname'] : '';
        $btype = isset($_POST['btype']) ? $_POST['btype'] : '';
        $cc = isset($_POST['enginecc']) ? $_POST['enginecc'] : '';
        $price = isset($_POST['price']) ? $_POST['price'] : '';
        $errors = [];

        // Check if required fields are not empty
        if (empty($brand)) {
            $errors[] = "Brand is required.";
        }
        if (empty($bname)) {
            $errors[] = "Model Name is required.";
        }
        if (empty($btype)) {
            $errors[] = "Bike Type is required.";
        }
        if (empty($cc)) {
            $errors[] = "Engine CC is required.";
        }
        if (empty($price)) {
            $errors[] = "Price is required.";
        }

        // Display errors if any
        if (!empty($errors)) {
            foreach ($errors as $error) {
                echo "<p style='color:red;'>$error</p>";
            }
        } else {
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
                    if ($result) {
                        echo "Bike added successfully!";
                    } else {
                        echo "Error ";
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
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
                <th colspan=2>Actions</th>
                
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