<?php
include "dbConnect.php";
$id = $_POST['id'];
$name = $_POST['name'];
$course = $_POST['course'];

$sql = "INSERT INTO studinfo VALUES('$id','$name','$course')";

mysql_query($sql,$conn) or die(mysql_error());

echo "Record Saved";

?>