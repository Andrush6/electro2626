<?php

class authentication {

  public static function authenticationing(){
	if (!self::is_authenticated()){
	  if (self::login_datas_exist()){
		self::login();
	  }
	  self::show_login_form();
	  exit();
	}
  }
  
  public static function login_datas_exist(){
	$datas = $_POST;
	return (isset($datas['username']) && isset($datas['passwd']));
  }

  public static function is_authenticated() {
	return @$_SESSION['authenticated'] == true;
  }

  public static function login() {
	$datas = $_POST;
	if ($datas['username'] == "admin" && $datas['passwd'] == "admin") {
	  $_SESSION['authenticated'] = true;
	  header('Location: '.$_SERVER['REQUEST_URI']);
	}
  }

  public static function logout() {
	unset($_SESSION['authenticated']);
	header('Location: /');
  }

  public static function show_login_form() {
	include 'login_form.php';
  }

}
