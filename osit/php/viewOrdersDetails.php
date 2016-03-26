<?php include "database.php"; ?>
<?php $customerID = $_POST["customerID"] ?>
<?php $ro = new database() ?>
<?php $ro->getCustomerOrder($customerID) ?>
<?php $total=0; ?>
<html>
	<head>
		<style>
			.jumbotron {
				padding-top:2%;
				padding-left:2px;
				padding-bottom:2%;
				margin-bottom: 1%;
			}

			.totalJumbotron {
				text-align:right;
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

			img {
				width: 100%;
				height: 100%;
			}

		</style>
	</head>
	<body>
		<div class="panel panel-primary">
			<div class="panel-heading">
			
				<h4 class="panel-title">
					<?php echo ucfirst($ro->selectNow("customer","custName","custID",$customerID)) ?> Order
				</h4>
			
			</div>
		<?php foreach($ro->getCustomerOrder_orderID() as $id) {  ?>
			<?php $total += ($ro->selectNow("product","price","productID",$ro->selectNow("customerOrder","productID","orderID",$id)) * $ro->selectNow("customerOrder","quantity","orderID",$id)) ?>
			<div class="jumbotron container-fluid">
				<div class="col-md-4">
					<img src="uploads/<?php echo $ro->selectNow("product","image","productID",$ro->selectNow("customerOrder","productID","orderID",$id)) ?>">
				</div>
				<div class="col-md-8">
					<h4><?php echo $ro->selectNow("product","productName","productID",$ro->selectNow("customerOrder","productID","orderID",$id)) ?></h4>
					<h5><?php echo $ro->selectNow("customerOrder","quantity","orderID",$id) ?> pcs</h5>
					<h5>Php <?php echo number_format(($ro->selectNow("product","price","productID",$ro->selectNow("customerOrder","productID","orderID",$id)) * $ro->selectNow("customerOrder","quantity","orderID",$id)),2) ?></h5>
				</div>
			</div>
		<?php } ?>
		<div class="jumbotron totalJumbotron">
			<h3>Php <?php echo number_format($total,2) ?></h3>
		</div>
		</div>
	</body>
</html>