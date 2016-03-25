<?php include "database.php"; ?>
<?php include "session.php"; ?>
<?php $ro = new database() ?>
<!doctype html>
<html>
	<head>
		<script type="text/javascript">

			$("#addProductError").hide();	
			//Program a custom submit function for the form
			$("#addProductForm").submit(function(event){
 
  			//disable the default form submission
  			event.preventDefault();
 			

  			//grab all form data  
  			var formData = new FormData($(this)[0]);
 
  			console.log(formData);

  			if($("#productName").val() == "" || $("#productPrice").val() == "" || $("#productGender").val() == "" || $("#productCategory").val() == "" || $("#productPhoto").val() == "" ) {
  				$("#addProductError").show();
  			}else {
  			$.ajax({
    			url: 'addProduct.php',
    			type: 'POST',
    			data: formData,
    			async: false,
    			cache: false,
    			contentType: false,
    			processData: false,
    			success: function (returndata) {
      				alert("Product Added");
      				location.reload();
    			}
  			});
  			}
 			
  			return false;
			});			

		</script>


	</head>
	<body>
		<h1></h1>

		<div class="col-md-3"></div>

		<div class="col-md-6">
			<div id="addProductError" class="alert alert-danger">Sorry,Pls fill up all the fields</div>
			<div class="panel panel-default" id="newProductForm">
				<div class="panel-heading">
					<h4 class="panel-title">New Product</h4>
				</div>
				<div class="panel-body">
				<form id="addProductForm">
				<div class="form-group">
					<input type="text" id="productName" name="productName" class="form-control" autocomplete="off" placeholder="Product Name">
					<input type="text" id="productPrice" name="productPrice" class="form-control" autocomplete="off" placeholder="Price">
					<Br>
					<label class="radio-inline"><input type="radio" name="productGender" value="M">Male</label>
					<label class="radio-inline"><input type="radio" name="productGender" value="F">Female</label>

					<div class="form-group">
						<br>
						<label for="category">Category:</label>
						<select class="form-control" name="productCategory" id="category">
							<option></option>
							<?php $ro->getCategory() ?>
						</select>
					</div>
						
							<input type="file" id="productPhoto" name="fileToUpload" id="fileToUpload">	
					<Br>
					<center><input type="submit" class="btn btn-primary" id="addProduct_btn" value="Add Product"></center>
				</div>
				</form>
				</div>
			</div>		
		</div>

		<div class="col-md-3"></div>
	
	</body>
</html>