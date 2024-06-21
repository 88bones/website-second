<?php
include 'connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $bikeid = $_POST['bikeid'];
    $dealer_name = $_POST['dealer_name'];
    $review_text = $_POST['review_text'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO reviews (bikeid, dealer_name, review_text, rating) VALUES ('$bikeid', '$dealer_name', '$review_text', '$rating')";
    if (mysqli_query($conn, $sql)) {
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Dealer Reviews</title>
    <link rel="stylesheet" href="bike-review.css?v=<?php echo time(); ?>   ">
</head>

<body>
    <?php
    include 'menu.php'; ?>
    <div class="review-section">
        <h2>Dealer Reviews for Bikes</h2>

        <!-- Review form -->
        <form id="review-form" action="" method="post">
            <div class="form-group">
                <label for="bikeid">Bike:</label>
                <select id="bikeid" name="bikeid" required>
                    <option value="">Select a bike</option>
                    <?php
                    include 'connection.php';
                    $sql = "SELECT bikeid, brand, bname FROM bikes";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["bikeid"] . "'>" . $row["brand"] . " " . $row["bname"] . "</option>";
                        }
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="dealer-name">Dealer Name:</label>
                <input type="text" id="dealer-name" name="dealer_name" required>
            </div>
            <div class="form-group">
                <label for="review-text">Review:</label>
                <textarea id="review-text" name="review_text" rows="4" required></textarea>
            </div>
            <div class="form-group">
                <label for="rating">Rating:</label>
                <select id="rating" name="rating" required>
                    <option value="5">5 - Excellent</option>
                    <option value="4">4 - Good</option>
                    <option value="3">3 - Average</option>
                    <option value="2">2 - Poor</option>
                    <option value="1">1 - Terrible</option>
                </select>
            </div>
            <button type="submit">Submit Review</button>
        </form>

        <!-- Display reviews -->
        <div class="reviews">
            <h3>Recent Reviews</h3>
            <?php
            $sql = "SELECT r.dealer_name, r.review_text, r.rating, b.brand, b.bname 
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
                    echo "</div>";
                }
            } else {
                echo "<p>No reviews found.</p>";
            }

            $conn->close();
            ?>
        </div>
    </div>
</body>

</html>