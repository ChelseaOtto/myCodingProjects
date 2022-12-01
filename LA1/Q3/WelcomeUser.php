<?php

session_start();

if(isset($_SESSION['username']) && isset($_SESSION['password'])) {	
	?>

	<!DOCTYPE html>
	<html>
	<head>
		<title> Home Page </title>
	</head>
	<body>
	<h1> Welcome User <?php echo $_SESSION['userName']; ?></h1><br>
	<p> You logged in at: </p> <?php $now = new DateTime(); echo  $now ->format(format: 'h:i:s d/m/y');?>
	<a href = "LA2Question3.php"> Not you? Click Here to Login </a>
	</body>
	</html>
	
	<?php
}
else {
	header("Location: LA2Question3.php");
	exit();
}	
?>