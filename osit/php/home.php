<?php include "session.php" ?>
<?php include "database.php" ?>
<?php $ro = new database() ?>
<!doctype html>
<html>
	<head>
		<title>Juan Store</title>
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<script type="text/javascript" src="../css/bootstrap-3.3.5-dist/jquery-2.1.4.min.js"></script>
		<script type="text/javascript" src="../css/bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/jquery.bxslider/jquery.bxslider.min.js"></script>
		<script type="text/javascript" src="../js/jquery.form.js"></script>
		<link rel="stylesheet" href="../css/bootstrap-3.3.5-dist/css/bootstrap.css"></link>
		<link rel="stylesheet" href="../js/jquery.bxslider/jquery.bxslider.css"></link>

		<script>

			$(document).ready(function(){

				$("#newProductForm").hide();
				$("#addProductError").hide();


				$("#signoutBtnz").click(function(){
					$.post("signout.php",function(data){
						if(data == "signout"){
							window.location = "../html/index.html";
						}
					});
				});
				
				$(document).on("click","#addProduct_links",function(){
					//$("#newProductForm").show();
					$("#middleBox_home").load("addNewProduct.php");	
				});

				$(document).on("click","#viewProduct_links",function(event){
					$("#middleBox_home").load("products.php");
				})

			});
		</script>

		<style>

		</style>

	</head>
	<body>
		<div class="navbar navbar-default">
			<div class="container">
				<div class="navbar-header">
					<a href="#" class="navbar-brand">
						<img alt="Juan Store" src="../img/logo.jpg" height="30px" width="80px">
					</a>
				</div>

				<div name="navbar" class="navbar-right">
					<ul class="nav navbar-nav">
						<li><a href="#">Home</a></li>
						<li><a href="#">About Us</a></li>
						<li><a href="#">Contact</a></li>
						<li><a href="#">Gallery</a></li>
					</ul>
					<div class="nav navbar-nav btn-group">
					<button class="btn btn-info navbar-btn navbar-right dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="userBtn"><?php echo $_SESSION['user'] ?>
					<span class="caret"></span>
					</button>
					<ul class="dropdown-menu">
						<li><a id="addProduct_links" href="#">Add Prodcuct</a></li>
						<li><a id="viewProduct_links" href="#">View Product</a></li>
						<li><a href="#">Orders</a></li>
						<li role="seperator" class="divider"></li>
						<li><a id="signoutBtnz" href="#">Sign Out</a></li>
					</ul>
					</div>
				</div>


			</div>
		</div>
		<div class="container">
		<div class="row">

			<div class="col-md-2">
				
				<div class="panel panel-default">
					<div class="panel-body">
						<input type="text" class="form-control" placeholder="Search Item">
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
			
			<div class="col-md-10" id="middleBox_home"></div>

		</div>
		</div>
	</body>
</html>