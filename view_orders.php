<?php
	session_start();
	if(!isset($_SESSION['customer_id']))
	{
		header("location:login.php");
	}
?>

<!DOCTYPE html>
<html>

<head>
<meta content="en-us" http-equiv="Content-Language">
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>View Order Page</title>
<style type="text/css">
body {
	margin: 0px;
	background-color:#f2f2f2;
}
.auto-style1 {
	text-align: center;
	font-family: Calibri;
	font-size: xx-large;
	color: #663300;
}
.auto-style2 {
	border: 1px solid #400040;
	font-family: Calibri;
	text-align: center;
	color: #663300;
	font-size: large;
}
.auto-style5 {
	border: 1px solid #00FFFF;
	font-family: Calibri, sans-serif;
	text-align: center;
	color: #663300;
	font-size: large;
}
.auto-style6 {
	border: 2px solid #000000;
}
.menu {
	background-color: white;
	height:60px;
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

</style>
</head>

<header>
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
</header>
<body>

<p>&nbsp;</p>
<?php
	include ("dbconnection.php");
	

	// 1 is the existing customer_id for admin
	if ($_SESSION['customer_id'] == 1) {
		$q="select * from reservationtbl order by quantity";
		$s=$con->query($q);
		$s->execute();
		$rows=$s->fetchAll(PDO::FETCH_ASSOC);
		$number_of_rows = $s->rowCount();
		
		if ($number_of_rows > 0) {
			echo "<p class='auto-style1'>&nbsp;<strong>Administrative View Order Details</strong></p>"; 
			echo "<table align='center' style='width: 70%; height: 23' class='auto-style6'>";
			echo "	<tr>";
			echo "		<td class='auto-style2' style='width: 169px'>";
			echo "		<strong>Reservation ID</strong></td>";
			echo "		<td class='auto-style2' style='width: 187px'>";
			echo "		<strong>Customer ID</strong></td>";
			echo "		<td class='auto-style2' style='width: 190px'><strong>Customer Name</strong></td>";			
			echo "		<td class='auto-style2' style='width: 181px' style='width: 169px'><strong>Reservation Date</strong></td>";
			echo "		<td class='auto-style2' style='width: 137px'><strong>Quantity </strong></td>";
			echo "		<td class='auto-style2' style='width: 163px'><strong>Dish Name</strong></td>";
			echo "		<td class='auto-style2' style='width: 160px'><strong>Total Price</strong></td>";
			echo "		<td class='auto-style2' style='width: 150px'><strong>Delete</strong></td>";
			echo "		<td class='auto-style2' style='width: 150px'><strong>Update</strong></td>";
			echo "	</tr>";
			
			foreach($rows as $row)
			{
				$q="select * from cuisinetbl where cuisine_id='{$row['cuisine_id']}'";
				$s=$con->query($q);
				$cuisine_row=$s->fetch(PDO::FETCH_ASSOC);
				$total = $cuisine_row['price'] * $row['quantity'];
				
				$q2="select * from logintbl where customer_id='{$row['customer_id']}'";
				$s2=$con->prepare($q2);
				$s2->execute();
				$customer_row = $s2->fetch(PDO::FETCH_ASSOC);
				
				echo "<tr>";
					echo "<td class='auto-style2'><center>{$row['reservation_id']}</center></td>";
					echo "<td class='auto-style2'><center>{$row['customer_id']}</center></td>";
					echo "<td class='auto-style2'><center>{$customer_row['customer_name']}</center></td>";
					echo "<td class='auto-style2'><center>{$row['reservation_date']}</center></td>";
					echo "<td class='auto-style2'><center>{$row['quantity']}</center></td>";
					echo "<td class='auto-style2'><center>{$cuisine_row['cuisine_name']}</center></td>";
					echo "<td class='auto-style2'><center>{$total}</center></td>";
					echo "<td class='auto-style2'><center><a href='delete.php?reservation_id={$row['reservation_id']}'onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a><center></td>";
					echo "<td class='auto-style2'><center><a href='update.php?reservation_id={$row['reservation_id']}'>Update</a><center></td>";
				echo "</tr>";
			}
			echo "</table>";
		} else {
			echo "<center style='margin-top: 200px;'><h1>No reservations added yet.<br><a href='order.php'>Order as an admin</a></h1></center>";
		}
		
		
	} 
	else 
	{
		$q="SELECT * FROM reservationtbl WHERE customer_id='{$_SESSION['customer_id']}'";
		$s=$con->query($q);
		$s->execute();
		$row=$s->fetch(PDO::FETCH_ASSOC);
		$number_of_rows = $s->rowCount();
		
		if ($number_of_rows > 0) {
			$q="SELECT * FROM cuisinetbl WHERE cuisine_id='{$row['cuisine_id']}'";
			$s=$con->query($q);
			$s->execute();
			$cuisine_row=$s->fetch(PDO::FETCH_ASSOC);
			$total = $cuisine_row['price'] * $row['quantity'];
			echo "<p class='auto-style1'>&nbsp;<strong>View Order Details</strong></p>"; 
			echo "<table align='center' style='width: 70%; height: 23' class='auto-style6'>";
			echo "	<tr>";
			echo "		<td class='auto-style2' style='width: 163px'><strong>Dish Name</strong></td>";
			echo "		<td class='auto-style2' style='width: 137px'><strong>Quantity </strong></td>";						
			echo "		<td class='auto-style2' style='width: 160px'><strong>Total Price</strong></td>";
			echo "		<td class='auto-style2' style='width: 181px'><strong>Reservation Date</strong></td>";
			echo "		<td class='auto-style2'><strong>Delete</strong></td>";
			echo "		<td class='auto-style2'><strong>Update</strong></td>";
			echo "	</tr>";
			

			echo "<tr>";
				echo "<td class='auto-style2'><center>{$cuisine_row['cuisine_name']}</center></td>";
				echo "<td class='auto-style2'><center>{$row['quantity']}</center></td>";
				echo "<td class='auto-style2'><center>{$total} OMR</center></td>";
				echo "<td class='auto-style2'><center>{$row['reservation_date']}</center></td>";
				echo "<td class='auto-style2'><center><a href='delete.php?reservation_id={$row['reservation_id']}'onclick=\"return confirm('Are you sure you want to delete?');\">Delete</a><center></td>";
				echo "<td class='auto-style2'><center><a href='update.php?reservation_id={$row['reservation_id']}'>Update</a><center></td>";
			echo "</tr>";
			echo "</table>";
		} else {
			echo "<center style='margin-top: 200px;'><h1>No items added yet. <a href='order.php'>Order now!</a></h1></center>";
		}
			
	}
	
?>


</body>

</html>
