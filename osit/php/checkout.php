<?php
session_start();
include "database.php";

$customerID = $_POST["customerID"];

$ro = new database();

//echo $customerID;

$ro->editNow("customerOrder","status","checkout","custID",$customerID);


?>