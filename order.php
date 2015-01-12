<?php
error_reporting(E_ALL);
ini_set('display_errors', "on");
session_start();
include 'header.php';
?>
<div class="container">

  <div class="row">

	<?php include 'menu.php'; ?>
	<div class="container col-md-9">
	  <div class="row">
		<form action="buy.php" method="post">
		  <div class="form-group">
			<label for="name">Név</label>
			<input type="text" class="form-control" id="name" placeholder="ide írd be a teljes neved...">
		  </div>
		  <div class="form-group">
			<label for="email">Email cím</label>
			<input type="email" class="form-control" id="email" placeholder="ide írd be az email címed...">
		  </div>
		  <div class="form-group">
			<label for="name">Cím</label>
			<input type="text" class="form-control" id="name" placeholder="ide írd be a teljes címed...">
		  </div>
		  <div class="form-group">
			<label for="name">Telefonszám</label>
			<input type="tel" class="form-control" id="name" placeholder="ide írd be a telefonszámod...">
		  </div>
		  <button type="submit" class="btn btn-default">Megveszem</button>
		</form>
	  </div>
	</div>
  </div>

</div>
<?php include 'footer.php'; ?>