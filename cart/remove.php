<?php
session_start();
include_once '../db_connection.php';
unset($_SESSION['cart'][$_GET['key']]);
$url = "http://" . $_SERVER['HTTP_HOST'] . "/cart/show.php";
header('Location: '.$url);
