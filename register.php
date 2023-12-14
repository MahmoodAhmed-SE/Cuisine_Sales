<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
            font-size: xx-large;
            color: #800000;
        }

        .form-table {
            width: 100%;
        }

        .form-table td {
            padding: 10px;
        }

        .form-table .label {
            width: 30%;
            text-align: center;
            font-size: x-large;
            color: #800000;
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

        .form-table input[type=submit] {
            width: 100%;
            padding: 10px;
            background-color: #800000;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            box-sizing: border-box;
        }

        .form-table input[type=submit]:hover {
            background-color: #600000;
        }

        .login-link {
            text-align: center;
            margin-top: 20px;
            color: #800000;
        }

        .login-link a {
            color: #800000;
            font-weight: bold;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header"><strong>Register To Order</strong></div>
        <form action="register_code.php" method="post">
            <table class="form-table">
                <tr>
                    <td class="label"><strong>Username</strong></td>
                    <td class="input-field"><input name="customer_name" type="text"></td>
                </tr>
                <tr>
                    <td class="label"><strong>Password</strong></td>
                    <td class="input-field"><input name="customer_password" type="password"></td>
                </tr>
                <tr>
                    <td class="label" colspan="2">
                        <input name="register" type="submit" value="Register">
                    </td>
                </tr>
            </table>
        </form>
        <div class="login-link"><a href="login.php">Click Here if you already have an Account</a></div>
    </div>
</body>

</html>