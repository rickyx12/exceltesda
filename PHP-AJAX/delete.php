<?php
include "dbConnect.php";
$id = $_POST['id'];


$sql="DELETE FROM studinfo where studid=$id";

mysql_query($sql,$conn) or die(mysql_error());

header("Location: editDelete.php");


?>