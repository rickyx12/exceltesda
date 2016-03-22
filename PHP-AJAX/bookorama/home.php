<?php include "checkSession.php"; ?>
<!doctype html>
<html>
	<head>
		<title>Book-O-Rama</title>
		<script language="javascript" src="jquery-2.1.4.min.js"></script>
		<script language="javascript" src="bookorama.js"></script>		
		<link rel="stylesheet" href="home.css"></link>
	</head>
	<body>
		<div id="nav">
			<label id="title">Book-O-Rama</label>
		<?php if($_SESSION["userType"] == "admin") { ?>
			<a href="#" class='nav' id="dashboard">Update/Delete</a>
			<a href="#" class='nav' id="addBook">Add Books</a>
		<?php	}else { } ?>
			<a id="logout" href='logout.php'>Logout</a>
		</div>
		<br>
		<div id="leftContainer">
			<input id="searchBox" type="text" autocomplete="off" placeholder="Search">
			<br>
			<input type="button" id="searchBtn" value="SEARCH">
			
		</div>
		
		<div id="rightContainer">
		
		</div>
		
		
	</body>
</html>