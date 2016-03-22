<?php
include "dbConnect.php";
$bookid = $_POST['bookid'];
$bookName = $_POST['bookName'];
$category = $_POST['category'];
$author = $_POST['author'];

//echo $bookid."<br>".$category."<br>".$author;

$sql = "UPDATE books SET bookName = '$bookName',category='$category',author='$author' where bookid = $bookid ";

mysql_query($sql,$conn) or die(mysql_error());

echo "Books Updated";


?>