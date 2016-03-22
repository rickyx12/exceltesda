<?php
include "dbConnect.php";
$bookName = $_POST['bookName'];
$category = $_POST['category'];
$author = $_POST['author'];


//echo $bookName."<br>".$category."<br>".$author;

$sql = "INSERT INTO books VALUES('','$bookName','$category','$author')";
mysql_query($sql,$conn) or die(mysql_error());

echo "Books Added";
?>