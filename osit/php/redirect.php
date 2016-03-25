<?php
session_start();

if(isset($_SESSION['customerName'])) {
	unset($_SESSION['customerName']);
}

session_destroy();
header("Location: ../html/index.html");


?>