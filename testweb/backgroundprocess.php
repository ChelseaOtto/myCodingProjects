<html>
<body>

<h1> Thank you </h1><br>

User: <?php echo $_POST["fname"]; ?> <?php echo $_POST["lname"]; ?><br></br>

For your email address: <?php echo $_POST["email"]; ?><br></br>

<?php 

if(isset($_POST["choices"])) {
	$option = $_POST["choices"];
	echo "You selected to: <br/>";
	foreach($option as $key => $value){
		echo "$value <br/>";
	}
}

else{
	echo "You have not made a selection! Please make one...";
}
	
?>


</body>
</html>
