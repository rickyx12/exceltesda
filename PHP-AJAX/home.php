<?php
include "dbConnect.php";

$studid = $_POST['studid'];

$sql = "SELECT * from studinfo where course like '$studid%'";

$result = mysql_query($sql,$conn) or die(mysql_error());

echo "<table border=1>";
echo "<Tr>";
echo "<th>ID</th>";
echo "<th>Name</th>";
echo "<th>Course</th>";
echo "<tr>";
while($row = mysql_fetch_array($result)) {
	echo "<Tr>";
	echo "<td>".$row['studid']."</td>";
	echo "<td>".$row['sname']."</td>";
	echo "<td>".$row['course']."</td>";
	echo "</tr>";
}
echo "</table>";

?>