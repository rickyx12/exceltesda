<?php
session_start();
include "database.php";
$date = $_POST['date'];
$ro = new database();

$ro->getMyOrdersList($_SESSION["customerID"],$date);

?>

<style>
	#photo {
		width: 100%;;
		height: 100%;
	}
</style>


<?php foreach($ro->getMyOrdersList_orderID() as $id) { ?>
	<div class="jumbotron container-fluid">
		
		<div class="col-md-4">
		<img src="uploads/<?php echo $ro->selectNow("product","image","productID",$ro->selectNow("customerOrder","productID","orderID",$id)) ?>" id="photo" class="img-rounded" >
		</div>

		<div class="col-md-8">
			<h3><?php echo $ro->selectNow("product","productName","productID",$ro->selectNow("customerOrder","productID","orderID",$id)) ?> <i class="glyphicon glyphicon-tag"></i> </h3>
			<h4>Php <?php echo number_format($ro->selectNow("product","price","productID",$ro->selectNow("customerOrder","productID","orderID",$id)),2) ?></h4>
			<h6>
				Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur
			</h6>
		</div>

		</div>		
<?php } ?>
