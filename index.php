<?php
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
ini_set('display_errors', "on");
include 'db_connection.php';
$products = db_connection::init()->products()->get();
$categories = db_connection::init()->categories()->get();
?>

<?php include 'header.php'; ?>

<div class="container">

  <div class="row">

	<?php include 'menu.php'; ?>

	<div class="col-md-9">

	  <div class="row carousel-holder">

		<div class="col-md-12">
		  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
			  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
			  <li data-target="#carousel-example-generic" data-slide-to="1"></li>
			  <li data-target="#carousel-example-generic" data-slide-to="2"></li>
			</ol>
			<div class="carousel-inner">
			  <div class="item active">
				<img class="slide-image" src="http://placehold.it/800x300" alt="">
			  </div>
			  <div class="item">
				<img class="slide-image" src="http://placehold.it/800x300" alt="">
			  </div>
			  <div class="item">
				<img class="slide-image" src="http://placehold.it/800x300" alt="">
			  </div>
			</div>
			<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
			  <span class="glyphicon glyphicon-chevron-left"></span>
			</a>
			<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
			  <span class="glyphicon glyphicon-chevron-right"></span>
			</a>
		  </div>
		</div>

	  </div>

	  <div class="row">
		<?php foreach ($products as $product) { ?>
  		<div class="col-sm-4 col-lg-4 col-md-4">
  		  <div class="thumbnail">
  			<img src="http://<?= $_SERVER['HTTP_HOST'] ?>/<?= $product['image'] ?>" alt="">
  			<div class="caption">
  			  <h4 class="pull-right"><?= $product['price'] ?></h4>
  			  <h4><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/product/?id=<?= $product['id'] ?>"><?= $product['type'] ?></a>
  			  </h4>
  			  <p><?= $product['description'] ?></p>
  			</div>
  			<button type="button" class="btn btn-success btn-block">
  			  Checkout
  			</button>
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