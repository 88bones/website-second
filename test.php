<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Compare</title>
  <link rel="stylesheet" href="compare.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
  <?php
  include 'menu.php';
  ?>

  <div class="bike1">
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

     <!--bike select 2-->
<div class="bike2">
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
  </div>
  <!--dobt change ABOVE code-->



 
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



</body>

</html>