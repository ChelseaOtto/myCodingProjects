<html>

<head> 
	<meta charset = "UTF-8" name = "viewport" content = "width = device-width, initial-scale = 1.0">
	<title> My Ecommerce Website </title>
	
	<link rel = "stylesheet" href = "https://pro.fontawesome.com/releases/v5.10.0/css/all.css"/>
	<link rel = "stylesheet" href = "styling.css">
	<title> Admin Panel </title>
	
<style> 
body{
	margin: 0px;
	border: 0px;
}

#header{
	width: 100%;
	height: 200px;
	background: #648cac;
	color: white;
}

#sidebar{
	width: 300px;
	height: 410px;
	background-color: #088178;
	float: left;

}

#data {
	padding-top: 30px; 
	background: #D3D3D3;
	height: 410px;
	postion: flex;
}

ul li{
	padding: 20px;
	color: white;
}

ul li:hover {
	background: #648cac;
	color: white;
}

</style>
</head>

<body>
<section id = "header">
		<a href = "#"><img src = "images/logo/otherlogo.png" class ="logo" alt = ""></a>
		
		<div>
			<ul id = "navbar">
				<li><a class = "active" href = "main.html"> Home </a><li>
				<li><a href = "about.html"> About </a><li>
				<li><a href = "contact.html"> Contact Us </a><li>
				<li id = "lg-bag"><a href = "cart.php"><i class="far fa-shopping-bag"></i></a></li>
				<a href = "#" id = "closed"><i class = "far fa-times"></i></a>
			</ul>
		</div>
		<div id = "mobile"> 
			<i id = "bars" class = "fas fa-outdent"></i>
			<a href = "cart.php"><i class="far fa-shopping-bag"></i></a>
		</div>
	</section>


<div id = "sidebar">
<ul>
	<li> Users </li>
	<li> Orders </li>
	<li> Deliveries </li>
	<li> Products </li>
	<li> Customer Services </li>
	<li> Notices </li>
	<li> Developer </li>
</ul>
</div>


<div id = "data">
	<h2><center> Welcome Admin </center><h3>
	<h3><center> This is the Admin Panel </center></h2>
</div>

<footer class = "section1">
		<div class = "column">
			<h4> Content </h4>
			<p> <strong>Address:</strong> Vineyard Ave & Valley Road, Blackheath, Cape Town, 7580, South Africa</p>
			<p> <strong>Phone:</strong> 021 905 1530 </p>
			<p> <strong>Hours:</strong> 9:00 - 16:30, Mon - Fri </p>
			<div class = "following">
				<h4> Follow Us </h4>
				<div class = "icon">
					<i class = "fab fa-facebook-f"></i>
					<i class = "fab fa-twitter"></i>
					<i class = "fab fa-instagram"></i>
					<i class = "fab fa-pinterest-p"></i>
					<i class = "fab fa-youtube"></i>
				</div>
			</div>
		</div>
		
		<div class = "column">
			<h4> About </h4>
			<a href = "about.html"> About Us </a>
			<a href = "checkout.php"> Delivery Information </a>
			<a href = "#"> Privacy Policy </a>
			<a href = "#"> Terms and Conditions </a>
			<a href = "contact.html"> Contact Us </a>
		</div>
		
		<div class = "column">
			<h4> My Account </h4>
			<a href = "register.php"> Sign Up </a>
			<a href = "cart.php"> View Cart </a>
			<a href = "cart.php"> My Wishlist </a>
			<a href = "checkout.php"> Track My Order </a>
			<a href = "contact.html"> Help </a>
		</div>
		
		<div class = "column installing">
			<h4> Install App </h4>
			<p> From App Store or Google Play </p>
			<div class = "rows">
			<img src = "images/footer/apps.png" alt = "">
			</div>
			<p> Secure Payment Gateways </p>
			<img src = "images/footer/payment.png" alt = "">
		</div>
		<div class = "copyright">
			<p> @ 2022, My Ecommerce Website </p>
		</div>
	</footer>
	
	<script src = "script.js"></script>
</body>

</html>