<?php

// Initialise variables
$userID = "";
$name = "";
$userEmail = "";
$userSubject = "";
$userMessage = "";

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

// User query
if(isset($_POST["submit"])){
	
	// Form validation
	if(!empty($_POST["name"]) && !empty($_POST["email"]) && !empty($_POST["subject"]) && !empty($_POST["query"])){
		
		$name = $_POST["name"];
		$userEmail = $_POST["email"];
		$userSubject = $_POST["subject"];
		$userMessage = $_POST["query"];
		
		$query = "INSERT into feedback (name,email,subject,message) VALUES ('$name','$userEmail','$userSubject','$userMessage')";
		
		$results = mysqli_query($conn,$query) or die(mysqli_error());
		
		if($results){
			echo "Feedback submitted successfully";
		}
		else{
			echo "Feedback not submitted!";
		}
	}
	else{
		echo "All fields required!";
	}
}
?>