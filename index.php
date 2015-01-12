<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED);
ini_set('display_errors', "on");
include_once 'db_connection.php';
$products = db_connection::init()->products()->get();
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
		<?php
		foreach ($products as $product) {
		  include 'product_mini.php';
		}
		?>
	  </div>

	</div>

  </div>

</div>
<?php include 'footer.php'; ?>