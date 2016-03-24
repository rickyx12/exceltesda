<?php
include "database.php";

$ro = new database();

$username = $_POST['username'];
$password = $_POST['password'];
$name = $_POST['name'];
$address = $_POST['address'];
$contactNo = $_POST['contactNo'];

$customerInfo = [
"custName" => $name,
"address" => $address,
"contactNo" => $contactNo
];

$customerAcct = [
"username" => $username,
"password" => $password
];

$ro->insertNow("customer",$customerInfo);
$ro->insertNow("userAccount",$customerAcct);

?>