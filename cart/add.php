<?php
session_start();
include_once '../db_connection.php';

init_cart();
$id = (int) $_GET['product_id'];
$product = db_connection::init()->get_product_by_id($id);

if ($product != null) {
  if ($product['quantity'] > 0) {
	if (!is_in_cart($id)) {
	  add_to_cart($id);
	}
	redirect_to_cart();
  } else {
	redirect_to_cart('out');
  }
} else {
  redirect_to_cart('invalid_product');
}

//--------------------------------

function init_cart() {
  if (!is_array($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
  }
}

function is_in_cart($id) {
  foreach ($_SESSION['cart'] as $item) {
	if ($item['product_id'] == $id) {
	  return true;
	}
  }
  return false;
}

function add_to_cart($id) {
  $_SESSION['cart'][] = array('product_id' => $id, 'quantity' => 1);
}

function redirect_to_cart($message = null) {
  $url = "http://" . $_SERVER['HTTP_HOST'] . "/cart/show.php";
  if ($message != null) {
	$url .= "?m=" . $message;
  }
  header('Location: ' . $url);
}
