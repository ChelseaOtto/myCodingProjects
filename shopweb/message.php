<?php

// Start session
//session_start();

// Initialise variables
$userID = "";
$userEmail = "";

$errors = array();

// Database variables
$server = "localhost";
$userName = "root";
$userpassword = "";
$database = "shopdata";

// Connect to database
if(!$conn = mysqli_connect($server, $userName, $userpassword, $database))
{
	die("Failed to connect!");
}

// Email subscription
if(isset($_POST["submit"])){
	
	// Form validation
	if(!empty($_POST["eName"])){
		
		$userEmail = $_POST["eName"];
		
		$query = "INSERT into subscription (userEmail) VALUES ('$userEmail')";
		
		$results = mysqli_query($conn,$query) or die(mysqli_error());
		
		if($results){
			echo "Subscription submitted successfully";
		}
		else{
			echo "Subscription not submitted!";
		}
	}
	else{
		echo "Email required!";
	}
}

?>