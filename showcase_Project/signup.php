<!DOCTYPE html>
<?php
  include "connect.php";
  session_start();
   
  
          
	  if (isset($_POST["submit"]))
	  {
		  $name = $_POST["name"];
		  $email = $_POST["email"];
		  $pass = $_POST["password"];
		 
		 
		  $select = " SELECT * FROM account WHERE email = '$email' && password = '$pass' ";
		  $result = mysqli_query($conn, $select);
		  
		  if(mysqli_num_rows($result) >0){

			 echo "<script>alert('User already exist');</script>";

		  }else{
			  $insert = "INSERT INTO account(name, email, password) VALUES('$name','$email','$pass')";
			  mysqli_query($conn, $insert);
			  header('location:signin.php');
      }
			  
		  
		  
		  
	  }
  ?>
   




<html lang="en">
<head>
  <meta charset="UTF-8">
  
  <link rel="stylesheet" href="style.css">
   <!-- Font Awesome Cdn Link -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
   
   
 <script>
// call function
 function validate() {
 // create var to hold value of input
	var name = document.forms["life"]["name"].value;

	var regularExpression =/^[a-zA-Z ]{2,30}$/;
	var eemail = document.forms["life"]["email"].value;
    var emailRX = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;


	
 
	//name validation
	if (name == "" || !regularExpression.test(name)) {
	alert('Please fill in the name using letters in the following format = John Van ');
    return false;
	}

	//email validation
	if (eemail == "" || !emailRX.test(eemail)){
	alert('Please provide a valid email address in following format = Ophelia@gmail.com');
    return false;
	}
	

	

}

</script>
   
</head>
<body>

  <div class="wrapper">
    <h1>Welcome!</h1>
    <p>Welcome to Lush Activewear </p>
    <form name ="life" action ="" method = "post" onsubmit="return validate()"> 
	  <input type="text" name ="name" placeholder="Name">
      <input type="text" name="email" placeholder="Email Address">
      <input type="password" name="password" placeholder="Password">
	  <input type="password"name ="cpassword" placeholder="Confirm Password">
	  <button name ="submit">Sign up</button>
     
    </form>
    
    
    <div class="not-member">
      already a member? <a href="signin.php">Login Now</a>
    </div>
  </div>
  
</body>
</html>
