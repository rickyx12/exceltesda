<?php
include "dbConnect.php";

$id = $_POST['id'];

echo "<script language='javascript' src='jquery-2.1.4.min.js'></script>";
//echo "<script language='javascript' src='bookorama.js'></script>";

echo "
<script>
	$('#updateNow').click(function(){
		 
		 var bookid1 = $('#bookid').val();
		 var bookName1 = $('#bookName').val();
		 var category1 = $('#category').val();
		 var author1 = $('#author').val();
		 
		$.post('editNow.php',{bookid:bookid1,bookName:bookName1,category:category1,author:author1},function(data){
			$('#rightContainer').html(data);
			$('#rightContainer').fadeOut(2000);
		});
		
	});
</script>

";


$sql = "SELECT * from books where bookid = '$id' ";

$result = mysql_query($sql,$conn) or die(mysql_error());

echo "<center>";
echo "Update Book<Br>";
while($row = mysql_fetch_array($result)) {
	echo "<input type='hidden' id='bookid' autocomplete='off' value='$id'>";
	echo "<input type='text' id='bookName' autocomplete='off' value='$row[bookName]'>";
	echo "<br>";
	echo "<input type='text' id='category' autocomplete='off' value='$row[category]'>";
	echo "<Br>";
	echo "<input type='text' id='author' autocomplete='off' value='$row[author]'>";
	echo "<br>";
	echo "<input type='button' id='updateNow' value='Update'>";
}

?>