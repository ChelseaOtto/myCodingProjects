<?php 

//session_start();

include('server.php') 

?>

<!DOCTYPE html>
<html lang = "en">

<head>
	<meta charset = "UTF-8" name = "viewport" content = "width = device-width, initial-scale = 1.0">
	<title> Login </title>
	
	<link rel = "stylesheet" href = "https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
	<link rel = "stylesheet" href = "styling.css">
	
	<style>
		body {
			margin: 0;
			padding: 0;
			background: linear-gradient(120deg, #2980b9, #8e44ad);
			height: 100vh;
			overflow: hidden;
		}
		
		.center {
			position: absolute;
			top: 50%;
			left: 50%;
			width: 400px;
			border-radius: 10px;
			background: white;
			transform: translate(-50%, -50%);
		}
		
		.center h2 {
			text-align: center;
			padding: 0 0 20px 0;
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
			height: 40px;
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
		
		.loginbtn {
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
		<div name = "loginBox" class = "center"> 
		<h2> Login Form </h2>
			<form action = "cart.php" method = "POST" autocomplete = "Off">
			
			<div class = "textField">
			<label for = "username"> Username: </label>
			<input id = "text" type = "text" name = "username" required>
			</div>
			
			<div class = "textField">
			<label for = "password"> Password: </label>
			<input id = "text" type = "password" name = "password1" required>
			</div>
			
			<button class = "loginbtn" type = "submit" name = "loginbtn"> LOGIN </button>
			
			<div>
				<p> 
				Don't have an account? <a href = "register.php"><b> Register Here! </b></a>
				</p> 
				
				<a href = "main.html"> Home Page </a>
				<a href = "adminpanel.php"> Admin Panel </a> 
				
			</div>
			</form>
		</div>
</body>
</html>