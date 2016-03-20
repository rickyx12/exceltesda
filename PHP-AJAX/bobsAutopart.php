<?php
$bolts = $_POST['bolts'];
$nuts = $_POST['nuts'];
$cracker = $_POST['cracker'];
$total=0;
$totalPrice=0;
$boltTotal=0;
$nutTotal=0;
$crackerTotal=0;
$flag=0;

function nuts($bolts,$nuts){
	$x = ($bolts * 2);
	
	if($x == $nuts) {
		return $nuts;
	}else {
		return 0;
	}
	
}

function crackers($bolts,$crackers) {
	
	$x = ($bolts + 4);
	
	if($x == $crackers) {
		return $crackers;
	}else {
		return 0;
	}
	
}


$boltTotal = ($bolts * 5);
echo "5 BOLTS=".$bolts." = Php ".$boltTotal;
$total+=$bolts;
echo "<br>";
if( nuts($bolts,$nuts) > 0 ) {
$nutTotal += (nuts($bolts,$nuts)*3);
$total += nuts($bolts,$nuts);
echo "3 NUTS=".nuts($bolts,$nuts)." = Php ".$nutTotal;
}else {
$flag += 1;
echo "NUTS=error";
}
echo "<br>";
if(crackers($bolts,$cracker) > 0) {
	$total += crackers($bolts,$cracker);
	$crackerTotal += (crackers($bolts,$cracker) * 1.50);
echo "1.50 Cracker=".crackers($bolts,$cracker)." = Php ".$crackerTotal;
}else {
$flag += 1;
echo "Crackers=error";
}
echo "<br>";
//echo "Total=".($total)."PCS = Php (".$boltTotal + $nutTotal + $crackerTotal.")";

if( $flag > 0 ) {
	
}else {
echo "TOTAL=".($boltTotal + $nutTotal + $crackerTotal);
}
?>