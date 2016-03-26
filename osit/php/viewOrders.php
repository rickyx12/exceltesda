<?php include "database.php"; ?>
<?php $ro = new database() ?>
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
		</style>

		<script>
			<?php foreach($ro->getCheckoutCustomers_customerID() as $id) { ?>
				$(document).on("click","#viewOrderBtn<?php echo $id ?>",function() {
					var custID<?php echo $id ?> = $("#customerID<?php echo $id ?>").val();

					$("#customerCart").load("viewOrdersDetails.php",{customerID:custID<?php echo $id ?>},function() {
						//console.log(custID<?php echo $id ?>);
						$.post("orderSeen.php",{customerID:custID<?php echo $id ?>},function() {
							$("#orderIcon<?php echo $id ?>").attr("class","glyphicon glyphicon-ok");
						});
					});
				});
			<?php } ?>
		</script>


	</head>
	<body>
		<div class="col-md-6">
		
			<?php foreach($ro->getCheckoutCustomers_customerID() as $id) { ?>
				<input type="hidden" id="customerID<?php echo $id ?>" value="<?php echo $id ?>">
				<div class="panel panel-default">
					<div class="panel-heading">
						
					<?php if($ro->selectNow("customerOrder","seen","custID",$id) == "") { ?>
						<h4 class="panel-title"><span id="orderIcon<?php echo $id ?>" class="glyphicon glyphicon-envelope"></span>  <?php echo ucfirst($ro->selectNow("customer","custName","custID",$id)) ?><span class="pull-right fontSize"><?php echo $ro->formatDate($ro->selectNow("customerOrder","orderDate","custID",$id)) ?></span></h4>
					<?php }else { ?>
						<h4 class="panel-title"><span id="orderIcon<?php echo $id ?>" class="glyphicon glyphicon-ok"></span>  <?php echo ucfirst($ro->selectNow("customer","custName","custID",$id)) ?><span class="pull-right fontSize"><?php echo $ro->formatDate($ro->selectNow("customerOrder","orderDate","custID",$id)) ?></span></h4>					

					<?php } ?>

					</div>
					<div class="panel-body centerBtn">
						<input type="button" id="viewOrderBtn<?php echo $id ?>" class="btn btn-success" value="View Order">
					</div>

				</div>
			<?php } ?>
		</div>

		<div id="customerCart" class="col-md-6">
			
		</div>
		
	</body>
</html>