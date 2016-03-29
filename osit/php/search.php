<?php include "database.php"; ?>
<?php $ro = new database() ?>
<?php $ro->getProductList($_POST['search']); ?>
<!doctype html>
<html>
	<head>
		<script>
			$(document).ready(function(){

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

				<?php if($ro->getProductList_productID() == "") { ?>
					<div id="noSearch" class="alert alert-danger">Sorry, There is no <b><?php echo $_POST["search"] ?></b> in our Products</div>
				<?php }else { ?>

				<?php foreach($ro->getProductList_productID() as $id) { ?>
						<input type="hidden" id="productID<?php echo $id ?>" value="<?php echo $id ?>">
						<div class="jumbotron container-fluid">
							<div class="col-md-6">
								<img src="uploads/<?php echo $ro->selectNow('product','image','productID',$id) ?>" class="img-responsive col-xs-12 img-rounded"></img>
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
				<?php } ?>
	</body>
</html>