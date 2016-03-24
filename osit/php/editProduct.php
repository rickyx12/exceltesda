<?php include "database.php" ?>
<?php $ro = new database() ?>
<?php

$productID = $_POST['productID'];
$productName = $_POST['productName'];
$productPrice = $_POST['productPrice'];
$productGender = $_POST['productGender'];
$productCategory = $_POST['productCategory'];
$productPhoto = $_POST['productPhoto'];

?>
<!doctype html>
<html>
	<head>
		<style>
			#productPhoto {
				width: 20%;
				height: 20%;
			}
		</style>

		<script type="text/javascript">
			$("#editProductError").hide();

			//Program a custom submit function for the form
			$("#editProductForm").submit(function(event){
 
  			//disable the default form submission
  			event.preventDefault();
 
  			//grab all form data  
  			var formData = new FormData($(this)[0]);
 
  			console.log(formData);

  			$.ajax({
    			url: 'editProduct1.php',
    			type: 'POST',
    			data: formData,
    			async: false,
    			cache: false,
    			contentType: false,
    			processData: false,
    			success: function (returndata) {
      				alert("Product Updated");
      				location.reload();
    			}
  			});
 
  			return false;
			});			


		</script>
	</head>
	<body>
		<h1></h1>

		<div class="col-md-3"></div>

		<div class="col-md-6">
			<div id="editProductError" class="alert alert-danger">Sorry,Pls fill up all the fields</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h4 class="panel-title">Update Product</h4>
				</div>
				<div class="panel-body">
				<form id="editProductForm">
				<div class="form-group">
					<input type="hidden" name="productID" value="<?php echo $productID ?>">
					<input type="text" id="productName" name="productName" class="form-control" autocomplete="off" placeholder="Product Name" value="<?php echo $productName ?>">
					<input type="text" id="productPrice" name="productPrice" class="form-control" autocomplete="off" placeholder="Price" value="<?php echo $productPrice ?>">
					<Br>
					<?php if($productGender == "F") { ?>
					<label class="radio-inline"><input type="radio" name="productGender" value="M">Male</label>
					<label class="radio-inline"><input type="radio" name="productGender" value="F" checked>Female</label>
					<?php }else { ?>
					<label class="radio-inline"><input type="radio" name="productGender" value="M" checked>Male</label>
					<label class="radio-inline"><input type="radio" name="productGender" value="F">Female</label>					
					<?php } ?>
						<br>
						<label for="category">Category:</label>
						<select class="form-control" name="productCategory" id="category">
							<option value="<?php echo $productCategory ?>" ><?php echo $ro->selectNow("category","catName","catID",$productCategory) ?></option>
							<?php $ro->getCategory() ?>
						</select>
						<br>
							<img src="uploads/<?php echo $productPhoto ?>" id="productPhoto">
							<br><br>
							<input type="file" name="productPhoto" id="fileToUpload" value="<?php echo $productPhoto ?>">	
						<br>
					<center><input type="submit" class="btn btn-primary" id="editProduct_btn" value="Update"></center>
				</div>
				</form>
				</div>
			</div>		
		</div>

		<div class="col-md-3"></div>
	
	</body>
</html>