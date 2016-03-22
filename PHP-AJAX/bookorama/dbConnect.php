<?php

$conn = mysql_connect("localhost","root","") or die(mysql_error());

if($conn){
	//echo "Connection Established";
}

$dbconn = mysql_select_db("bookorama",$conn) or die(mysql_error());

if($dbconn) {
	//echo "Database Open";
}

?>