<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Order logic</title>
</head>

<body>
<?php
session_start();

if (!isset($_SESSION['customer_id'])) {
    header("location:login.php");
}

if (isset($_POST['submit'])) {
    $customer_id = $_SESSION['customer_id'];
    include("dbconnection.php");
	
	if (!empty($_POST['cuisine_id'] && $_POST['quantity'])) {	
		$current_date = date("Y:m:d");
		$cuisine_id = $_POST['cuisine_id'];
		$quantity = $_POST['quantity'];
		
	   	$query = "INSERT INTO reservationtbl(customer_id, cuisine_id, reservation_date, quantity) VALUES (?,?,?,?)";
		$s = $con->prepare($query);
		$s->execute([$customer_id, $cuisine_id, $current_date, $quantity]);	
		
		echo "<center style='margin-top: 200px;font-size: 30px;'>Order submitted successfully.<br>";
		echo "<br><a href='view_orders.php'>View Orders</a></center>";
	} else {
		header("location:order.php");
	}
    
} else {
    echo "An error occurred. Please return to <a href='order.php'>Order page</a>";
}
?>
</body>

</html>
