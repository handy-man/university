<?php
/*------------------------\
|        TTT STATS        |
|	       Beta           |
|=========================|
|© 2013 SNGaming.org      |
|	All Rights Reserved   |
|=========================|
| 	Website printout      |
| 	   beta testing       |
| 	   by Handy_man       |
\------------------------*/		
require("./includes/session_start.php");	
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
		<meta name="description=" content="A hotel booking website!">
		<meta name="author" content="Nathan Hand, www.thehiddennation.com">
		<meta name="keywords" content="Hotel booking">
		<link href="static/main.css" media="screen" rel="stylesheet" type="text/css" />
		<title>[Hotel Booking]</title>
	</head>
			<body>
				<div id="page">
				
			

				<div id="logo">
				<a href="./index.php"><img src="./static/images/booking_logo.png" alt="hotel booking logo" title="hotel booking logo"/></a>
				</div>
						<div id='search'>
							<form name="input" action="search.php" method="get">
							<input type="text" name="s" placeholder="City, hotel name, etc." value required>
							<input type="submit" value="Search">
							</form>
							
							
						</div>
					
					<nav>
						<ul>
						<li>
						<a href="index.php">Home</a>
						</li>
						<li>
							<a href="services.php">Services</a>
						</li>
						<li>
							<a href="client.php">Client</a>
						</li>
						<li>
							<a href="customers.php">Customers</a>
						</li>
						<li>
						<a href="login.php">Login</a>
						</li>
							<li>
						<a href="cart.php">Cart</a>
						</li>
						</li>
						</ul>
					</nav>
					