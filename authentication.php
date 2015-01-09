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
	echo '<form class="form-inline" action="" method="POST" >
  <div class="form-group">
    <label class="sr-only" for="username">Email address</label>
    <input type="text" class="form-control" id="username" placeholder="Enter email" name="username">
  </div>
  <div class="form-group">
    <label class="sr-only" for="passwd">Password</label>
    <input type="password" class="form-control" id="passwd" placeholder="Password" name="passwd">
  </div>
  <input type="submit" class="btn btn-default" value="Szajnin">
</form>';
  }

}
