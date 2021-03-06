<?php
include "database.php";
$productID = $_POST['productID'];
$ro = new database();
//echo $productID;
unlink("uploads/".$ro->selectNow("product","image","productID",$productID));
$ro->deleteNow("product","productID",$productID);
?>
		<style type="text/css">
			.imgPhoto {
				width:100%;
				height:50%;
			}

			#removePhoto {
				width: 20%;
				height: 20%;
			}

		</style>

		<div id="mainBox">
		<?php $ro->getProductList(); ?>
		<div id="subBox">
		<?php foreach($ro->getProductList_productID() as $id ) { ?>
			<div id="itemBox" class="row">
			<input type="hidden" id="productID<?php echo $id ?>" value="<?php echo $id ?>">
			<input type="hidden" id="productName<?php echo $id ?>" value="<?php echo $ro->selectNow('product','productName','productID',$id); ?>">
			<input type="hidden" id="productPrice<?php echo $id ?>" value="<?php echo $ro->selectNow('product','price','productID',$id) ?>">
			<input type="hidden" id="productGender<?php echo $id ?>" value="<?php echo $ro->selectNow('product','gender','productID',$id) ?>">
			<input type="hidden" id="productCategory<?php echo $id ?>" value="<?php echo $ro->selectNow('product','catID','productID',$id) ?>">
			<input type="hidden" id="productPhoto<?php echo $id ?>" value="<?php echo $ro->selectNow('product','image','productID',$id) ?>" >

			<div class="jumbotron container-fluid">
				<div class="col-md-3">
					
						<img src="uploads/<?php echo $ro->selectNow('product','image','productID',$id) ?>" class="imgPhoto"></img>
					
				</div>

				<div class="col-md-9">
					<h2><?php echo $ro->selectNow("product","productName","productID",$id) ?></h2>
					<h4>Php <?php echo number_format($ro->selectNow("product","price","productID",$id),2) ?></h4>
					<h6>
					neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,
					</h6>

					<button id="updateBtn<?php echo $id ?>" class="btn btn-info">Update</button>
					<button class="btn btn-danger" data-toggle="modal" data-target="#myModal<?php echo $id ?>">Remove</button>

						<!-- Modal -->
						<div id="myModal<?php echo $id ?>" class="modal fade" role="dialog">
						  <div class="modal-dialog">

						    <!-- Modal content-->
						    <div class="modal-content">
						      <div class="modal-header">
						        <button type="button" class="close" data-dismiss="modal">&times;</button>
						        <h4 class="modal-title">Juan Store</h4>
						      </div>
						      <div class="modal-body">
						      	<center>
						      	<img  id="removePhoto" src="uploads/<?php echo $ro->selectNow('product','image','productID',$id) ?>">
						        <p>Are you sure you want to remove <?php echo $ro->selectNow("product","productName","productID",$id); ?>? </p>
						        </center>
						      </div>
						      <div class="modal-footer">
						        <button type="button" class="btn btn-success" data-dismiss="modal">Cancel</button>
						        <button type="button" id="removeProduct<?php echo $id ?>" class="btn btn-danger">Remove</button>
						      </div>
						    </div>

						  </div>
						</div>
				</div>
			</div>
			</div>
		<?php } ?>
		</div>
		</div>