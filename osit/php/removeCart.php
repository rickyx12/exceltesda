<?php
include "database.php";
$id = $_POST["orderID"];
$ro = new database();

$ro->deleteNow("customerOrder","orderID",$id);

?>