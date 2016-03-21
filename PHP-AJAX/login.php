<?php
include "dbConnect.php";
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM useraccount WHERE username = '$username' and password = '$password'";

$result = mysql_query($sql,$conn) or die(mysql_error());

if(mysql_num_rows($result) > 0) {
	header("Location: home.php");
}else {
	echo "Error";
}


?>