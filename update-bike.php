<?php
include 'connection.php';

// Get form data
$bike_id = isset($_POST['bikeid']) ? (int) $_POST['bikeid'] : 0;
$bike_name = isset($_POST['bname']) ? mysqli_real_escape_string($conn, $_POST['bname']) : '';
$brand = isset($_POST['brand']) ? mysqli_real_escape_string($conn, $_POST['brand']) : '';
$type = isset($_POST['btype']) ? mysqli_real_escape_string($conn, $_POST['btype']) : '';
$displacement = isset($_POST['enginecc']) ? (int) $_POST['enginecc'] : 0;
$price = isset($_POST['price']) ? (float) $_POST['price'] : 0.0;

// Validate data (optional)
if ($bike_id <= 0 || empty($bike_name) || empty($brand) || empty($type) || $displacement <= 0 || $price <= 0) {
  echo "Invalid bike data provided.";
  exit;
}

$sql = "UPDATE bikes SET bname = ?, brand = ?, btype = ?, enginecc = ?, price = ? WHERE id = ?";
$stmt = $conn->prepare($stmt); // Prepare statement for security

// Bind values to the prepared statement
$stmt->bind_param('ssssidi', $bike_name, $brand, $type, $displacement, $price, $bike_id);

if ($stmt->execute()) {
  echo "Bike details updated successfully!";
  // Optionally, redirect to a confirmation or view page
} else {
  echo "Error updating bike: " . $conn->error;
}

$stmt->close();
?>
