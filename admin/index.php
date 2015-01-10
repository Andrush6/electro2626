<?php
error_reporting(E_ALL);
ini_set('display_errors', "on");

session_start();

include '../authentication.php';
if(isset($_GET['logout'])){
  authentication::logout();
}
authentication::authenticationing(); 
include 'header.php';
?>

<div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Admin Menu</p>
                <div class="list-group">
                    <a href="/admin?logout" class="list-group-item">Kijelentkezes</a>
                    <a href="#" class="list-group-item">Termék feltoltes</a>
                    <a href="#" class="list-group-item">Kategória feltoltes</a>
					<a href="#" class="list-group-item">Gyártó feltoltes</a>
                </div>
            </div>
		  <form action="../upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
	<input type="number" name="category_id" id="category_id">
	<input type="text" name="manufacturer" id="manufacturer">
	<input type="text" name="type" id="type">
	<input type="number" name="price" id="price">
	<input type="text" name="description" id="description">
	<input type="number" name="quantity" id="quantity">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>