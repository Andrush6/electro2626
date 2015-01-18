<?php
include_once '../db_connection.php';
include '../header.php';
error_reporting(E_ALL);
ini_set('display_errors', "on");
$product = db_connection::init()->get_product_by_id($_GET['id']);
?>
<div class="container">

  <div class="row">

	<?php include '../menu.php'; ?>

	<div class="col-md-9">

	  <div class="thumbnail">
		<img src="http://<?= $_SERVER['HTTP_HOST'] ?>/<?= $product['image'] != null ? $product['image'] : "images/no_image.jpg" ?>" alt="">
		<div class="caption-full">
		  <h4 class="pull-right"><?= $product['price'] ?> Ft</h4>
		  <h4><?= $product['manufacturer'] ?></h4>
		  <h4><?= $product['type'] ?></h4>

		  <p><?= $product['description'] ?></p>
		  <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/cart/add.php?product_id=<?= $product['id'] ?>" class="btn btn-success btn-block">
			Kosárba
		  </a>
		</div
	  </div>

	  <hr>

	</div>

  </div>

</div>

</div>
<?php include '../footer.php'; ?>