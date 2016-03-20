<?php
$bolts = $_POST['bolts'];
$nuts = $_POST['nuts'];
$cracker = $_POST['cracker'];

function nuts($bolts,$nuts){
	$x = ($bolts * 2);
	
	if($x == $nuts) {
		return $nuts;
	}else {
		return "error";
	}
	
}

function crackers($bolts,$crackers) {
	
	$x = ($bolts + 4);
	
	if($x == $crackers) {
		return $crackers;
	}else {
		return "error";
	}
	
}



echo "BOLTS=".$bolts;
echo "<br>";
echo "NUTS=".nuts($bolts,$nuts);
echo "<br>";
echo "Cracker=".crackers($bolts,$cracker);

?>