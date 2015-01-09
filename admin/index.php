<?php
error_reporting(E_ALL);
ini_set('display_errors', "on");

session_start();

include '../authentication.php';
if(isset($_GET['logout'])){
  authentication::logout();
}
authentication::authenticationing(); ?>

zsir
<a href="/admin?logout">nemzsir</a>