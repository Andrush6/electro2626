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
	  </div>
	</div>
	<div class="col-md-9">
	  <div class="col-md-6">	
		<h1>Termék feltöltés</h1>
		<form action="../upload.php" method="post" enctype="multipart/form-data">
		  <div class="form-group">
			<label for="category_id">Kategória id: </label>
			<input class="form-control" type="number" name="category_id" id="category_id">
		  </div>
		  <div class="form-group">
			<label for="manufacturer">Gyártó: </label>
			<input class="form-control" type="text" name="manufacturer" id="manufacturer">
		  </div>
		  <div class="form-group">
			<label for="type">Típus: </label>
			<input class="form-control" type="text" name="type" id="type">
		  </div>
		  <div class="form-group">
			<label for="price">Ár: </label>
			<input class="form-control" type="number" name="price" id="price">
		  </div>
		  <div class="form-group">
			<label for="description">Leírás: </label>
			<input class="form-control" type="text" name="description" id="description">
		  </div>
		  <div class="form-group">
			<label for="quantity">Mennyiség: </label>
			<input class="form-control" type="number" name="quantity" id="quantity">
		  </div>
		  <div class="form-group">
			<label for="fileToUpload">Kép feltöltése: </label>
			<input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
		  </div>

		  <button type="submit" class="btn btn-default" value="Upload Image" name="submit">Mentés</button>

		</form>
	  </div>
	  <div class="col-md-6">	
		<h1>Kategória feltöltés</h1>
		<form action="../upload.php" method="post" enctype="multipart/form-data">
		  <div class="form-group">
			<label for="name">Kategória név: </label>
			<input class="form-control" type="text" name="name" id="name">
		  </div>
		  <div class="form-group">
			Ha a kategória fő kategória, akkor a mezőt üresen kell hagyni.
			<label for="parent_id">Szülő kategória id: </label>
			<input class="form-control" type="number" name="parent_id" id="parent_id">
		  </div>
		  <button type="submit" class="btn btn-default" value="Upload Image" name="submit">Mentés</button>
		</form>
	  </div>
	</div>