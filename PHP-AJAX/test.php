<?php
$txt1 = $_POST['txt1'];
$txt2 = $_POST['txt2'];
$operation = $_POST['operation'];

if($operation == "add") {
	$total = ($txt1 + $txt2);
}else if($operation == "sub") {
	$total = ($txt1 - $txt2);
}else if($operation == "mul"){
	$total = ($txt1 * $txt2);
}else if($operation == "div") {
	$total = ($txt1 / $txt2);
}

echo $total;

?>