<?php
include "dbConnect.php";
echo "<html>";
echo "<head>";
echo "<script language='javascript' src='jquery-2.1.4.min.js'></script>";
//echo "<script language='javascript' src='bookorama.js'></script>";

echo "
<script>

$(document).ready(function(){
	$('#closeResult').click(function(){
		$('#rightContainer').fadeOut(2000);
	});
});

</script>";

echo "</head>";
echo "<body>";
$sql = "SELECT * FROM books order by bookName asc ";

$res = mysql_query($sql,$conn) or die(mysql_error());
echo "<a href='#' id='closeResult'><img src='close.png'></a>";
echo "<table id='bookTable'>";
echo "<tr>";
echo "<th>Book Name</th>";
echo "<th>Category</th>";
echo "<th>Author</th>";
echo "<th></th>";
echo "<th></th>";
echo "</tr>";
while($row=mysql_fetch_array($res)) {
	
echo "<tr>";
echo "<td>".$row['bookName']."</td>";
echo "<td>".$row['category']."</td>";
echo "<td>".$row['author']."</td>";
echo "<td><input type='hidden' name='bookid' id='bookid$row[bookid]' value='$row[bookid]'><input type='button' id='updateBtn$row[bookid]' value='Update'></td>";
echo "<td><input type='button' id='deleteBtn$row[bookid]' value='Delete'></td>";
echo "</tr>";


echo "
<script>
$(document).ready(function(){
 $('#updateBtn$row[bookid]').click(function(){
	 //alert($row[bookid]);
	 $('#rightContainer').fadeIn(2000,function(){
	 	 $.post('update.php',{id:$row[bookid]},function(data){
		$('#rightContainer').html(data);
	 });
	 });

	 
	 
 });
 
 $('#deleteBtn$row[bookid]').click(function(){
	 //alert($row[bookid]);
	 $.post('delete.php',{bookid:$row[bookid]},function(data){
		$('#rightContainer').html(data); 
		$('#rightContainer').fadeOut(2000);
	 });
 });

 });
</script>

";

}
echo "</table>";

echo "</body>";
echo "</html>";

?>