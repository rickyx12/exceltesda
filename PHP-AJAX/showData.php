<?php
include "dbConnect.php";

$sql = "SELECT * from studinfo";

$result = mysql_query($sql,$conn) or die(mysql_error());

while($row = mysql_fetch_array($result)) {
	
	$id = $row['studid'];
	$name = $row['sname'];
	$course = $row['course'];
	
	echo "<br>$id";
	echo "<br>$name";
	echo "<br>$course<br><br>";
	
}

?>