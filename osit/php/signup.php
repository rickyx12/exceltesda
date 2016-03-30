<?php
include "database.php";
session_start();
$ro = new database();

//$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$address = $_POST['address'];
$contactNo = $_POST['contactNo'];

$customerInfo = array(
"custName" => $name,
"address" => $address,
"contactNo" => $contactNo,
"username" => strtok($name," "),
"password" => $password
);
/*
$customerAcct = [
"username" => $username,
"password" => $password,
"usertype" => "user"
];
*/
$ro->insertNow("customer",$customerInfo);
//$ro->insertNow("userAccount",$customerAcct);
$_SESSION["customerName"] = $name;
$_SESSION["customerID"] = $ro->insertNow_lastID();


?>