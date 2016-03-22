<?php
include "dbConnect.php";

$search = $_POST['search'];

$sql = "SELECT * FROM books WHERE bookName like '$search%' ";

$res = mysql_query($sql,$conn) or die(mysql_error());

echo "<table id='bookTable'>";
echo "<tr>";
echo "<th>Book Name</th>";
echo "<th>Category</th>";
echo "<th>Author</th>";
echo "</tr>";
while($row=mysql_fetch_array($res)) {
echo "<tr>";
echo "<td>".$row['bookName']."</td>";
echo "<td>".$row['category']."</td>";
echo "<td>".$row['author']."</td>";
echo "</tr>";
}
echo "</table>";

?>