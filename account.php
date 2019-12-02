<?php
// Create a database connection
$dbhost = "localhost";
$dbuser = "root"; // username here
$dbpass = "19960120toBY!!"; // password here
$dbname = "db"; // db name here
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Test if connection succeeded
if (mysqli_connect_errno()) {
	die("Database connection failed: " .
		mysqli_connect_error() .
		" (" . mysqli_connect_errno() . ")");
}
?>
<?php
$id = $_POST['customer_id'];

$get_account = "SELECT * FROM Accounts WHERE customer_id = '$id'";

$account_result = mysqli_query($connection, $get_account);
if (!$account_result) {
	die("Database id query failed."); // bad query syntax
}
else if (mysqli_num_rows($account_result) == 0) {
	header("Location: custid_not_existed.php");
}

$account_row = mysqli_fetch_assoc($account_result);
$balance = $account_row['balance'];
?>
<?php
if (isset($_POST['Pay'])) {
	$balance = $_POST['balance'];

	$carid = $_POST['carid'];
	$car_check_query = "SELECT * FROM Product WHERE product_id = $carid";
	$car_check_result = mysqli_query($connection, $car_check_query);
	if (mysqli_num_rows($car_check_result) == 0) {
		die("Car Check Failed.");
		/*header("Location: bad_make_payment.php"); // car doesn't exist constraint */
	}

	// extract data from Object[]

	$sprice = "SELECT car_price FROM product WHERE product_id = '$carid'";
	$sprice_result = mysqli_query($connection, $sprice);
	$sprice_result_arr = mysqli_fetch_assoc($sprice_result);
	$price = $sprice_result_arr["car_price"];
	if (!$price) {
		die("Database query failed."); // bad query syntax error
	}

	if ($balance >= $price) {
		$new_bal = $balance - $price;
	} else {
		header("Location: no_enough_money.php"); // no enough money constraint
	}

	$empid = $_POST['empid'];
	$employee_check_query = "SELECT DISTINCT emp_id FROM Employees WHERE emp_id = '$empid'";
	$employee_check_result = mysqli_query($connection, $employee_check_query);
	if (!$employee_check_result) {
		die("Database query failed."); // bad query syntax
	} else if (mysqli_num_rows($employee_check_result) == 0) {
		die("Employee Check Failed.");
		/*header("Location: bad_make_payment.php"); // wrong employee number constraint*/
	}

	$date = $_POST['date'];

	$sbrand = "SELECT car_brand FROM product WHERE product_id = '$carid'";
	$sbrand_result = mysqli_query($connection, $sbrand);
	$sbrand_result_arr = mysqli_fetch_assoc($sbrand_result);
	$brand = $sbrand_result_arr["car_brand"];
	if (!$brand) {
		die("Database query failed."); // bad query syntax error
	}

	$smodel = "SELECT car_model FROM product WHERE product_id = '$carid'";
	$smodel_result = mysqli_query($connection, $smodel);
	$smodel_result_arr = mysqli_fetch_assoc($smodel_result);
	$model = $smodel_result_arr["car_model"];
	if (!$model) {
		die("Database query failed."); // bad query syntax error
	}

	$syear = "SELECT car_model_year FROM product WHERE product_id = '$carid'";
	$syear_result = mysqli_query($connection, $syear);
	$syear_result_arr = mysqli_fetch_assoc($syear_result);
	$year = $syear_result_arr["car_model_year"];
	if (!$year) {
		die("Database query failed."); // bad query syntax error
	}

	$svin = "SELECT vin FROM product WHERE product_id = '$carid'";
	$svin_result = mysqli_query($connection, $svin);
	$svin_result_arr = mysqli_fetch_assoc($svin_result);
	$vin = $svin_result_arr["vin"];
	if (!$vin) {
		die("Database query failed."); // bad query syntax error
	}

	$max_query = "SELECT MAX(order_id) FROM Transaction";
	$max_result = mysqli_query($connection, $max_query);
	if (!$max_result) {
		die("Database query failed."); // bad query syntax error
	}
	$max_row = mysqli_fetch_assoc($max_result);
	$max = $max_row["MAX(order_id)"];
	$orderid = $max + 1;

	$payment_query = "UPDATE Accounts SET balance = '$new_bal' WHERE customer_id = '$id'";
	$payment_result = mysqli_query($connection, $payment_query);

	if ($payment_result) {
		echo "Successfully updated balance. Current Balance: $" . $new_bal . ". ";
	} else {
		die("Database update query failed."); // bad query syntax
	}

	$tran_query = "INSERT INTO Transaction (order_id, order_date, emp_id, product_id, customer_id, car_price, car_brand, car_model, car_model_year, vin) VALUES ($orderid, '$date', '$empid', '$carid', '$id', '$price', '$brand', '$model', '$year', '$vin')";
	$tran_result = mysqli_query($connection, $tran_query);

	if ($tran_result) {
		echo "Successfully updated Transaction. ";
	} else {
		die("Database insert query failed."); // bad query syntax
	}

	$sale_query = "DELETE FROM Product WHERE product_id = '$carid'";
	$sale_result = mysqli_query($connection, $sale_query);

	if ($tran_result) {
		echo "Successfully updated Products.";
	} else {
		die("Database delete query failed."); // bad query syntax
	}

	header("Location: paymentSuccess.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="js/jquery-3.4.1.js"></script>
	<title>Customer Account</title>
</head>

<body>
<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="customers.php">Main Page</a></li>
				<li class="breadcrumb-item active" aria-current="account.php">Account for customers</li>
			</ol>
		</nav>
	</div>
	<main>
	<br>
	<h2 style="text-align: center">Account for Customer <?php echo $id; ?>:</h2>
	<div class="container">
		<div class="card" style=" margin-top: 100px">
			<div class="card-body">
				<form action="account.php" method="post">
					<div class="form-group">
						<label for="balance">Current Account Balance: </label>
						<input type="text" class="form-control" name="balance" value="<?php echo $balance; ?>" />
					</div>
					<div class="form-group">
						<label for="carid">Car Id He/She wants to Buy: </label>
						<input type="text" class="form-control" name="carid" /> <!-- need a validation method here -->
					</div>
					<div class="form-group">
						<label for="empid">Enter Your Employee ID: </label>
						<input type="text" class="form-control" name="empid" /> <!-- need a validation method here -->
					</div>
					<div class="form-group">
						<label for="date">Enter Today's Date: </label>
						<input type="text" class="form-control" name="date" placeholder="YYYYMMDD" />
					</div>
					<div class="form-group">
						<label for="customer_id" method="post">Enter Customer ID Again to Confirm: </label>
						<input type="text" class="form-control" name="customer_id" />
					</div>
					<div>
						<form method="post">
							<input class="btn btn-primary" type="submit" name="Pay" value="Make Payment">
						</form>
					</div>
				</form>
			</div>
		</div>
	</div>
	</main>
</body>

</html>

<?php
// 5. Close database connection
mysqli_close($connection);
?>