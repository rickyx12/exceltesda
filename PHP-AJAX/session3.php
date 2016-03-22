<?php
	
	session_start();
	
	echo "Hello again ".$_SESSION['user'];
	
	unset($_SESSION['user']);
	session_destroy();
	
	echo "<a href='session4.php'>Logout</a>";

?>