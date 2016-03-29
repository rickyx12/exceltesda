<?php include "database.php"; ?>
<?php session_start() ?>
<?php $ro = new database() ?>
<?php $ro->getProductList(""); ?>
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

			body {
				padding-top:70px;
			}
			.imgPhotoUser {
			    max-width: 200px;
			    max-height: 600px;
			    height: auto;
			    width: auto;				
			}

			.cartPhotoUser {
			    max-width: 200px;
			    max-height: 300px;
			    height: auto;
			    width: auto;				
			}

			.fixed {
        		position: fixed;
        		width: 13%;
			}

			#middleBox_user {
				border:0px solid #ffffff;
				width:50%;
				height:650px;
				margin:auto;
				padding:10px;
				overflow:scroll;
				overflow-x:hidden;				
			}

			#brandLogo {
			    max-width: 100px;
			    max-height: 30px;
			    height: auto;
			    width: auto;					
			}


			
		</style>

		<script>
			$(document).ready(function(){ 
				var custID = $("#customerID").val();
				$("#userCart").load("cart.php",{custID:custID});
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

		
				
					$("#signOutBtn").click(function() {
						window.location = "redirect.php";
					});

					$(document).on("click","#myOrders",function() {
						$("#mid-right-box").load("myOrders.php");
						$("#cartDiv").hide();
					});


					$(document).on("keydown","#searchTxt",function(event) {	

						var searchItem = $("#searchTxt").val();

						if(event.which == 13) {	
							$("#mid-right-box").load("user.php #middleBox_user",function() {
								$("#middleBox_user").load("search.php",{search:searchItem},function(){
									$("#searchTxt").val("");
									$("#searchTxt").blur();
									$("#cartDiv").show();
								});
							});
						}

					});


			});
		</script>

	</head>
	<body>
		<div class="row">
		<div class="navbar navbar-default navbar-fixed-top">
			<div class="container">
					<a href="#" class="navbar-brand">
						<img alt="Juan Store" src="../img/logo.jpg" id="brandLogo">
					</a>
				

				<div name="navbar" class="navbar-right collapse navbar-collapse">
					<ul class="nav navbar-nav">
						<li><a href="redirect.php">Home</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Contact</a></li>
						<li><a id="galleryLink" href="user.php">Gallery</a></li>
					</ul>
					<div class="nav navbar-nav btn-group">
					<button class="btn btn-info navbar-btn navbar-right dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="userBtn"><?php echo ucfirst($_SESSION['customerName']) ?>
					<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a id="myOrders" href="#">My Orders</a></li>
						<li class="divider"></li>
						<li><a id="signOutBtn" href="#">Signout</a></li>
					</ul>
					</div>
				</div>

				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>		
					<span class="icon-bar"></span>			


			</div>
		</div>
		</div>



		<div class="row">
		<div class="container">
		<input type="hidden" name="customerName" id="customerName" value="<?php echo $_SESSION["customerName"] ?>">
		<input type="hidden" name="customerID" id="customerID" value="<?php echo $_SESSION["customerID"] ?>">
		<div class="row">

			<div class="col-md-2">
				
				<div class="panel panel-default">
					<div class="panel-body">
						<input type="text" class="form-control" id="searchTxt" placeholder="Search Item">
					</div>
				</div>
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="panel-title">Men</h4>
						</div>
						<div class="panel-body">
							Casual Shirts
							<Br>
							Jeans
							<Br>
							T-shirts
							<Br>
							Footwear
							<Br>
							Shorts
							<Br>
							Watches
						</div>
					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="panel-title">Women</h4>
						</div>
						<div class="panel-body">
							Dresses
							<br>
							Churidar Suits
							<br>
							Kurtas
							<br>
							Sandals
							<Br>
							Office Wear
							<Br>
							Artificial Jewelry
						</div>
					</div>

					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="panel-title">Kids</h4>
						</div>
						<div class="panel-body">
							Baby Apparel
							<Br>
							Girls Apparel
							<Br>
							Boys Apparel
							<Br>
							Kids Toys
						</div>
					</div>
			</div>
			<div id="mid-right-box">
			<div class="col-md-6 col" id="middleBox_user" >	
				<?php foreach($ro->getProductList_productID() as $id) { ?>
						<input type="hidden" id="productID<?php echo $id ?>" value="<?php echo $id ?>">
						<div class="jumbotron container-fluid">
							<div class="col-md-6">
								<img src="uploads/<?php echo $ro->selectNow('product','image','productID',$id) ?>" class="col-xs-12 img-rounded"></img>
							</div>

							<div class="col-md-6">
								<h2><?php echo $ro->selectNow("product","productName","productID",$id) ?></h2>
								<h4>Php <?php echo number_format($ro->selectNow("product","price","productID",$id),2) ?> </h4>
								<h5>
									Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes,
								</h5>
								<Br>
								<input type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal<?php echo $id ?>" value="Add to Cart">
							</div>
									<div id="myModal<?php echo $id ?>" class="modal fade" role="dialog">
									  <div class="modal-dialog">

									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h3 class="modal-title"><?php echo $ro->selectNow("product","productName","productID",$id) ?></h3>
									      </div>
									      <div class="modal-body container-fluid">
									        <div class="col-md-5">
									        	<center>
									    		<img src="uploads/<?php echo $ro->selectNow('product','image','productID',$id) ?>" class="cartPhotoUser">
									    		</center>
									        </div>

									        <div class="col-md-7">
									        	<div class="container">
									        		<h3>Php <?php echo number_format($ro->selectNow("product","price","productID",$id),2) ?></h3>
									        		
									        		<form class="form-horizontal">
									        		<div class="form-group">
									        		<label for="qty" class="col-sm-2 control-label">QTY</label>
									        		<div class="col-sm-4">
									        		<input type="number" name="qty" id="quantity<?php echo $id ?>" class="form-control" value="1">
									        		</div>
									        		</div>
									        		</form>
									        		
									        	</div>
									        </div>

									      </div>

									      <div class="modal-footer">
									        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
									        <button type="button" class="btn btn-success" id="addOrder<?php echo $id ?>" data-dismiss="modal">Add to Cart</button>
									      </div>
									    </div>

									  </div>
									</div>
						</div>
				<?php } ?>
			</div>
			</div>


			<div id="cartDiv" class="col-md-4">
				<div class="panel panel-success">
					<div class="panel-heading">
						<h4 class="panel-title"><?php echo ucfirst($_SESSION["customerName"])."'s" ?> Cart</h4>
					</div>
					<div id="userCart" class="panel-body">
						
					</div>					
				</div>
			</div>
			</div>
		</div>
		</div>
		</div>
	</body>
</html>