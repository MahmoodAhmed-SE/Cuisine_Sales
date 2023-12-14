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
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Untitled 1</title>
</head>

<body>
<?php
include("dbconnection.php");

$quantity=$_POST['quantity'];
$cuisine_id=$_POST['cuisine_id'];
$reservation_id = $_POST['reservation_id'];


$q="update reservationtbl set quantity='$quantity', cuisine_id='$cuisine_id' where reservation_id='$reservation_id'";
$s=$con->query($q);
$s->execute(); 

echo "<center style='margin-top: 200px;font-size: 30px;'>Order Updated successfully.<br>";
echo "<br><a href='view_orders.php'>View Orders</a></center>";
?>
</body>

</html>
