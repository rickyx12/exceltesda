<?php
include "dbConnect.php";



$username = $_POST['username'];
$password = $_POST['password'];
$password1 = $_POST['password1'];
$userType = $_POST['userType'];

if( $password != "" || $password1 != "" ) {

if($password == $password1 ) {
	$sql = "INSERT INTO useraccount values('','$username','$password','$userType')";
	mysql_query($sql,$conn) or die(mysql_error());
	echo "Registered";
}else {	
	echo "ERROR";
}

}else {
	
}
?>
