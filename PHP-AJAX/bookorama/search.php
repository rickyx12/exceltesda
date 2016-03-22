<?php
include "dbConnect.php";

$search = $_POST['search'];

$sql = "SELECT * FROM books WHERE bookName like '$search%' ";

$res = mysql_query($sql,$conn) or die(mysql_error());
echo "<script src='jquery-2.1.4.min.js'></script>";
echo "
<script>

$(document).ready(function(){
	$('#closeResult').click(function(){
		$('#rightContainer').fadeOut(2000);
	});
});

</script>";
echo "<link rel='stylesheet' href='home.css'></link>";
echo "<a href='#' id='closeResult'><img src='close.png'></a>";
echo "<center><table id='bookTable'>";
echo "<tr>";
echo "<th>Book Name</th>";
echo "<th>Category</th>";
echo "<th>Author</th>";
echo "</tr>";
while($row=mysql_fetch_array($res)) {
echo "<tr>";
echo "<td>".$row['bookName']."</td>";
echo "<td>".$row['category']."</td>";
echo "<td>".$row['author']."</td>";
echo "</tr>";
}
echo "</table>";
echo "<Br>";

?>