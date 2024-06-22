<?php
include 'connection.php';
$stylesheet_url = "get_bike_details.css?v=<?php echo time(); ?>";
echo "
<link rel='stylesheet' href='{$stylesheet_url}'>";

$selected_bike = isset($_POST['selected_bike']) ? $_POST['selected_bike'] : '';

if ($selected_bike) {
  $sql = "SELECT * FROM bikes WHERE bname = '$selected_bike'";
  $result = $conn->query($sql);

  if ($result->num_rows === 1) {
    $bike_details = $result->fetch_assoc();


    if (!empty($bike_details['image'])) {
      echo '<td><img src="' . ($bike_details['image']) . '" height="200" width="350"></td>';
    } else {
      echo '<td>No image</td>';
    };

    echo '

<body>
  <div class="data">
    <table border=0px solid cellspacing=5px>
      <tbody>
        <tr>
          <th>Name</th>
          <td>' . $bike_details['bname'] . '</td>
        </tr>
        <tr>
          <th>Brand</th>
          <td>' . $bike_details['brand'] . '</td>
        </tr>
        <tr>
          <th>Type</th>
          <td>' . $bike_details['btype'] . '</td>
        </tr>
        <th>Engine</th>
        <td>' . $bike_details['enginecc'] . '</td>
        </tr>
        <tr>
          <th>Price</th>
          <td>' . $bike_details['price'] . '</td>
        </tr>
      </tbody>
    </table>
  </div>
</body>';
  }
}
