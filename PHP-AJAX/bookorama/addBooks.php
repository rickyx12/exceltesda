
<script language="javascript" src="jquery-2.1.4.min.js"></script>
<link rel="stylesheet" href="home.css"></link>

<script>
$(document).ready(function(){

		$("#insertBook").click(function(){
		var bookName1 = $("#bookName").val();
		var category1 = $("#category").val();
		var author1 = $("#author").val();
		var myData = "bookName="+bookName1+"&category="+category1+"&author="+author1;
		
		$.ajax({
		type: "POST",
		url: "addBooks1.php",
		data:myData,
		success:function(x){
			$("#rightContainer").html(x);
		}
		});
		
		/*
		$.post("addBooks1.php",{bookName:bookName1,category:category1,author:author1},function(data){
			$("#rightContainer").html(data);
			$.ajaxSetup({async: false});
		});
		*/
		});

});
</script>
<center>
<div id="addBook">
<font size=3>Add Book</font>
<br>
<input type="text" id="bookName" placeholder="bookName">
<br>
<input type="text" id="category" placeholder="Category">
<Br>
<input type="text" id="author" placeholder="Author">
<br>
<input type="button" id="insertBook" value="Add">
</div>