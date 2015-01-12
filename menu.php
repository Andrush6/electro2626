<?php
include_once 'db_connection.php';
$categories = db_connection::init()->categories()->get();
?>
<div class="col-md-3">
  <a href="http://<?= $_SERVER['HTTP_HOST'] ?>/"class="lead">Electro 2626</a>
  <div class="list-group">
	<?php foreach ($categories as $category) { ?>
  	<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/product.php?category=<?= $category['id'] ?>" class="list-group-item"><?= $category['name'] ?></a>
	<?php } ?>
  </div>
</div>
