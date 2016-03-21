<?php
	session_start();
	
	echo "Hello ".$_SESSION['user'];

	
	echo "<a href='session3.php'>Next Page</a>";

?>