<?php include "database.php"; ?>
<?php $ro = new database() ?>
<?php $ro->getProductList(""); ?>
<!doctype html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<script type="text/javascript" src="../css/bootstrap-3.3.5-dist/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="../css/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../css/bootstrap-3.3.5-dist/css/bootstrap.css"></link>

		<style>
			.thumbnail {
				width: 100%;
				height:100%;
			}
		</style>


	</head>
	<body>
	
	<div class="container">	

	<?php foreach($ro->getProductList_productID() as $id) { ?>
	<div class="col-md-7">
		<div class="jumbotron container-fluid">
			<div class="col-md-4">
				<img src="../php/uploads/<?php echo $ro->selectNow('product','image','productID',$id) ?>" class="thumbnail">
			</div>
			<div col-md-8>
				<h3><?php echo $ro->selectNow("product","productName","productID",$id) ?></h3>
				<h4>Php <?php echo number_format($ro->selectNow("product","price","productID",$id)) ?> <span class="glyphicon glyphicon-tags"></span></h4>
				<span class="glyphicon glyphicon-lock"></span> <label>Signup to shop this item</label>
				<h6>
					Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
				</h6>
			</div>
		</div>
	</div>
	<?php } ?>

	</div>
	</body>
</html>