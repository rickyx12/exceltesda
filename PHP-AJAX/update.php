<?php
include "dbConnect.php";
$id = $_POST['id'];
$studName = $_POST['studName'];
$course = $_POST['course'];

$sql="UPDATE studinfo SET sname='$studName',course='$course' where studid = $id";

mysql_query($sql,$conn) or die(mysql_error());

echo "Record Updated";


?>