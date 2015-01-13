<?php
error_reporting(E_ALL);
ini_set('display_errors', "on");
include 'db_connection.php';
include 'header.php';
session_start();
$customer_datas = $_POST;

$customer_id = db_connection::init()->insert_customer($customer_datas);
$product_datas = json_encode($_SESSION['cart']);
db_connection::init()->insert_order($customer_id, $product_datas);
$_SESSION['cart'] = array();
?>

<div class="container">

  <div class="row">

	<?php include 'menu.php'; ?>
	<div class="container col-md-9">
	  <div class="row">
		<div class="alert alert-success" role="alert">A rendelést sikeresen feladtad! Munkatársunk hamarosan felveszi veled a kapcsolatot.</div>
	  </div>
	</div>
  </div>

</div>
<?php include 'footer.php'; ?>