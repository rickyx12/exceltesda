<?php

$id = $_POST['id'];
$name = $_POST['name'];
$course = $_POST['course'];

echo "<form method='post' action='editDelete_edit1.php'>";
echo "<input type='hidden' name='id' value='$id'>";
echo "<br>";
echo "<input type='text' name='name' value='$name'>";
echo "<br>";
echo "<input type='text' name='course' value='$course'>";
echo "<br><br>";
echo "<input type='submit' value='EDIT'>";
echo "</form>";
?>