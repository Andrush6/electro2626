<?php
include 'header.php';
include 'db_connection.php';
error_reporting(E_ALL);
ini_set('display_errors', "on");
$products = db_connection::init()->products()->product_category($_GET['category'])->get();
$categories = db_connection::init()->categories()->get();
?>
<div class="container">

  <div class="row">

	<?php include 'menu.php'; ?>

	<div class="row">
	  <?php foreach ($products as $product) { ?>
  	  <div class="col-sm-4 col-lg-4 col-md-4">
  		<div class="thumbnail">
  		  <img src="http://placehold.it/320x150" alt="">
  		  <div class="caption">
  			<h4 class="pull-right"><?= $product['price'] ?></h4>
  			<h4><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/product/?id=<?= $product['id'] ?>"><?= $product['type'] ?></a>
  			</h4>
  			<p><?= $product['description'] ?></p>
  		  </div>
  		  <div class="ratings">
  			<p class="pull-right">15 reviews</p>
  			<p>
  			  <span class="glyphicon glyphicon-star"></span>
  			  <span class="glyphicon glyphicon-star"></span>
  			  <span class="glyphicon glyphicon-star"></span>
  			  <span class="glyphicon glyphicon-star"></span>
  			  <span class="glyphicon glyphicon-star"></span>
  			</p>
  		  </div>
  		</div>
  	  </div>
	  <?php } ?>
	</div>

  </div>

</div>

</div>
<?php include 'footer.php'; ?>