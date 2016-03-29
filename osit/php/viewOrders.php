<?php include "database.php"; ?>
<?php $ro = new database() ?>
<?php

?>
<?php $ro->getCheckoutCustomers() ?>
<!doctype html>
<html>
	<head>
		<style>
			.centerBtn {
				text-align: center;
			}
			.fontSize {
				font-size:90%;
			}

			#ordersHandler {
				border:0px solid #ffffff;
				width:auto;
				height:650px;
				margin:auto;
				padding:10px;
				overflow:scroll;
				overflow-x:hidden;				
			}




		</style>

		<script>
		$(document).ready(function(){


			<?php foreach($ro->getCheckoutCustomers_orderID() as $id) { ?>
				$(document).on("click","#viewOrderBtn<?php echo $id ?>",function() {
					var custID<?php echo $id ?> = $("#customerID<?php echo $id ?>").val();
					var date = $("#date<?php echo $id ?>").val();

					$("#customerCart").load("viewOrdersDetails.php",{customerID:custID<?php echo $id ?>,date:date});
				});
			<?php } ?>

					
				<?php for($a=1;$a<=2;$a++) { ?>
					$(document).on("click","#pagez<?php echo $a ?>",function(){
						var page = $("#pagez<?php echo $a ?>").data("index");
						$("#middleBox_home").load("viewOrders.php",{page:page},function(){
							$("#list<?php echo $a ?>").attr("class","active");
							console.log(page);
						});
					});
				<?php } ?>



			});
		</script>


	</head>
	<body>
		<div class="col-md-6">
			<div id="ordersHandler">
			<?php foreach($ro->getCheckoutCustomers_orderID() as $id) { ?>
				<input type="hidden" id="customerID<?php echo $id ?>" value="<?php echo $ro->selectNow("customerOrder","custID","orderID",$id) ?>">
				<input type="hidden" id="date<?php echo $id ?>" value="<?php echo $ro->selectNow("customerOrder","orderDate","orderID",$ro->selectNow("customerOrder","orderID","orderID",$id)) ?>">
				<div class="panel panel-default">
					<div class="panel-heading">
						
					
						<h4 class="panel-title"><span id="orderIcon<?php echo $id ?>" class="glyphicon glyphicon-shopping-cart"></span>  <?php echo ucfirst($ro->selectNow("customer","custName","custID",$ro->selectNow("customerOrder","custID","orderID",$id))) ?><span class="pull-right fontSize"><?php echo $ro->formatDate($ro->selectNow("customerOrder","orderDate","orderID",$id)) ?></span></h4>
						
					</div>
					<div class="panel-body centerBtn">
						<input type="button" id="viewOrderBtn<?php echo $id ?>" class="btn btn-success" value="View Order">
					</div>

				</div>
			<?php } ?>
			</div>
		</div>
		<div id="customerCart" class="col-md-6">
		
		</div>
	
	</body>
</html>