<?php include "database.php"; ?>
<?php session_start() ?>
<?php $ro = new database() ?>
<?php $ro->getProductList(); ?>
<?php if(!isset($_SESSION["customerName"]) && !isset($_SESSION["customerID"]) ) {
		header("Location: ../html/index.html");
	}else{ } ?>
<!doctype html>
<html>
	<head>
		<title>Juan Store</title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<script type="text/javascript" src="../css/bootstrap-3.3.5-dist/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="../css/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="../css/bootstrap-3.3.5-dist/css/bootstrap.css"></link>

		<style>
			.imgPhotoUser {
				width:100%;
				height:100% ;
				
			}

			.cartPhotoUser {
				width:50%;
				height:50% ;
				
			}

			.fixed {
        		position: fixed;
        		width: 13%;
			}

			.margin-bottom {
				margin-bottom: 5%;
			}

		</style>

		<script>
			$(document).ready(function(){ 
				var custID = $("#customerID").val();
				//$("#userCartx").load("cart.php",{custID:custID});
				$(document).on("load","#userCartx",function() {
					$.post("cart.php",{custID:custID});
				});
				<?php foreach($ro->getProductList_productID() as $id) { ?>
					var productID<?php echo $id ?> = $("#productID<?php echo $id ?>").val();
				<?php } ?>

				<?php foreach($ro->getProductList_productID() as $id) { ?>

				$("#myModal<?php echo $id ?>").on("show.bs.modal",function(event){

					
				});

					$('#myModal<?php echo $id ?>').on('hidden.bs.modal', function () {
					    $(this).find("input").val('1').end();

					});				

				$("#addOrder<?php echo $id ?>").click(function() {
					//console.log(this.id);

						var customerName = $("#customerName").val();
						var customerID = $("#customerID").val();						
						var quantity<?php echo $id ?> = $("#quantity<?php echo $id ?>").val();
						console.log(customerName);
						var myData = {
							name:customerName,
							id:customerID,
							prodID:productID<?php echo $id ?>,
							quantity:quantity<?php echo $id ?>
						}
						$.post("addOrder.php",myData,function() {
							$("#userCart").load("cart.php",{custID:customerID});
							$("#myModal<?php echo $id ?>").off("show.bs.modal");
						});


				});
				<?php } ?>

		
				
			});
		</script>

	</head>
	<body>
		<div class="row margin-bottom">
		<div class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<a href="#" class="navbar-brand">
						<img alt="Juan Store" src="../img/logo.jpg" height="30px" width="80px">
					</a>
				</div>

				<div name="navbar" class="navbar-right">
					<ul class="nav navbar-nav">
						<li><a href="redirect.php">Home</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Gallery</a></li>
					</ul>
					<div class="nav navbar-nav btn-group">
					<button class="btn btn-info navbar-btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="userBtn"><?php echo ucfirst($_SESSION['customerName']) ?>
					<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a hreg="#">Signout</a></li>
					</ul>
					</div>
				</div>


			</div>
		</div>
		</div>



		<div class="row">
		<div class="container">
		<input type="hidden" name="customerName" id="customerName" value="<?php echo $_SESSION["customerName"] ?>">
		<input type="hidden" name="customerID" id="customerID" value="<?php echo $_SESSION["customerID"] ?>">
		<div class="row">

			


			<div class="col-md-4">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h4 class="panel-title"><?php echo ucfirst($_SESSION["customerName"])."'s" ?> Cart</h4>
					</div>
					<div id="userCartx" class="panel-body">
						
					</div>					
				</div>
			</div>

		</div>
		</div>
		</div>
	</body>
</html>