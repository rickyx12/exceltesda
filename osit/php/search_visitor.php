<?php include "database.php"; ?>
<?php $ro = new database() ?>
<?php $ro->getProductList($_POST['searchItem']); ?>
<!doctype html>
<html>
	<head>
	</head>
	<body>

				<?php if($ro->getProductList_productID() == "") { ?>
			<div class="col-md-12">
				<div class="row">
					<div id="noSearch" class="alert alert-danger">Sorry, There is no <b><?php echo $_POST["searchItem"] ?></b> in our Products</div>
				</div>
			</div>
				<?php }else { ?>

				<?php foreach($ro->getProductList_productID() as $id) { ?>
						<input type="hidden" id="productID<?php echo $id ?>" value="<?php echo $id ?>">
						<div class="jumbotron container-fluid">
							<div class="col-md-4">
								<img src="../php/uploads/<?php echo $ro->selectNow('product','image','productID',$id) ?>" class="img-responsive col-xs-12 img-rounded"></img>
							</div>

							<div class="col-md-6">
								<h2><?php echo $ro->selectNow("product","productName","productID",$id) ?></h2>
								<h4>Php <?php echo number_format($ro->selectNow("product","price","productID",$id),2) ?> <i class="glyphicon glyphicon-tag"></i></h4>
								<span class="glyphicon glyphicon-lock"></span> <label>Signup to shop this item</label>
								<h5>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
								</h5>
							</div>
						</div>
				<?php } ?>
				<?php } ?>
	</body>
</html>