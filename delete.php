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
<title>Untitled 1</title>
</head>

<body>
<?php
	include("dbconnection.php");
	$reservation_id=$_GET['reservation_id'];
	$q = "delete from reservationtbl where reservation_id='$reservation_id'";
	$s = $con->query($q);
	$s->execute();
	echo "<center style='margin-top: 200px;font-size: 30px;'>Order Canceled successfully.<br>";
	echo "<br><a href='view_orders.php'>View Orders</a></center>";



?>

</body>

</html>
