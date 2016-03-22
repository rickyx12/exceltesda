<?php
include "dbConnect.php";
$username = $_POST['username'];
$password = $_POST['password'];
$password1 = $_POST['password1'];

if($password == $password1) {
	$sql = "INSERT INTO useraccount values('$username','$password')";
	mysql_query($sql,$conn) or die(mysql_error());
	echo "Account Created <br> <a href='login.html'>Login</a>";
}else {
	header("Location: signup.html");
}


?>