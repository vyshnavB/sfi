<?php
$db = new PDO('sqlite:sfi_db.db');

$title = $_POST['title'];
$imageName = $_FILES['image']['name'];
$imageTmpName = $_FILES['image']['tmp_name'];

$targetDir = 'uploads/';
$targetPath = $targetDir . $imageName;
move_uploaded_file($imageTmpName, $targetPath);

$stmt = $db->prepare('INSERT INTO products (title, image) VALUES (:title, :image)');
$stmt->bindParam(':title', $title);
$stmt->bindParam(':image', $imageName);

if ($stmt->execute()) {
  echo 'Product added successfully!';
} else {
  echo 'Error adding product.';
}
?>
