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

/* $html = "<table>";
  $html .= "<thead>
    <tr>
      <th>Name</th>
      <th>Brand</th>
      <th>Type</th>
      <th>Engine</th>
      <th>Price</th>
    </tr>";

    css
    Copy code
    $html .= "<tr>
      <td>" . $bike_details['bname'] . "</td>
      <td>" . $bike_details['brand'] . "</td>
      <td>" . $bike_details['btype'] . "</td>
      <td>" . $bike_details['enginecc'] . "</td>
      <td>" . $bike_details['price'] . "</td>

    </tr>";

    $html .= "</table>";

echo $html;
} else {
echo "No bike found with name: $selected_bike";
}
}

$selected_bike2 = isset($_POST['selected_bike2']) ? $_POST['selected_bike2'] : '';
if ($selected_bike2) {
$sql2 = "SELECT * FROM bikes WHERE bname = '$selected_bike2'";
$result2 = $conn->query($sql2);

bash
Copy code
if ($result2->num_rows === 1) {
$bike_details2 = $result2->fetch_assoc();



/* $html2 = "<table>";
  $html2.= "<tr>
    <th>Brand</th>
    <th>Name</th>
    <th>Type</th>
    <th>Engine</th>
    <th>Price</th>
  </tr>";

  $html2 .= "<tr>
    <td>" . $bike_details2['brand'] . "</td>
    <td>" . $bike_details2['bname'] . "</td>
    <td>" . $bike_details2['btype'] . "</td>
    <td>" . $bike_details2['enginecc'] . "</td>
    <td>" . $bike_details2['price'] . "</td>

  </tr>";

  $html2 .= "</table>";

echo $html2;
} else {
echo "No bike found with name: $selected_bike2";
}
}*/