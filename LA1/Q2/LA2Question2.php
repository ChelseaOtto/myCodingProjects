<!DOCTYPE html>

<html>
	<head>
		<title> Library Program </title>
		<meta charset = "UTF-8">
		<meta name = "viewport" content = "width = device-width, initial-scale = 1.0">
		
		<style> 
			th, td {
				padding: 15px;
				padding-left: 10px;
			}
		</style>
		
	</head>
	
	<body>
	
	<?php 
	//error_reporting(E_ALL & ~E_NOTICE)
	if(isset($_POST['enter']))
	{
	session_start();
		
		$servername = 'localhost';
        $username = 'root';
        $password = '';
        $databasename = 'library';
		
		//variables
		$isbn = $_POST['isbn'];
		$title = $_POST['title'];
		$edition = $_POST['edition'];
		$author = $_POST['author'];

		// Create connection to db
		$conn = mysqli_connect($servername, $username, $password, $databasename) or die('Could not connect to database');

		// Query
		$sql = "INSERT INTO `book`(`isbn`,`bookTitle`,`edition`,`author`) 
				VALUES ('$isbn', '$title', '$edition', '$author')";
		
		//Query to get results
		$result = mysqli_query($conn, $sql);
		
		// Displays message to user
		if($result) 
		{
			echo "Book's data inserted successfully";
		}
		else 
		{
			echo "Oops, book's data not inserted!";
		}
		
		// Fetch results as array
		$data = mysqli_fetch_all($result, MYSQLI_ASSOC);
		
		// Free results from memory
		mysqli_free_result($result);
		
		// Close connection
		mysqli_close($conn);
		
		//print_r($data);
	}
		
	?>
	
	
		<h1><center> Library Database </center></h1>
		<form method = "post" action = "LA2Question2.php" autocomplete = "off">
		
		
		<fieldset>
		<legend> Add new book </legend>
		<table>
		
		<div>
		<tr>
		<th> <label for = "isbn"> Enter the book ISBN </label></th>
		<td> <input type = "text" id = "isbn" name = "isbn" required </td>
		</div>
		
		<div class = "input-group">
		<tr>
		<th> <label for = "title"> Enter the book title </label></th>
		<td> <input type = "text" id = "title" name = "title" required </td>
		</tr>
		</div>
		
		<div class = "input-group" >
		<tr>
		<th> <label for = "edition"> Enter the book edition </label></th>
		<td> <input type = "text" id = "edition" name = "edition" required </td>
		</tr>
		</div>
		
		<div class = "input-group">
		<tr>
		<th> <label for = "author"> Enter the book author </label></th> 
		<td> <input type = "text" id = "author" name = "author" required </td>	
		</tr>
		</div>
		
		<tr> <td> <input type = "submit" id = "enter" name = "enter" onclick = "addBook" value = "Add new book"/></td></tr>
		
		</table>
		</fieldset>
		</form>
	</body>

</html>