<?php
include 'connection.php';
include 'menu.php';

$search = isset($_GET['search-input']) ? $conn->real_escape_string($_GET['search-input']) : '';

$sql = "SELECT * FROM bikes WHERE bname LIKE '%$search%'";
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
    <!--<h1 class="search-header">Search Results for "<?php echo htmlspecialchars($search); ?>"</h1>
    <div class="grid-container">
        <?php if (count($items) > 0) : ?>
            <?php foreach ($items as $item) : ?>
                <div class="grid-item">
                    <?php
                    if (!empty($item['image'])) {
                        echo '<td><img src="' . ($item['image']) . '" width="350"></td>';
                    } else {
                        echo '<td>No image</td>';
                    }; ?>
                    <h2><?php echo htmlspecialchars($item['bname']); ?></h2>
                    <p><?php echo htmlspecialchars($item['brand']); ?></p>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p>No items found.</p>
        <?php endif; ?>
    </div>-->

    <div class="bike-display">
        <div class="bike-container">
            <div class="bike-image">
                <?php
                if (count($items) > 0)
                    foreach ($items as $item);
                if (!empty($item['image'])) {
                    echo '<td><img src="' . ($item['image']) . '" width="350px"></td>';
                } else {
                    echo '<td>No image</td>';
                };
                ?>
            </div>
            <div class="bike-specs">
                <p class="bike-brand"><?php echo htmlspecialchars($item['brand']) ?>
                    <?php echo htmlspecialchars($search); ?></p>
            </div>


        </div>

    </div>
    <div class="key-specs">
        <h3>Key Specifications</h3>
    </div>
    <div class="bike-details">
        <div class="bike-info">
            <table>

                <th>Price</th>
                <tr>
                    <td><?php echo htmlspecialchars($item['price']) ?></td>
                </tr>

                <th>Type</th>
                <tr>
                    <td><?php echo htmlspecialchars($item['btype']) ?></td>
                </tr>

                <th>Price</th>
                <tr>
                    <td><?php echo htmlspecialchars($item['enginecc']) ?></td>
                </tr>
            </table>
        </div>
    </div>
</body>

</html>