<?php
  error_reporting(E_ALL & ~E_WARNING); 
  $server = "localhost";  
  $username = "root";
  $password = "";
  $database = "lush"; 
  
  $conn = new mysqli($server,$username,$password, $database);  
  if ($conn -> connect_error) 
  {
	 die("Connection failed".$conn -> connect_error); 
  }
  else
  {
	  echo "";
  }
?>