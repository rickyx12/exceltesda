<?php
include "database.php";
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$ro = new database();

if($ro->doubleSelectNow("userAccount","userID","username",$username,"password",$password) != "") {
$_SESSION['user'] = $username;
echo "admin";
} else {

if($ro->doubleSelectNow("customer","custID","username",$username,"password",$password) != "" ) {
$_SESSION['customerName'] = $username;
$_SESSION['customerID'] = $ro->doubleSelectNow("customer","custID","username",$username,"password",$password);
echo "user";
}else {
echo "failed";
}

}
?>