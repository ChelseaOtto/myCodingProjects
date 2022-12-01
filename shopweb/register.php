<?php 

// Connect to database
$conn = mysqli_connect('localhost', 'root', '', 'kimiko');

// Checks connection to db example
if(!$conn){
	echo "Connection error: " .mysqli_connect_error();
}

//session_start();

if(isset($_POST['registerbtn'])){
	
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	
	$password1 = mysqli_real_escape_string($conn, md5($_POST['password']));
	$password2 = mysqli_real_escape_string($conn, md5($_POST['cpassword']));
	
	$selected = mysqli_query($conn, "SELECT * FROM `client` WHERE email = '$email' AND password = '$password'") or die('query failed');
	
	if(mysqli_num_rows($selected) > 0){
		$message[] = 'User already exists!';
	}
	else{
		mysqli_query($conn, "INSERT INTO `users` (fname, email, phone, password, cpassword) 
		VALUES('$fname', '$email', 'phone', '$password1', '$password2')") 
		or die('query failed!');
		
		$message[] = 'User registered successfully!';
	}
	
}

?>

<!DOCTYPE html>
<html lang = "en">

<head>
	<meta charset = "UTF-8" name = "viewport" content = "width = device-width, initial-scale = 1.0">
	<title> Registration </title>
	
	<link rel = "stylesheet" href = "https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
	<link rel = "stylesheet" href = "styling.css">
	
	<script defer src = "validation.js"></script>
	
	<style>
		body {
			margin: 0;
			padding: 0;
			background: linear-gradient(120deg, #2980b9, #8e44ad);
			height: 120vh;
			overflow: auto;
		}
		
		.container{
			position: absolute;
			top: 60%;
			left: 50%;
			width: 500px;
			border-radius: 10px;
			background: white;
			transform: translate(-50%, -50%);
		}
		
		.container h2 {
			text-align: center;
			padding: 0 0 10px 0;
			border-bottom: 1px solid silver;
		}
		
		.center form {
			padding: 0 40px;
			box-sizing: border-box;
		}
		
		form .textField {
			position: relative;
			border-bottom: 2px solid #adadad;
			margin: 30px 0;
		}
		
		.textField input {
			width: 100%
			padding: 0 5px;
			height: 30px;
			font-size: 16px;
			border: none;
			outline: none;
			background: none;
		}
		
		.textField label {
			color: #adadad;
			transform: translateY(-50);
			font-size: 16px;
		}
		
		.registerbtn {
			width: 100%;
			height: 50px;
			border: 1px solid;
			border-radius: 25px;
			font-size: 18px;
			color: #fff;
			background: #648cac;
			outline: none;
			font-weight: 700;
			cursor: pointer;
		}
	</style>
	
</head>

<body>

<?php

if(isset($message)){
	foreach($message as $message){
		echo ''.$message.'';
	}
}

?>

	<div class = "container">
		<div name = "registerBox">
			<h2> Registration form </h2>
			
			<div id = "error"></div>
			<form action = "register.php" method = "POST" id = "form" autocomplete = "Off">
			
			
			<div class = "textField">
			<label for = "fname"> Name: </label>
			<input id = "text" type = "text" name = "fname" required>
			</div>
			
			<div class = "textField">
			<label for = "lname"> Surname: </label>
			<input id = "text" type = "text" name = "lname" required>
			</div>
			
			<div class = "textField">
			<label for = "username"> Username: </label>
			<input id = "text" type = "text" name = "username" required>
			</div>
			
			<div class = "textField">
			<label for = "email"> Email: </label>
			<input id = "email" type = "email" name = "email" required>
			</div>
			
			<div class = "textField">
			<label for = "password1"> Password: </label>
			<input type = "password" name = "password1" required>
			</div>
			
			<div class = "textField">
			<label for = "password2"> Confirm Password: </label>
			<input type = "password" name = "password2" required>
			</div>
			
			<button class = "registerbtn" type = "submit" name = "registerbtn"> REGISTER </button>
				
			<div>
				 <p>
				 Already registered? <a href = "login.php"><b> Login Here! </b></a>
				 </p> 
				 
				 <a href = "main.html"> Home Page </a>
			</div>
			</form>
		</div>
	</div>
	
</body>
</html>