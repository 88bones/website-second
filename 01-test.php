<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bike Search Results</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        /* General styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        /* Container for search results */
        .results-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            padding: 20px;
        }

        /* Card for each bike */
        .bike-card {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 10px;
            width: 300px;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        /* Bike image */
        .bike-image {
            width: 100%;
            height: auto;
            border-bottom: 1px solid #ddd;
        }

        /* Bike information */
        .bike-info {
            padding: 15px;
        }

        .bike-info h2 {
            font-size: 20px;
            color: #333;
            margin: 10px 0;
        }

        .bike-info p {
            margin: 5px 0;
            color: #555;
        }

        .bike-info strong {
            color: #000;
        }
    </style>
</head>

<body>
    <?php
    include 'connection.php';

    // Retrieve bikes from the database
    $sql = "SELECT * FROM bikes";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="results-container">';
        while ($row = $result->fetch_assoc()) {
            echo '<div class="bike-card">';
            echo '<img src="' . $row['image'] . '" alt="Bike Image" class="bike-image">';
            echo '<div class="bike-info">';
            echo '<h2>' . $row['brand'] . ' ' . $row['bname'] . '</h2>';
            echo '<p><strong>Type:</strong> ' . $row['btype'] . '</p>';
            echo '<p><strong>Engine Capacity:</strong> ' . $row['enginecc'] . ' cc</p>';
            echo '<p><strong>Price:</strong> ₹' . number_format($row['price'], 2) . '</p>';

            // Fetch average rating from reviews table
            $bikeid = $row['bikeid'];
            $reviewSql = "SELECT AVG(rating) as average_rating FROM reviews WHERE bikeid = $bikeid";
            $reviewResult = $conn->query($reviewSql);
            $averageRating = 0;
            if ($reviewResult->num_rows > 0) {
                $reviewRow = $reviewResult->fetch_assoc();
                $averageRating = round($reviewRow['average_rating'], 1);
            }
            echo '<p><strong>Average Rating:</strong> ' . $averageRating . '/5</p>';

            echo '</div>';
            echo '</div>';
        }
        echo '</div>';
    } else {
        echo '<p>No bikes found.</p>';
    }

    $conn->close();
    ?>
</body>

</html>