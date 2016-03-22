<?php
include "dbConnect.php";
session_start();
$username = $_POST['username'];
$password = $_POST['password'];

//echo $username;
//echo $password;

$sql = "SELECT * FROM useraccount WHERE username = '$username' and password = '$password' ";

$rec = mysql_query($sql,$conn) or die(mysql_error());

if(mysql_num_rows($rec) > 0) {
	$_SESSION["user"] = $username;
	
	while($row = mysql_fetch_array($rec)) {
	$_SESSION["userType"] = $row['type'];
	}
	
	echo "success";
}else {
	session_destroy();
	echo "Authentication Failed";
	
}

?>