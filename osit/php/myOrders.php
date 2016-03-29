<?php
session_start();
include "database.php";
$ro = new database();
$ro->getMyOrders($_SESSION['customerID']);

?>

<!doctype html>
<html>
	<head>
		<title>My Orders</title>
		<script>

			$(document).on("click","#viewMyOrder",function() {
				$("#cartDiv").load("myOrders_item.php");
			});

		<?php foreach($ro->getMyOrders_orderID() as $id ) { ?>
			$(document).on("click","#viewMyOrder<?php echo $id ?>",function() {
				var date = $("#date<?php echo $id ?>").val();
				$("#itemList").load("myOrders_item.php",{date:date});
			});
		<?php } ?>
		
		</script>
	</head>
	<body>	
	
	<div class="row">

	<div id="itemList" class="col-md-7">
		<div class="jumbotron container-fluid">
			
		</div>
	</div>


	<div class="col-md-2">
	<?php foreach($ro->getMyOrders_orderID() as $id) { ?>
		<div class="panel panel-default">
		<input type="hidden" id="date<?php echo $id ?>" value="<?php echo $ro->selectNow("customerOrder","orderDate","orderID",$id) ?>">
			<div class="panel-heading">
				<h5 class="panel-title"><i class="glyphicon glyphicon-shopping-cart"></i>  <?php echo $ro->formatDate($ro->selectNow("customerOrder","orderDate","orderID",$id)) ?></h5>
			</div>
			<div class="panel-body">
				<center><input type="button" id="viewMyOrder<?php echo $id ?>" class="btn btn-success" value="View My Order"></center>
			</div>
		</div>
	<?php } ?>
	</div>


	</div>

	</body>
</html>