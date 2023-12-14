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
<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
<title>Order</title>
<style>
body{
	margin: 0px;
	background-color:#f2f2f2;
}

.product-card {
	background-color:rgba(255,255,255,0.8);
    width: 500px;
    border: 1px solid #ccc;
    padding: 30px;
    text-align:left;
}

.product-image {
    max-width: 100%;

    height:300px;
    margin-bottom: 10px;
}

.quantity-input {
    width: 50px;
    text-align: center;
}

.submit-button {
    padding: 15px 20px;
    background-color: #f1f1f1;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
	text-align:center;
}

.submit-button:hover {
    background-color: #60B636;
    transition: 500ms;
}

.asubmit {
	width:100%;
	height:100%;
	color: black;
	border:none;
	background:transparent;
	font-size:20px;
	text-decoration:none;    
}


.grid-container {
    display: grid;
    grid-template-columns: repeat(2, 1fr); /* Two columns with equal width */
    gap: 20px; /* Adjust the gap between items */
    padding: 20px;
}

.grid-item {
    border: 1px solid #ccc;
    padding: 20px;
    text-align: center;
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

<body>

<div class="menu">
	<table style="width: 100%; height:100%;">
		<tr>
			<td class="auto-style3" style="width: 400px">Cuisine Sales</td>
			<td class="auto-style3"><a class="al" href="homepage.php">Homepage</a></td>
			<td class="auto-style3"><a class="al" href="order.php">Order</a></td>
			<td class="auto-style3"><a class="al" href="view_orders.php">View Cart</a></td>
			<td class="auto-style3"><a class="al" href="logout.php" style="color: #FC0303">Logout</a></td>
		</tr>
	</table>
</div>
<center><h1 style='font-size:35px;padding-top:30px;'>CUISINE SALES</h1></center> 
<?php
        include("dbconnection.php");
        $query = "SELECT * FROM cuisinetbl";
        $s = $con->prepare($query);
        $s->execute();

        $rows = $s->fetchAll(PDO::FETCH_ASSOC);

        echo "<div class='grid-container'>";
        foreach ($rows as $row) {
        	echo "<form action='order_code.php' method='post'>";
            echo "<div class='grid-item'>";
            echo "<div class='product-card'>";
            echo "<center><img src='{$row['img_path']}' alt='{$row['cuisine_name']}' class='product-image'></center>";
            echo "<p style='font-size: 23px;'>{$row['cuisine_name']}</p>";
            echo "<input type='hidden' name='cuisine_id' value='{$row['cuisine_id']}'";
            echo "<p>Price: {$row['price']} OMR</p>";
            echo "<label for='quantity'>Quantity:</label>  ";
            echo "<input type='number' name='quantity' class='quantity-input' value='1' min='1'>";
            echo "<br><br>";
            echo "<div class='submit-button'><button type='submit' name='submit' class='asubmit'>Add to Cart</button></div>";
            echo "</div><br><br>";
            echo "</div>";
            echo "</form>";
        }
        echo "</div>";
?>

</body>

</html>
