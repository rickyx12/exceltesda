<?php
include "dbConnect.php";

//echo "<script src='jquery-2.1.4.min.js'></script>";

$bookid = $_POST['bookid'];

$sql = "DELETE FROM books WHERE bookid=$bookid";

mysql_query($sql,$conn) or die(mysql_error());

echo "Book Deleted";

?>