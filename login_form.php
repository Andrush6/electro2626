<html>
  <head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://<?= $_SERVER['HTTP_HOST']?>/css/main.css" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="http://<?= $_SERVER['HTTP_HOST']?>/js/jquery-2.1.3.min.js"></script>
	<script type="text/javascript" src="http://<?= $_SERVER['HTTP_HOST']?>/js/bootstrap.js"></script>
  </head>
<form class="form-inline" action="" method="POST" >
  <div class="form-group">
    <label class="sr-only" for="username">User</label>
    <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
  </div>
  <div class="form-group">
    <label class="sr-only" for="passwd">Password</label>
    <input type="password" class="form-control" id="passwd" placeholder="Password" name="passwd">
  </div>
  <input type="submit" class="btn btn-default" value="Login">
</form>