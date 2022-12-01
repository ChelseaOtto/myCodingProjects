
<!DOCTYPE html>
<html>
	<head>
		<title> Login Form </title>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
		
		<style> 
			body {
				margin: 0 auto;
				padding-left: 30px;
			}
			
			.container {
				width: 500px;
				height: 450px;
				margin: 0 auto;
				margin-top: 160px;
			}
			
			label {
				font-size: 30px;
				padding-top: 30px;
			}
			
			input {
				margin-top: 15px;
				width: 500px;
				height: 50px;
				font-size: 18px;
				padding-left: 30px;
				margin-bottom: 15px;
			}
			
			.button {
				padding: 15px 25px;
				border: none;
				width: 540px;
				background-color: #27ae60;
				color: #fff;
			}	
		</style>
		
	</head>
	
	<body>
	
	<?php 
	session_start();
	$conn = mysqli_connect('localhost', 'root', '', 'dumpfile') or die('Could not connect to database');
	
		//$servername = 'localhost';
        //$username = 'root';
        //$password = '';
        //$databasename = 'dumpfile';
		// Create connection to db	
		
	if(isset($_POST['username']) && isset($_POST['password'])) {
		
		
		function validate($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		} 	
		
		$uname = validate($_POST['username']);
		$pass = validate($_POST['password']);

	
	if(empty($uname)) {
		header("Location: LA2Question3.php?erro= Username required");
		exit();
	}
	else if(empty($pass)) {
		header("Location: LA2Question3.php?error= Password required");
		exit();
	}
		
	// Query
	$sql = "SELECT * FROM tbluser WHERE userName = '$uname' AND password = '$pass'";
	
	//Query to get results
	$result = mysqli_query($conn, $sql);
	
	if(mysqli_num_rows($result) === 1) {
		$row = mysqli_fetch_assoc($result);
		if($row['username'] === $uname && $row['password'] === $pass) {
			echo "Logged !n!";
			$_SESSION['userName'] = $row['userName'];
			$_SESSION['name'] = $row['name'];
			header("Location: WelcomeUser.php");
			exit();
		}
		else{
			header("Location: LA2Question3.php?error= Incorrect Username or Password!");
			exit();
		}
		
		// Fetch results as array
		//$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		// Free results from memory
		mysqli_free_result($result);
		
		// Close connection
		mysqli_close($conn);
	}
}		
	?>

		<form action="WelcomeUser.php" method="post" autocomplete = "off">
		
		  <div class="container">
			<div class = "formInput"> 
				<label for="username"><b>Username</b></label> </br>
				<input type="text" placeholder="Enter Username" name="username" required ">
			</div>
			
			<div class = "formInput">
				<label for="password"><b>Password</b></label> </br>
				<input type="password" placeholder="Enter Password" name="password" required ">
			</div>
			
			<input type="submit" class = "button" name = "userlog" value = "Login">
		
		  </div>
		  
		</form>
	</body>
</html>
