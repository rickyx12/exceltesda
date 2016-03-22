<?php
include "dbConnect.php";

$search = $_POST['search'];

$sql = "SELECT * from studinfo where studid = '$search'";

$result = mysql_query($sql,$conn) or die(mysql_error());


while($row = mysql_fetch_array($result)) {
	$id = $row['studid'];
	$name = $row['sname'];
	$course = $row['course'];
	
	echo "<form method='post' action='update.php'>";
	echo "<input type='hidden' name='id' value='$id'>";
	echo "<input type='text' name='studName' value='$name'>";
	echo "<br>";
	echo "<input type='text' name='course' value='$course'>";
	echo "<br><br>";
	echo "<input type='submit' value='Edit'>";
	echo "</form>";
}


?>