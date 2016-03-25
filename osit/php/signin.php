<?php
include "database.php";
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$ro = new database();

if($ro->doubleSelectNow("userAccount","userID","username",$username,"password",$password) != "") {
$_SESSION['user'] = $username;

if($ro->doubleSelectNow("userAccount","usertype","username",$username,"password",$password) == "admin" ) {
	echo "admin";
}else {
	echo "user";
}

}else {
echo "Failed";
}

?>