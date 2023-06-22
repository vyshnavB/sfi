<?php
// Start the session
session_start();

// Check if the admin session variable is not set
if (!isset($_SESSION['admin'])) {
  // Redirect to the login page
  header('Location: login.html');
  exit;
}

// Database connection parameters
$hostname = '127.0.0.1';  // Replace 'your_host' with the actual hostname or IP address
$username = 'u895526204_database_sfi';
$password = 'brNa7NrRh1__UA0V';
$database = 'u895526204_db_sfi';
// $hostname = 'localhost'; // Replace 'localhost' with the actual hostname or IP address
// $username = 'sfidatabase';
// $password = 'brNa7NrRh1__UA0V';
// $database = 'sfi_db';

// Handle delete request
if (isset($_GET['delete_id'])) {
  $itemId = $_GET['delete_id'];

  // Delete the item from the database
  $conn = new mysqli($hostname, $username, $password, $database);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

  $sql = "DELETE FROM products WHERE id = '$itemId'";
  if ($conn->query($sql) === TRUE) {
    echo "Item deleted successfully.";
  } else {
    echo "Error deleting item: " . $conn->error;
  }

  $conn->close();
}

// Retrieve form data
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $fishName = isset($_POST['fish_name']) ? $_POST['fish_name'] : '';
  $fishImage = isset($_FILES['fish_image']) ? $_FILES['fish_image'] : null;

  // Check if a file was uploaded
  if ($fishImage && $fishImage['error'] === UPLOAD_ERR_OK) {
    // Specify the directory to save the uploaded images
    $uploadDir = 'uploads/';

    // Generate a unique filename for the uploaded image
    $filename = uniqid() . '_' . $fishImage['name'];

    // Move the uploaded file to the designated directory
    move_uploaded_file($fishImage['tmp_name'], $uploadDir . $filename);

    // Save the fish name and image path to the database
    $conn = new mysqli($hostname, $username, $password, $database);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO products (name, image) VALUES ('$fishName', '$uploadDir$filename')";
    if ($conn->query($sql) === TRUE) {
      echo "Fish added successfully.";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
  } else {
    echo "Error uploading fish image.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Add Product - Fish</title>
</head>
<body>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 20px;
  }

  h2 {
    margin-bottom: 20px;
    text-align: center;
    color: #333;
  }

  form {
    margin-bottom: 20px;
    text-align: center;
  }

  label {
    display: block;
    margin-bottom: 5px;
    color: #333;
    font-weight: bold;
  }

  input[type="text"],
  input[type="file"] {
    margin-bottom: 10px;
    padding: 10px;
    width: 300px;
    border: 1px solid #ccc;
  }

  input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    padding: 10px 15px;
    border: none;
    cursor: pointer;
    font-size: 16px;
  }

  input[type="submit"]:hover {
    background-color: #45a049;
  }

  ul {
    list-style-type: none;
    padding: 0;
    text-align: center;
  }

  li {
    display: inline-block;
    margin: 10px;
    text-align: center;
  }

  img {
    width: 100px;
    height: 100px;
    object-fit: cover;
    border: 1px solid #ccc;
    
  }
  .logout-link {
    display: inline-block;
    background-color: #f44336;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
    text-decoration: none;
   
  }

  .logout-link:hover {
    background-color: #d32f2f;
  }
  .delete-link {
  color: #fff;
  background-color: #ff0000;
  padding: 5px 10px;
  border-radius: 4px;
  text-decoration: none;
  margin-top: 10px; /* Add margin to create space */
  display: inline-block; /* Ensure link is displayed as a block element */
}

.delete-link:hover {
  background-color: #cc0000;
}


 
</style>

  <h2>Add Product - Fish</h2>
  <form action="add_product.php" method="POST" enctype="multipart/form-data">
    <label for="fish_name">Fish Name:</label>
    <input type="text" name="fish_name" id="fish_name" required>

    <label for="fish_image">Fish Image:</label>
    <input type="file" name="fish_image" id="fish_image" accept="image/*" required>

    <input type="submit" value="Add Fish">
    <a class="logout-link" href="admin.html">Logout</a>
  </form>

  

  <h2>Uploaded Items</h2>
  <ul>
    <?php
    // Retrieve the uploaded items from the database
    $conn = new mysqli($hostname, $username, $password, $database);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
        $itemId = $row['id'];
        $itemName = $row['name'];
        $itemImage = $row['image'];

        echo "<li>";
        echo "<img src='$itemImage' alt='$itemName' width='100'>";
        echo "<br>";
        echo "$itemName";
        echo "<br>";
        echo "<a href='add_product.php?delete_id=$itemId' class='delete-link'>Delete</a>";
        echo "</li>";
      }
    } else {
      echo "No items found.";
    }

    $conn->close();
    ?>
  </ul>
</body>
</html>
