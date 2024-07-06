<?php
include 'connection.php';
$stylesheet_url = "get_bike_details.css";
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
    <table>
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


    $bike_id = $bike_details['bikeid'];
    $sql_reviews = "SELECT r.*, u.username
                  FROM reviews r 
                  JOIN users u 
                  ON r.userid = u.userid WHERE r.bikeid = $bike_id";
    $result_reviews = $conn->query($sql_reviews);

    echo '<div class="reviews">';
    echo '<h3>Reviews</h3>';
    if ($result_reviews->num_rows > 0) {
      while ($review = $result_reviews->fetch_assoc()) {
        echo '<div class="review">';
        echo '<p><strong>Reviewer:</strong> ' . htmlspecialchars($review['username']) . '</p>';
        echo '<p><strong>Rating:</strong> ' . htmlspecialchars($review['rating']) . '/5</p>';
        echo '<p>' . htmlspecialchars($review['review_text']) . '</p>';
        echo '</div><br>';
      }
    } else {
      echo '<p>No reviews found for this bike.</p>';
    }
    echo '</div>';
  } else {
    echo '<p>No bike found with name: ' . htmlspecialchars($selected_bike) . '</p>';
  }
}
