<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compare</title>
    <link rel="stylesheet" href="compare.css?v=<?php echo time(); ?>">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <?php
    include 'menu.php';
    ?>
    <div class="compare-bigg-box">
        <div class="compare-header-container">
            <div class="compare-header">
                <h2>Compare Bikes</h2>
            </div>
        </div>

        <div class="compare-box-container">
            <div class="compare-box">
                <div class="compare-items">

                    <!--bike1-select-->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <select id="bike-select1" name="bike-select1">
                            <option value="">Select a bike.</option>
                            <?php
                            include 'connection.php';
                            $sql = "SELECT bname FROM bikes";
                            $result = $conn->query($sql);
                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='" . $row["bname"] . "'>" . $row["bname"] . "</option>";
                                }
                            } else {
                                echo "No items found";
                            }
                            ?>
                        </select>
                        <input type="submit" name="submit" style="display: none;">
                    </form>


                    <!--SELECT BIKE2-->
                    <form action="" method="POST" enctype="multipart/form-data">
                        <select id="bike-select2" name="bike-select2">
                            <option value="">Select a bike.</option>
                            <?php
                            include 'connection.php';
                            $sql2 = "SELECT bname FROM bikes";
                            $result2 = $conn->query($sql2);
                            if ($result2->num_rows > 0) {
                                while ($row2 = $result2->fetch_assoc()) {
                                    echo "<option value='" . $row2["bname"] . "'>" . $row2["bname"] . "</option>";
                                }
                            } else {
                                echo "No items found";
                            }
                            ?>
                        </select>
                        <input type="submit" name="submit" style="display: none;">
                    </form>
                </div>
            </div>
        </div>


        <div class="bike-table-container">
            <div class="bike-table">
                <!--bike-select1-table-->
                <div id="bike-details"></div>
                <script>
                    $(document).ready(function() {
                        $("#bike-select1").change(function() { // Trigger on selection change
                            var selectedBike = $(this).val();

                            $.ajax({
                                url: "get_bike_details.php",
                                method: "POST",
                                data: {
                                    selected_bike: selectedBike
                                },
                                success: function(response) {
                                    $("#bike-details").html(response);
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.error("Error:", textStatus, errorThrown);
                                }
                            });
                        });
                    });
                </script>

                <!--bike-select-2-table-->
                <div id="bike-details2"></div>
                <script>
                    $(document).ready(function() {
                        $("#bike-select2").change(function() { // Trigger on selection change
                            var selectedBike2 = $(this).val();

                            $.ajax({
                                url: "get_bike_details.php",
                                method: "POST",
                                data: {
                                    selected_bike: selectedBike2
                                },
                                success: function(response2) {
                                    $("#bike-details2").html(response2);
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    console.error("Error:", textStatus, errorThrown);
                                }
                            });
                        });
                    });
                </script>
            </div>
        </div>
    



</body>

</html>