<?php
 
 $txtmsg = $_POST['txtmsg'];
 $strings = $_POST['strings'];
 
 if($strings == "encrypt") {
	 $ans = md5($txtmsg);
 }else if($strings == "reverse") {
	 $ans = strrev($txtmsg);
 }else if($strings == "uppercase") {
	 $ans = strtoupper($txtmsg);
 }else if($strings == "lowercase" ) {
	 $ans = strtolower($txtmsg);
 }else {
	 $ans = ucfirst($txtmsg);
 }
 
 echo $ans;
 

?>