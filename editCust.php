<?php
// Create a database connection
$dbhost = "localhost";
$dbuser = "root"; // username here
$dbpass = "root"; // password here
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
if (isset($_POST['search'])) {
	$id = $_POST['customer_id'];

	// Get customer data from Customer table
	$customer_query = "SELECT * FROM Customer WHERE customer_id = $id";
	$customer_result = mysqli_query($connection, $customer_query);
	if (!$customer_result) {
		die("Database query failed."); // bad query syntax error
	}

	$customer_row = mysqli_fetch_assoc($customer_result);
	$id = $customer_row['customer_id'];
	$name = $customer_row['customer_name'];
	$street = $customer_row['customer_address_street'];
	$city = $customer_row['customer_address_city'];
	$state = $customer_row['customer_address_state'];
	$zip = $customer_row['customer_address_zip'];
	$type = $customer_row['customer_type'];

	// Prep variables for home/business
	$marriage = "";
	$gender = "";
	$age = "";
	$home_income = "";
	$category = "";
	$business_income = "";

	// Get customer data from Home or Business table
	if ($type == 'home') {
		// Home table
		$home_query = "SELECT * FROM Customer_Home WHERE customer_id = $id";
		$home_result = mysqli_query($connection, $home_query);
		if (!$home_result) {
			die("Database query failed."); // bad query syntax error
		}

		$home_row = mysqli_fetch_assoc($home_result);
		$marriage = $home_row['marriage_status'];
		$gender = $home_row['gender'];
		$age = $home_row['age'];
		$home_income = $home_row['home_income'];
	} else {
		// Business table
		$business_query = "SELECT * FROM Customer_Business WHERE customer_id = $id";
		$business_result = mysqli_query($connection, $business_query);
		if (!$business_result) {
			die("Database query failed."); // bad query syntax error
		}

		$business_row = mysqli_fetch_assoc($business_result);
		$category = $business_row['business_category'];
		$business_income = $business_row['business_income'];
	}

	// Get customer data from Accounts table
	$account_query = "SELECT * FROM Accounts WHERE customer_id = $id";
	$account_result = mysqli_query($connection, $account_query);
	if (!$account_result) {
		die("Database query failed."); // bad query syntax error
	}

	$account_row = mysqli_fetch_assoc($account_result);
	$balance = $account_row['balance'];
}
?>
<?php
if (isset($_POST['submit'])) {
	$id2 = $_POST['customer_id'];
	$name2 = $_POST['customer_name'];
	$street2 = $_POST['customer_address_street'];
	$city2 = $_POST['customer_address_city'];
	$state2 = $_POST['customer_address_state'];
	$zip2 = $_POST['customer_address_zip'];
	$type2 = $_POST['customer_type'];
	$gender2 = $_POST['gender'];
	$age2 = $_POST['age'];
	$home_income2 = $_POST['home_income'];
	$marriage2 = $_POST['marriage_status'];
	$category2 = $_POST['business_category'];
	$business_income2 = $_POST['business_income'];
	$balance2 = $_POST['balance'];

	// Update Customer Table
	$update_customer_query = "UPDATE Customer SET customer_name = '$name2', customer_address_street = '$street2', customer_address_city = '$city2', customer_address_state = '$state2', customer_address_zip = '$zip2', customer_type = '$type2' WHERE customer_id = '$id2'";

	$update_customer_result = mysqli_query($connection, $update_customer_query);

	if ($update_customer_result) {
		echo "Successfully updated customer " . $id2 . "; ";
	} else {
		die("Database query failed. " . mysqli_error($connection));
	}

	// Update Home/Business Table
	if ($type2 == 'home') {
		$update_home_query = "UPDATE Customer_Home SET marriage_status = '$marriage2', gender = '$gender2', age = '$age2', home_income = '$home_income2' WHERE customer_id = '$id2'";
		$update_home_result = mysqli_query($connection, $update_home_query);
		if ($update_home_result) {
			echo "Successfully updated home customer " . $id2 . "; ";
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
	} else {
		$update_business_query = "UPDATE Customer_Business SET business_category = '$category2', business_income = '$business_income2' WHERE customer_id = '$id2'";
		$update_business_result = mysqli_query($connection, $update_business_query);
		if ($update_business_result) {
			echo "Successfully updated business customer " . $id2 . "; ";
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
	}

	// Update Account
	$update_account_query = "UPDATE Accounts SET balance = '$balance2'";
	$update_account_result = mysqli_query($connection, $update_account_query);
	if ($update_account_result) {
		echo "Successfully updated account #" . $id2;
	} else {
		die("Database query failed. " . mysqli_error($connection));
	}

	header("Location: editSuccess.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="js/jquery-3.4.1.js"></script>
	<script src="js/ricks.js"></script>
	<title>Edit Customer</title>
</head>

<body>
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="employees.php">Employee Login</a></li>
				<li class="breadcrumb-item"><a href="addCust.php">Add Customer</a></li>
				<li class="breadcrumb-item active" aria-current="editCust.php">Edit Customer</li>
			</ol>
		</nav>
	</div>
	<br>
	<div class="container">
		<h2 class="title">Edit Customer</h2>
		<div class="card" style="margin-top: 20px">
			<div class="card-body">
				<form action="editCust.php" method="post">
					<div class="form-group row">
						<label for="customer_id" class="col-sm-2 col-form-label">Customer ID: </label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="customer_id" value="<?php echo $id; ?>" />
						</div>
					</div>
					<div class="form-group row">
						<label for="customer_name" class="col-sm-2 col-form-label">Name: </label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="customer_name" value="<?php echo $name; ?>" />
						</div>
					</div>
					<div class="form-group row">
						<label for="customer_address_street" class="col-sm-2 col-form-label">Street: </label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="customer_address_street" value="<?php echo $street; ?>" />
						</div>
					</div>
					<div class="form-group row">
						<label for="customer_address_city" class="col-sm-2 col-form-label">City: </label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="customer_address_city" value="<?php echo $city; ?>" />
						</div>
					</div>
					<div class="form-group row">
						<label for="customer_address_state" class="col-sm-2 col-form-label">State Abbr.: </label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="customer_address_state" value="<?php echo $state; ?>" />
						</div>
					</div>
					<div class="form-group row">
						<label for="customer_address_zip" class="col-sm-2 col-form-label">Zip: </label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="customer_address_zip" value="<?php echo $zip; ?>" />
						</div>
					</div>
					<div class="form-group row">
						<label for="customer_type" class="col-sm-2 col-form-label">Type: </label>
						<div class="col-sm-10">
							<select class="form-control" name="customer_type">
								<option value="home" <?php echo ($type == 'home') ? 'selected="selected"' : ''; ?>>Home</option>
								<option value="business" <?php echo ($type == 'business') ? 'selected="selected"' : ''; ?>>Business</option>
							</select>
						</div>
					</div>
					<div id="home" <?php if ($type == 'business') {
															echo ' style="display:none"';
														} ?>>
						<label for="gender">Gender: </label>
						<input class="form-control" type="text" name="gender" value="<?php echo $gender; ?>" /><br />
						<label for="age">Age: </label>
						<input class="form-control" type="text" name="age" value="<?php echo $age; ?>" /><br />
						<label for="home_income">Yearly Income: </label>
						<input class="form-control" type="text" name="home_income" value="<?php echo $home_income; ?>" /><br />
						<label for="marriage_status">Marital Status: </label>
						<input class="form-control" type="text" name="marriage_status" value="<?php echo $marriage; ?>" />
					</div>
					<div id="business" <?php if ($type == 'home') {
																echo ' style="display:none"';
															} ?>>
						<label for="business_category">Type of Business: </label>
						<input class="form-control" type="text" name="business_category" value="<?php echo $category; ?>" /><br />
						<label for="business_income">Yearly Income: </label>
						<input class="form-control" type="text" name="business_income" value="<?php echo $business_income; ?>" />
					</div>
					<p>Account Information:</p>
					<div>
						<label for="balance">Balance: </label>
						<input class="form-control" type="text" name="balance" value="<?php echo $balance; ?>">
					</div>
					<br />
					<div><input class="btn btn-primary" type="submit" name="submit" value="Submit" /></div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>

<?php
// Close database connection
mysqli_close($connection);
?>