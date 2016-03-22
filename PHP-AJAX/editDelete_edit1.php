<?php
include "dbConnect.php";
$id = $_POST['id'];
$name = $_POST['name'];
$course = $_POST['course'];

$sql="UPDATE studinfo SET sname='$name',course='$course' where studid=$id";

mysql_query($sql,$conn) or die(mysql_error());

header("Location: editDelete.php");


?>