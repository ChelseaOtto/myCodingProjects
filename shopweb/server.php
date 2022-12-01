<?php

// Start session
session_start();

// Initialise variables
$fname = "";
$lname = "";
$username = "";
$email = "";
$password1 = "";
$password2 = "";

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


// Register users
if(isset($_POST["registerbtn"])) {
	
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);

	$password1 = mysqli_real_escape_string($conn, $_POST['password1']);
	$password2 = mysqli_real_escape_string($conn, $_POST['password2']);
}

// Form validation
if(empty($fname)) {array_push($errors, "Name is required");}
if(empty($lname)) {array_push($errors, "Surname is required");}
if(empty($username)) {array_push($errors, "Username is required");}
if(empty($email)) {array_push($errors, "Email is required");}
if(empty($password1)) {array_push($errors, "Password is required");}

if($password1 != $password2){array_push($errors, "Passwords do not match!");}


// Check for existing users / usernames
$user_check_query = "SELECT * FROM users WHERE username = '$username' or email = '$email' LIMIT 1";

$results = mysqli_query($conn, $user_check_query);
$user = mysqli_fetch_assoc($results);

//if($user) {
	//if($user['username'] === $username){array_push($errors, "Username already exists");}
	//if($user['email'] === $email){array_push($errors, "Email already exists");}
//}

// Register user if no errors
if(count($errors) == 0 ){
	$password = md5($password);  // md5 encryts passwords
	
	$query = "INSERT INTO users (fname, lname, username, email, password) VALUES ('$fname','$lname','$username','$email','$password')";
	
	mysqli_query($conn, $query);
	$_SESSION['username'] = $username;
	$_SESSION['success'] = "You are now registered in";
	
	header('location: login.php');
}


// Login User
if(isset($_POST["loginbtn"])){
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$password = mysqli_real_escape_string($conn, $_POST['password1']);
	
	if(empty($username)){
		array_push($errors, "Username is required!");
	}

	if(empty($password)){
		array_push($errors, "Password is required!");
	}

	if(count($errors) == 0){
		$password = md5($password);
	
		$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
		
		$results = mysqli_query($conn, $query);
		$user = mysqli_fetch_assoc($results);
		
		if($user['user_level'] == 1){
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Logged in successfully";
			header('location: adminpanel.php'); // redirect to admin panel

		}elseif($user['user_level'] == null){
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Logged in successfully";
			header('location: cart.php'); // redirect to shopping page
		}
		
		else{
			array_push($errors, "Incorrect username or password!");
		}
				
	}
}

?>