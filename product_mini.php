
<div class="col-sm-4 col-lg-4 col-md-4">
  <div class="thumbnail">
	<img src="http://<?= $_SERVER['HTTP_HOST'] ?>/<?= $product['image'] != null ? $product['image'] : "images/no_image.jpg" ?>" alt="">
	<div class="caption">
	  <h4 class="pull-right"><?= $product['price'] ?></h4>
	  <h4><a href="http://<?= $_SERVER['HTTP_HOST'] ?>/product/?id=<?= $product['id'] ?>"><?= $product['type'] ?></a>
	  </h4>
	  <p><?= $product['description'] ?></p>
	</div>
	<a href="http://<?= $_SERVER['HTTP_HOST'] ?>/cart/add.php?product_id=<?= $product['id'] ?>" class="btn btn-success btn-block">
	  Kosárba
	</a>
  </div>
</div>