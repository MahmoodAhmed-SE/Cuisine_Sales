<!DOCTYPE html>
<html>

<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title>Logout</title>
</head>

<body>
<?php
session_start();
session_unset();
session_destroy();
header("Location:login.php");
?>
</body>

</html>
