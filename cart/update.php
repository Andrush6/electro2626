<?php

include '../db_connection.php';
session_start();
$products = $_POST['products'];
$message = null;
foreach ($_SESSION['cart'] as &$item) {
  $wanted_quantity = (int) $products[$item['product_id']]['quantity'];
  $product = db_connection::init()->get_product_by_id($item['product_id']);
  if ($wanted_quantity <= $product['quantity'] && $wanted_quantity > 0) {
	$item['quantity'] = $wanted_quantity;
  } else {
	$message = 'invalid_quantity';
  }
  redirect_to_cart($message);
}



//----------------------------------

function redirect_to_cart($message = null) {
  $url = "http://" . $_SERVER['HTTP_HOST'] . "/cart/show.php";
  if ($message != null) {
	$url .= "?m=" . $message;
  }
  header('Location: ' . $url);
}
