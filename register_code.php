<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Untitled 1</title>
</head>

<body>
<?php
include("dbconnection.php");
if(isset($_POST['register']))
{
	if(!empty($_POST['customer_name'] && $_POST['customer_password']))
	{
		$customer_name=$_POST['customer_name'];
		$customer_password=$_POST['customer_password'];

		$q="select * from logintbl where customer_name='$customer_name'";
		$s=$con->query($q);
		$s->execute();
		$row=$s->fetch(PDO::FETCH_ASSOC);

		$n=$s->rowCount();
		if($n>0)
		{
			echo "<p>The Username is already exist</p><br>";
		}
		else
		{
			
				$q="insert into logintbl (customer_name,customer_password) values(:n,:p)";
				$s=$con->prepare($q);
				$s->execute(array(':n'=>$_POST['customer_name'],':p'=>$_POST['customer_password']));
				header("Location:login.php");
		}
	}
	else
	{
		echo "<br> Please Fill All Fileds First";
	}

}



?>
</body>

</html>
