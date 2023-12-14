<?php
session_start();
if(!isset($_SESSION['customer_id']))
{
	header("location:login.php");
}
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="en-us" http-equiv="Content-Language" />
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Cuisine Sales</title>
<style type="text/css">
body {
	background-color: #f2f2f2;
	margin: 0px;
}
.menu {
	background-color: white;
	height:60px;
}

.auto-style2 {
	padding: 0px 10px;
	text-align: left;
	font-size: x-large;
	padding-top: 10px;
}
.auto-style3 {
	text-align: center;
	font-size: x-large;
}

.auto-style3:hover {
	background-color: #f2f2f2;
	border-radius: 10px;
	transition: 500ms;
	text-align: center;
	font-size: x-large;
}

.auto-style3:first-child:hover {
	background-color: transparent;
	border-radius: none;
	transition: none;
}

.al{
	text-decoration:none;
	color: black;
}
.al:link{
	color: black;
}


.main-button {
	margin-top:50px;
    display: inline-block;
    padding: 15px 50px;
    font-size: 16px;
    font-weight: bold;
    text-align: center;
    text-decoration: none;
    background-color: #3498db;
    color: #fff;
    border-radius: 5px;
    border: 2px solid #2980b9;
    transition: background-color 0.3s ease;
    cursor: pointer;
}

.main-button:hover {
    background-color: #2980b9;
}
.auto-style4 {
	text-align: center;
}
</style>
</head>

<body>

<div class="menu">
	<table style="width: 100%; height:100%;">
		<tr>
			<td class="auto-style3" style="width: 400px">Cuisine Sales</td>
			<td class="auto-style3"><a class="al" href="homepage.php">Homepage</a></td>
			<td class="auto-style3"><a class="al" href="order.php">Order</a></td>
			<td class="auto-style3"><a class="al" href="view_orders.php">View Orders</a></td>
			<td class="auto-style3"><a class="al" href="logout.php" style="color: #FC0303">Logout</a></td>
		</tr>
	</table>
</div>


<table style="width: 100%; margin-top: 60px;">
	<tr>
		<td class="auto-style2">
			<div class="auto-style4">
			Embark on a Culinary Journey with Our Cuisine Sales Website — Where 
			Flavor Meets Convenience, and Every Click is an Adventure in Taste!
			<br>
			</div>
			<center><a href="order.php" class="main-button">Explore Now!</a></center>
		</td>
		<td style="padding-right: 10px;">
			<img alt="Curry" height="400" src="images/main_food/curry.jpg" width="600" />
		</td>
	</tr>
</table>

</body>

</html>
