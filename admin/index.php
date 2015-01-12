<?php
error_reporting(E_ALL);
ini_set('display_errors', "on");

session_start();

include_once '../authentication.php';
if (isset($_GET['logout'])) {
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
	<div class="col-md-9">
	<form action="../upload.php" method="post" enctype="multipart/form-data">
	  <div class="form-group">
		Kategória id:
	  <input type="number" name="category_id" id="category_id">
	  </div>
	  <div class="form-group">
		Gyártó:
	  <input type="text" name="manufacturer" id="manufacturer">
	  </div>
	  <div class="form-group">
		Típus:
	  <input type="text" name="type" id="type">
	  </div>
	  <div class="form-group">
		Ár:
	  <input type="number" name="price" id="price">
	  </div>
	  <div class="form-group">
		Leírás:
	  <input type="text" name="description" id="description">
	  </div>
	  <div class="form-group">
		Mennyiség:
	  <input type="number" name="quantity" id="quantity">
	  </div>
	  <div class="form-group">
		Kép feltöltése:
	  <input type="file" name="fileToUpload" id="fileToUpload">
	  </div>
	  
	  <button type="submit" class="btn btn-default" value="Upload Image" name="submit">Mentés</button>
	  
	</form>
	</div>