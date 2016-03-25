<?php
include "database.php";
$ro = new database();
$id="20";
$total = 0;
$ro->getCustomerOrder($id);
?>
<!doctype html>
<html>
	<head>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<script type="text/javascript" src="../css/bootstrap-3.3.5-dist/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="../css/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../css/bootstrap-3.3.5-dist/css/bootstrap.css"></link>
		<style>
			#cartThumbnail {
				width: 100%;
				height:100%;
			}

			.jumbotron {
			    padding: 0.5em 0.6em;
			    h1 {
			        font-size: 2em;
			    }
			    p {
			        font-size: 1.2em;
			        .btn {
			            padding: 0.5em;
			        }
			    }
			}

			#checkoutBtn {
				text-align: right;
			}

		</style>
	</head>
	<body>
		<?php foreach($ro->getCustomerOrder_orderID() as $id) { ?>
			<?php $total += ($ro->selectNow("product","price","productID",$ro->selectNow("customerOrder","productID","orderID",$id)) * $ro->selectNow("customerOrder","quantity","orderID",$id) ) ?>
			<div class="">
				<div class="row">
				<div class="col-md-4">
					<img id="cartThumbnail" src="uploads/<?php echo $ro->selectNow("product","image","productID",$ro->selectNow("customerOrder","productID","orderID",$id)) ?>">
				</div>
				<div class="col-md-8">
					<h4><?php echo $ro->selectNow("product","productName","productID",$ro->selectNow("customerOrder","productID","orderID",$id)) ?></h4>
					<h5><?php echo $ro->selectNow("customerOrder","quantity","orderID",$id) ?> pcs</h5>
					<h4>Php <?php echo number_format(($ro->selectNow("product","price","productID",$ro->selectNow("customerOrder","productID","orderID",$id)) * $ro->selectNow("customerOrder","quantity","orderID",$id) ),2); ?> </h4>
					<input type="button" class="btn btn-danger" value="Remove To Cart">
				</div>
				</div>
			</div>
			<br><hr>
		<?php } ?>
		<div class="jumbotron container-fluid">
			<h4>Php <?php echo number_format($total,2) ?></h4>
		</div>
		<div id="checkoutBtn">
			<input type="button" class="btn btn-success" value="Checkout >>">
		</div>
	</body>
</html>
