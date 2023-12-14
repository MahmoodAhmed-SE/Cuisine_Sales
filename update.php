<?php
session_start();
if (!isset($_SESSION['customer_id'])) {
    header("location:login.php");
}

include("dbconnection.php");

$reservation_id = $_GET['reservation_id'];

$q = "select * from reservationtbl where reservation_id='$reservation_id'";
$s = $con->query($q);
$s->execute();

$row = $s->fetch(PDO::FETCH_ASSOC);
$reservation_id = $row['reservation_id'];
$customer_id = $row['customer_id'];
$reservation_date = $row['reservation_date'];
$quantity = $row['quantity'];
$cuisine_id = $row['cuisine_id'];

$q = "select * from cuisinetbl where cuisine_id='{$row['cuisine_id']}'";
$s = $con->query($q);
$cuisine_row = $s->fetch(PDO::FETCH_ASSOC);

$cuisine_name = $cuisine_row['cuisine_name'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Reservation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 35%;
            margin: 50px auto;
            background-color: #fff;
            border: 3px solid #800000;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-table {
            width: 100%;
        }

        .form-table td {
            padding: 10px;
        }

        .form-table .label {
            text-align:left;
            width: 30%;
            color: #800000;
            font-size: x-large;
        }

        .form-table .input-field,
        .form-table select {
            width: 70%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            text-align:center;
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

        .return-link {
            text-align: center;
            margin-top: 20px;
            color: #6699FF;
        }

        .return-link a {
            color: #6699FF;
            font-weight: bold;
            text-decoration: none;
        }

        .return-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <div class="container">
        <form action='update_code.php' method='post'>
            <table class='form-table'>
                <tr>
                    <td class='label'><strong>Reservation&nbsp;ID</strong></td>
                    <td>
                        <input name='reservation_id' type='text' readonly value="<?php echo $reservation_id; ?>">
                    </td>
                </tr>
                <tr>
                    <td class='label'><strong>Customer&nbsp;ID</strong></td>
                    <td>
                        <input name='customer_id' type='text' readonly value="<?php echo $customer_id; ?>">
                    </td>
                </tr>
                <tr>
                    <td class='label'><strong>Reservation&nbsp;Date</strong></td>
                    <td>
                        <input name='reservation_date' type='text' readonly value="<?php echo $reservation_date; ?>">
                    </td>
                </tr>
                <tr>
                    <td class='label'><strong>Quantity</strong></td>
                    <td>
                        <input name='quantity' type='text' value="<?php echo $quantity; ?>">
                    </td>
                </tr>
                <tr>
                    <td class='label'><strong>Cuisine&nbsp;Name</strong></td>
                    <td>
                        <select name="cuisine_id">
                            <option value="<?php echo $cuisine_id ?>" selected=""><?php echo "$cuisine_name"; ?></option>
                            <?php
                            $query = "select * from cuisinetbl";
                            $s = $con->prepare($query);
                            $s->execute();
                            $rows = $s->fetchAll(PDO::FETCH_ASSOC);

                            foreach ($rows as $row) {
                                echo "<option value='{$row['cuisine_id']}'>{$row['cuisine_name']}</option>";
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan='2'>
                        <input name='update' type='submit' value='Update'>
                        <input name='Reset1' type='reset' value='Reset changes' onclick="confirm('Are you sure you want to discard changes?')">
                    </td>
                </tr>
            </table>
        </form>
        <div class='return-link'><a href="view_orders.php">Return to view orders page</a></div>
    </div>
</body>

</html>