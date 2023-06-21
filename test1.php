<?php
echo '<!DOCTYPE html>';
echo '<html lang="en">';
echo '';
echo '<head>';
echo '<meta charset="utf-8">';
echo '<title>Makaan - Real Estate HTML Template</title>';
echo '<meta content="width=device-width, initial-scale=1.0" name="viewport">';
echo '<meta content="" name="keywords">';
echo '<meta content="" name="description">';
echo '';
echo '<link href="css/bootstrap.min.css" rel="stylesheet">';
echo '<link rel="stylesheet" href="css/language.css">';
echo '<!-- Template Stylesheet -->';
echo '<link href="css/style.css" rel="stylesheet">';
echo '</head>';
echo '';
echo '<body>';

// Establish a database connection
$hostname = '';  // Replace 'your_host' with the actual hostname or IP address
$username = 'sfidatabase';
$password = 'brNa7NrRh1__UA0V';
$database = 'sfi_db';

$conn = new mysqli($hostname, $username, $password, $database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve the fish records from the "products" table
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

// Display the fish names and images
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $fishName = $row['name'];
    $fishImage = $row['image'];
   

    echo '<div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">';
    echo '<a class="cat-item d-block bg-light text-center rounded p-3" href="">';
    echo '<div class="rounded p-4">';
    echo '<div class="icon mb-3">';
    echo '<img class="img-fluid" src="' . $fishImage . '" alt="Icon">';
    echo '</div>';
    echo '<h6>' . $fishName . '</h6>';
    echo '<div class="p-icon" style="font-size: 14px;">';
    echo '<p ><i class="fas fa-map-marker-alt"></i> &nbsp; origin : Indonesia </p>';
    echo '<p ><i class="fas fa-suitcase"></i> &nbsp; packing : MC, etc (as per requested) </p>';
    echo '</div>';
    echo '</div>';
    echo '</a>';
    echo '</div>';
  }
} else {
  echo "No fish found.";
}

$conn->close();

echo '</body>';
echo '';
echo '</html>';
?>
