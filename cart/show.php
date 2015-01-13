<?php
error_reporting(E_ALL);
ini_set('display_errors', "on");
session_start();
include_once '../db_connection.php';
include '../header.php';
?>
<div class="container">

  <div class="row">

	<?php include '../menu.php'; ?>
	<div class="container">
	  <div class="row">
		<div class="col-xs-8">
		  <div class="panel panel-info">
			<div class="panel-heading">
			  <div class="panel-title">
				<div class="row">
				  <div class="col-xs-6">
					<h5><span class="glyphicon glyphicon-shopping-cart"></span> Kosaram</h5>
				  </div>
				  <div class="col-xs-6">
					<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/" class="btn btn-primary btn-sm btn-block">
					  <span class="glyphicon glyphicon-share-alt"></span> Tovább vásárolok
					</a>
				  </div>
				</div>
			  </div>
			</div>
			<div class="panel-body">
			  <?php
			  if (isset($_GET['m'])) {
				if ($_GET['m'] == 'invalid_product') {
				  ?>
				  <div class="row">
					<div class="alert alert-danger" role="alert">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Hiba:</span>
					  Érvénytelen terméket próbáltál meg hozzáadni a kosárhoz.
					</div>
				  </div>
				<?php } ?>
				<?php if ($_GET['m'] == 'out') {
				  ?>
				  <div class="row">
					<div class="alert alert-danger" role="alert">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Hiba:</span>
					  A termék sajnos elfogyott.
					</div>
				  </div>
				<?php } ?>
				<?php if ($_GET['m'] == 'invalid_quantity') {
				  ?>
				  <div class="row">
					<div class="alert alert-danger" role="alert">
					  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
					  <span class="sr-only">Hiba:</span>
					  Hibás mennyiséget jelöltél meg.
					</div>
				  </div>
				<?php } ?>
			  <?php } ?>

			  <?php
			  $sum_price = 0;
			  if (!array_key_exists("cart", $_SESSION) || empty($_SESSION['cart'])) {
				?>
  			  <h1>A kosarad üres</h1>
			  <?php } else {
				?>
  			  <form id="product-update" method="post" action="update.php">
				  <?php
				  foreach ($_SESSION['cart'] as $key => $product_datas) {
					$product = db_connection::init()->get_product_by_id($product_datas['product_id']);
					$sum_price += ((int) $product['price']) * ((int) $product_datas['quantity']);
					?>
					<div class="row">
					  <div class="col-xs-2"><img class="img-responsive" src="http://<?= $_SERVER['HTTP_HOST'] ?>/<?= $product['image'] != null ? $product['image'] : "images/no_image.jpg" ?>">
					  </div>
					  <div class="col-xs-4">
						<h4 class="product-name"><strong><?= $product['manufacturer'] ?> <?= $product['type'] ?></strong></h4><h4><small><?= $product['description'] ?></small></h4>
					  </div>
					  <div class="col-xs-6">
						<div class="col-xs-5 text-right">
						  <h6><strong><?= $product['price'] ?><span class="text-muted">x</span></strong></h6>
						</div>
						<div class="col-xs-4">
						  <input type="text" class="form-control input-sm" name="products[<?= $product['id'] ?>][quantity]" value="<?= $product_datas['quantity'] ?>">
						</div>
						<div class="col-xs-3">
						  <span class="btn btn-link btn-xs">
							<span class="glyphicon glyphicon-refresh" onclick="submit_form()"></span>
						  </span>
						  <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/cart/remove.php?key=<?= $key ?>" class="btn btn-link btn-xs">
							<span class="glyphicon glyphicon-trash"> </span>
						  </a>
						</div>
					  </div>
					</div>
				  <?php
				  }
				  $_SESSION['order_price'] = $sum_price;
				  ?>
  			  </form>
  			  <script>

  				function submit_form() {
  				  $("#product-update").submit();
  				}
  			  </script>
				<?php
			  }
			  ?>
			</div>
			<hr>
			<div class="panel-footer">
			  <div class="row text-center">
				<div class="col-xs-9">
				  <h4 class="text-right">Öszessen: <strong><?= $sum_price != null ? $sum_price : "0" ?> Ft</strong></h4>
				</div>
				<div class="col-xs-3">
				  <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/order.php" class="btn btn-success btn-block">
					Megrendelem
				  </a>
				</div>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	</div>
  </div>

</div>

</div>
<?php include '../footer.php'; ?>