<?php
include 'connection.php';
include 'menu.php';

$search = isset($_GET['search-input']) ? $conn->real_escape_string($_GET['search-input']) : '';

$sql = "SELECT * FROM bikes WHERE bname LIKE '$search%'";
$result = $conn->query($sql);

$items = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <link rel="stylesheet" href="search-results.css?v=<?php echo time(); ?>">
</head>

<body>
    <?php if (count($items) > 0) : ?>
        <div class="bike-display">
            <div class="bike-container">
                <div class="bike-image">
                    <?php
                    $item = $items[0];
                    if (!empty($item['image'])) {
                        echo '<img src="' . htmlspecialchars($item['image']) . '" width="500px">';
                    } else {
                        echo '<p>No image</p>';
                    }
                    ?>
                </div>
                <div class="bike-specs">
                    <p class="bike-brand"><?php echo htmlspecialchars($item['brand'] . ' ' . $item['bname']); ?></p>
                </div>
            </div>
        </div>
        <div class="key-specs">
            <h3>Key Specifications</h3>
        </div>
        <div class="bike-details">
            <div class="bike-info">
                <table>
                    <tr>
                        <th>Price</th>
                        <td><?php echo htmlspecialchars($item['price']); ?></td>
                    </tr>
                    <tr>
                        <th>Type</th>
                        <td><?php echo htmlspecialchars($item['btype']); ?></td>
                    </tr>
                    <tr>
                        <th>Engine CC</th>
                        <td><?php echo htmlspecialchars($item['enginecc']); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    <?php else : ?>
        <p>No items found.</p>
    <?php endif; ?>
</body>

</html>