<?php
	session_start();
	
	$_SESSION['user'] = 'Peter';
	echo "<a href='session2.php'>Login</a>";
	
?>