<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Review</title>
    <link rel="stylesheet" href="bike-review-display.css">
</head>

<body>

</body>

</html>
<?php
include 'connection.php';
include 'menu.php';
echo '<div class="reviews">';

echo '<h3>Recent Reviews</h3>';
$sql = "SELECT r.reviewid,r.dealer_name, r.review_text, r.rating, b.brand, b.bname 
                    FROM reviews r
                    JOIN bikes b ON r.bikeid = b.bikeid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<div class='review'>";
        echo "<p><strong>Dealer:</strong> " . $row['dealer_name'] . "</p>";
        echo "<p><strong>Bike Model:</strong> " . $row['brand'] . " " . $row['bname'] . "</p>";
        echo "<p><strong>Review:</strong> " . $row['review_text'] . "</p>";
        echo "<p><strong>Rating:</strong> " . $row['rating'] . "/5</p>";
        echo "<button id='rdelete'><a href='bike-review-delete.php?reviewid=" . $row['reviewid'] . "'>Delete</a></button>";
        echo "</div>";
    }
} else {
    echo "<p>No reviews found.</p>";
}

$conn->close();
?>
</div>