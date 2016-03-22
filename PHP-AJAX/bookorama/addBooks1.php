<?php
include "dbConnect.php";
$bookName = $_POST['bookName'];
$category = $_POST['category'];
$author = $_POST['author'];


//echo $bookName."<br>".$category."<br>".$author;

echo "<script src='jquery-2.1.4.min.js'></script>";
echo "
<script>
	$(document).ready(function(){
		$('#rightContainer').fadeOut(3000);	
	});
</script>

";

$sql = "INSERT INTO books VALUES('','$bookName','$category','$author')";
mysql_query($sql,$conn) or die(mysql_error());

echo "Books Added";
mysql_close($conn);

?>