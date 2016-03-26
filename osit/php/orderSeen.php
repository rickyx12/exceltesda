<?php
include "database.php";
$customerID = $_POST["customerID"];
$ro = new database();

$ro->editNow("customerOrder","seen",date("Y-m-d H:i:s"),"custID",$customerID);

?>