<?php

error_reporting(E_ALL);
ini_set('display_errors', "on");
$db_config = include 'config/db_config.php';
$conn = mysqli_connect($db_config['servername'], $db_config['username'], $db_config['password'], $db_config['dbname']);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if ($check !== false) {
	echo "File is an image - " . $check["mime"] . ".";
	$uploadOk = 1;
  } else {
	echo "File is not an image.";
	$uploadOk = 0;
  }
  if ($uploadOk == 0) {
	echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
  } else {
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	  echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
	} else {
	  echo "Sorry, there was an error uploading your file.";
	}
  }
  $sql = "INSERT INTO products (category_id, manufacturer, type, price, description, quantity, image) VALUES (" . $_POST['category_id'] . ", '" . $_POST['manufacturer'] . "', '" . $_POST['type'] . "', " . $_POST['price'] . ", '" . $_POST['description'] . "', " . $_POST['quantity'] . ", '" . $target_file . "')";
  mysqli_query($conn, $sql);
  mysqli_close($conn);
}