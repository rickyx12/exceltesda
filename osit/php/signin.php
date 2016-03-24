<?php
include "database.php";
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

$ro = new database();

if($ro->doubleSelectNow("userAccount","userID","username",$username,"password",$password) != "") {
$_SESSION['user'] = $username;
header("Location: home.php");
}else {
echo "Failed";
}

?>