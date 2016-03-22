<?php
include "dbConnect.php";

$bookid = $_POST['bookid'];

$sql = "DELETE FROM books WHERE bookid=$bookid";

mysql_query($sql,$conn) or die(mysql_error());

echo "Book Deleted";

?>