<?php
session_start();

if(!isset($_SESSION["customerName"]) && !isset($_SESSION["customerID"])) {
echo "No Session for customer";
}else {

include "database.php";
$ro = new database();
$customerID = $_POST["custID"];
$total = 0;
$ro->getCustomerOrder($customerID);
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

			.checkoutImg {
				height: 40%;
				width: 40%;
			}

			#myModal {
				text-align: center;
			}

		</style>

		<script>
			
			$(document).ready(function() {
				<?php if($ro->selectNow("customerOrder","orderID","custID",$customerID) != "" ) { ?>
				<?php foreach($ro->getCustomerOrder_orderID() as $id) { ?>
				$(document).on("click","#removeCart<?php echo $id ?>",function() {
					var order<?php echo $id ?> = $("#orderID<?php echo $id ?>").val();
					console.log(order<?php echo $id ?>);
					$myData = {
						orderID:order<?php echo $id ?>
					}
					$.post("removeCart.php",$myData,function() {
						$("#userCart").load("cart.php",{custID:<?php echo $customerID ?>});
					});
				});
				<?php } ?>
				<?php }else { } ?>

				$("#checkoutBtn").click(function() {
					$.post("checkout.php",{customerID:<?php echo $customerID ?>},function(data) {
					});
				});

				$("#myModal").on("hidden.bs.modal",function() {
					window.location = "../html/index.html";
				});

			});
				
		</script>
	</head>
	<body>
		<div class="mainBox">
		<?php if($ro->selectNow("customerOrder","orderID","custID",$customerID)) { ?>
		<?php foreach($ro->getCustomerOrder_orderID() as $id) { ?>
			<?php $total += ($ro->selectNow("product","price","productID",$ro->selectNow("customerOrder","productID","orderID",$id)) * $ro->selectNow("customerOrder","quantity","orderID",$id) ) ?>
			<div class="">
			<input type="hidden" id="orderID<?php echo $id ?>" value="<?php echo $id ?>">
				<div class="row">
				<div class="col-md-4">
					<img id="cartThumbnail" src="uploads/<?php echo $ro->selectNow("product","image","productID",$ro->selectNow("customerOrder","productID","orderID",$id)) ?>">
				</div>
				<div class="col-md-8">
					<h4><?php echo $ro->selectNow("product","productName","productID",$ro->selectNow("customerOrder","productID","orderID",$id)) ?></h4>
					<h5><?php echo $ro->selectNow("customerOrder","quantity","orderID",$id) ?> pcs</h5>
					<h4>Php <?php echo number_format(($ro->selectNow("product","price","productID",$ro->selectNow("customerOrder","productID","orderID",$id)) * $ro->selectNow("customerOrder","quantity","orderID",$id) ),2); ?> </h4>
					<input type="button" id="removeCart<?php echo $id ?>" class="btn btn-danger" value="Remove To Cart">
				</div>
				</div>
			</div>
			<br><hr>
		<?php } ?>
		<?php } ?>
		<div class="jumbotron container-fluid">
			<h4>Php <?php echo number_format($total,2) ?></h4>
		</div>
		<div id="checkoutBtn">
			<?php if($ro->selectNow("customerOrder","orderID","custID",$customerID) != "") { ?>
			<input type="button" id="checkoutBtn" class="btn btn-success" data-toggle="modal" data-target="#myModal" value="Checkout >>">
			<?php } ?>
		</div>

			<!-- Modal -->
			<div id="myModal" class="modal fade" role="dialog">
			  <div class="modal-dialog">

			    <!-- Modal content-->
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal">&times;</button>
			        <h4 class="modal-title">Juan Store</h4>
			      </div>
			      <div class="modal-body">
			      		<img src="../img/logo2.jpg" class="checkoutImg">
			        <p>Thank you for shopping <?php echo $_SESSION["customerName"] ?></p>
			      </div>
			      <div class="modal-footer">
			        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			      </div>
			    </div>

			  </div>
			</div>

		</div>
	</body>
</html>
<?php } ?>