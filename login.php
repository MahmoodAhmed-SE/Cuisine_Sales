<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 40%;
            margin: 100px auto;
            background-color: #fff;
            border: 5px solid #800000;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            font-size: 40pt;
            color: #B75B00;
        }

        .sub-header {
            text-align: center;
            font-size: xx-large;
            color: #800000;
            margin-bottom: 20px;
        }

        .form-table {
            width: 100%;
        }

        .form-table td {
            padding: 10px;
        }

        .form-table .label {
            width: 30%;
            text-align: right;
            font-size: x-large;
            color: #800000;
            font-weight: bold;
        }

        .form-table .input-field {
            width: 70%;
        }

        .form-table input[type=text], .form-table input[type=password] {
            width: calc(100% - 12px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-table input[type=submit], .form-table input[type=reset] {
            width: 48%;
            padding: 10px;
            background-color: #800000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-sizing: border-box;
        }

        .form-table input[type=submit]:hover, .form-table input[type=reset]:hover {
            background-color: #600000;
        }

        .register-link {
            text-align: center;
            margin-top: 20px;
        }

        .register-link a {
            color: #800000;
            font-weight: bold;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #ff0000;
            text-align: center;
            margin-top: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">&nbsp;</div>
        <div class="sub-header"><strong>Login Page</strong></div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <table class="form-table">
                <tr>
                    <td class="label">User Name</td>
                    <td class="input-field"><input name="customer_name" type="text"></td>
                </tr>
                <tr>
                    <td class="label">Password</td>
                    <td class="input-field"><input name="customer_password" type="password"></td>
                </tr>
                <tr>
                    <td colspan="2" class="input-field">
                        <input name="login" type="submit" value="Login">
                        <input name="Reset1" type="reset" value="Cancel">
                    </td>
                </tr>
            </table>
        </form>
        <div class="register-link"><a href="register.php">Not yet Registered? Register Now</a></div>

        <?php
        session_start();
        include("dbconnection.php");
        if (isset($_POST['login'])) {
            if (!empty($_POST['customer_name'] && $_POST['customer_password'])) {
                $customer_name = $_POST['customer_name'];
                $customer_password = $_POST['customer_password'];

                $q = "select * from logintbl where customer_name='$customer_name' and customer_password='$customer_password'";
                $s = $con->query($q);
                $s->execute();
                $row = $s->fetch(PDO::FETCH_ASSOC);
                $n = $s->rowCount();

                if ($n > 0) {
                    $_SESSION['customer_id'] = $row['customer_id'];
                    $_SESSION['customer_name'] = $customer_name;
                    header('Location:homepage.php');
                    exit();
                } else {
                    echo "<div class='error-message'><br>Invalid username or Password. Please try again.</div>";
                }
            } else {
                echo "<div class='error-message'><br><br>Please fill in all the fields.</div>";
            }
        }
        ?>
    </div>
</body>

</html>
