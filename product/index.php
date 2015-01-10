<?php
include '../header.php'; 
include '../db_connection.php';
error_reporting(E_ALL);
ini_set('display_errors', "on");
$product = db_connection::init()->get_product_by_id($_GET['id']);
$categories = db_connection::init()->categories()->get();
?>
<div class="container">

        <div class="row">

            <?php include '../menu.php'; ?>

            <div class="col-md-9">

                <div class="thumbnail">
                    <img class="img-responsive" src="http://placehold.it/800x300" alt="">
                    <div class="caption-full">
                        <h4 class="pull-right"><?= $product['price'] ?></h4>
                        <h4><?= $product['manufacturer'] ?></h4>
                        <h4><?= $product['type'] ?></h4>
                        
                        <p><?= $product['description'] ?></p>
                    </div>
                    <div class="ratings">
                        <p class="pull-right">3 reviews</p>
                        <p>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            4.0 stars
                        </p>
                    </div>
                </div>

                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                </div>

            </div>

        </div>

    </div>
<?php include '../footer.php'; ?>