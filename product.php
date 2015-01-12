<?php
session_start();
include 'header.php';
include 'db_connection.php';
error_reporting(E_ALL);
ini_set('display_errors', "on");
$products = db_connection::init()->products()->product_category($_GET['category'])->get();
?>
<div class="container">

  <div class="row">

	<?php include 'menu.php'; ?>

	<div class="col-md-9">

	  <div class="row">
		<?php
		foreach ($products as $product) {
		  include 'product_mini.php';
		}
		?>
	  </div>

	</div>

  </div>>

</div>

</div>
<?php include 'footer.php'; ?>