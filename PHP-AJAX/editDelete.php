<?php
include "dbConnect.php";


$sql = "SELECT * from studinfo";

$result = mysql_query($sql,$conn) or die(mysql_error());

echo "<table border=1>";
echo "<Tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Course</th>";
echo "<th></th>";
echo "<th></th>";
echo "<tr>";
while($row = mysql_fetch_array($result)) {
	echo "<Tr>";
	echo "<td>".$row['studid']."</td>";
	echo "<td>".$row['sname']."</td>";
	echo "<td>".$row['course']."</td>";
		echo "<td>
		<form method='post' action='editDelete_edit.php'>
		<input type='hidden' name='id' value='$row[studid]'>
		<input type='hidden' name='name' value='$row[sname]'>
		<input type='hidden' name='course' value='$row[course]'>
		<input type='submit' value='EDIT'>
		</form>
		</td>";
	echo "<td><form method='post' action='delete.php'>
	<input type='hidden' name='id' value='$row[studid]'>
	<input type='submit' value='DELETE'></form></td>";
	echo "</tr>";
}
echo "</table>";

?>