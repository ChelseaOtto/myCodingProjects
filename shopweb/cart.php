<?php

session_start();

// Connect to DB
$conn = mysqli_connect("localhost", "root", "", "shopdata");

if (isset($_POST['add'])){
	
	if (isset($_SESSION['cart'])){
		
		$session_array_id = array_column($_SESSION['cart'], "id");
		
		if(!in_array($_GET['id'], $session_array_id)){
			
			$session_array = array(
			'id' => $_GET['id'],
			"productName" => $_POST['productName'],
			"productPrice" => $_POST['productPrice'],
			"quantity" => $_POST['quantity']
		);
		
		$_SESSION['cart'][] = $session_array;
		}
		
	}else{
		
		$session_array = array(
			'id' => $_GET['id'],
			"productName" => $_POST['productName'],
			"productPrice" => $_POST['productPrice'],
			"quantity" => $_POST['quantity']
		);
		
		$_SESSION['cart'][] = $session_array;	
	}
}

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset = "UTF-8" name = "viewport" content = "width = device-width, initial-scale = 1.0">
	<link rel = "stylesheet" href = "https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
	<link rel = "stylesheet" href = "styling.css">
	
	<title> Shopping Cart </title>
	<link rel = "stylesheet" type = "text/css" href = "https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
</head>

<body>
	
	<section id = "header">
		<a href = "#"><img src = "images/logo/otherlogo.png" class ="logo" alt = ""></a>
		
		<div>
			<ul id = "navbar">
				<li><a  href = "main.html"> Home </a><li>
				<li><a href = "about.html"> About </a><li>
				<li><a href = "contact.html"> Contact Us </a><li>
				<li id = "lg-bag"><a class = "active" href = "cart.php"><i class="far fa-shopping-bag"></i></a></li>
				<a href = "#" id = "closed"><i class = "far fa-times"></i></a>
			</ul>
		</div>
		<div id = "mobile"> 
			<i id = "bars" class = "fas fa-outdent"></i>
			<a href = "cart.php"><i class="far fa-shopping-bag"></i></a>
		</div>
	</section>


	<div class = "container-fluid">
		<div class = "col-md-12">
			<div class = "row">
				<div class = "col-md-6">
					<h2 class = "text-center"> Shopping Cart </h2>
					<div class = "col-md-12">
						<div class = "row">
							
					<?php
					// Selects all products inDB
					$query = "SELECT * FROM products ";
					
					$result = mysqli_query($conn,$query);
					
					
					while ($row = mysqli_fetch_array($result)) {?>
					<div class = "col-md-4">
						<form method = "POST" action = "cart.php?id=<?=$row['id'] ?>">
							<img src = "images/products/<?= $row['productImage'] ?>" style = 'height: 170px;'>
							<h5 class = "text-center"><?= $row['productName']; ?></h5>
							<h5 class = "text-center">R<?= number_format($row['productPrice'],2); ?></h5>
							<input type = "hidden" name = "productName" value = "<?= $row['productName'] ?>">
							<input type = "hidden" name = "productPrice" value = "<?= $row['productPrice'] ?>">
							<input type = "number" name = "quantity" value = "1" class = "form-control">
							<input type = "submit" name = "add" class = "btn btn-warning btn-warning my-2" value = "Add To Cart">
						</form>
					</div>
					
					<?php }
					
					?>
						</div>
					</div>
					
				</div>
				<div class = "col-md-6">
					<h2 class = "text-center"> Item </h2>
					
					<?php 
						//var_dump($_SESSION['cart']);
						
						$cartTotal = 0;
						
						$output = "";
						
						$output .= "
						
						<table class = 'table table-bordered table-striped'>
							<tr>
								<th> ID </th>
								<th> Product Name </th>
								<th> Product Price </th>
								<th> Quantity </th>
								<th> Subtotal </th>
								<th> Action </th>
							</tr>
						";
						
						if (!empty($_SESSION['cart'])){
							
							foreach($_SESSION['cart'] as $key => $value){
								
								$output .= "
								
									<tr> 
										<td>".$value['id']."</td>
										<td>".$value['productName']."</td>
										<td>R".$value['productPrice']."</td>
										<td>".$value['quantity']."</td>
										<td>R".number_format($value['productPrice'] * $value['quantity'],2)."</td>
										<td>  
											<a href = 'cart.php?action=remove&id=".$value['id']."'>
											<button class = 'btn btn-danger btn-block'> Remove </button>
											</a>
										</td>
								";
								
								$cartTotal = $cartTotal + $value['quantity'] * $value['productPrice'];
								
							}
							
							$output .= "
								<tr>
									<td colspan = '3'</td>
									<td></b> Total Amount </b></td>
									<td>R".number_format($cartTotal,2)."</td>
									<td> 
										<a href = 'cart.php?action=clearall'>
										<button class = 'btn btn-warning btn-block'> Clear </button>
										</a>
									</td>
								</tr>
								
							<tr>
								<td>
									<button class = 'btn btn-warning btn-block'><a href = 'checkout.php'> Proceed to checkout </a></button>
								</td>
							</tr>
							
							";
		
						}
					
					echo $output;
					?>
					
				</div>
			</div>
		</div>
	</div>
	
	

	<?php
	
	if(isset($_GET['action'])){
		
		if($_GET['action'] == "clearall"){
			unset($_SESSION['cart']);
		}
		
		if($_GET['action'] == "remove"){
			foreach($_SESSION['cart'] as $key => $value){
				
				if ($value['id'] == $_GET['id']){
					unset($_SESSION['cart'][$key]);
				}
			}
		}
	}
	
	?>

</body>
</html>