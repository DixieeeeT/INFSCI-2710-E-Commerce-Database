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
if (isset($_POST['login'])) {
	$login_id = $_POST['emp_id'];
	$login_query = "SELECT emp_id FROM Employees WHERE emp_id = '$login_id'";
	$login_result = mysqli_query($connection, $login_query);
	if (!$login_result) {
		die("Database query failed."); // bad query syntax
	} else if (mysqli_num_rows($login_result) != 1) {
		header("Location: bad_login.php");
	}
}
?>
<?php
$max_query = "SELECT MAX(product_id) AS MAXID FROM (
    SELECT product_id
    FROM product
    UNION ALL
    SELECT product_id
    FROM transaction) foo";

$max_result = mysqli_query($connection, $max_query);
if (!$max_result) {
	die("Database query failed."); // bad query syntax error
}

$max_row = mysqli_fetch_assoc($max_result);
$max = $max_row["MAXID"];
$new_id = $max + 1;
?>
<?php
if (isset($_POST['submit'])) {
	$carid = $_POST['product_id'];

	// id has already existed check

	$idcheck = "SELECT product_id FROM Product";
	$idcheck_result = mysqli_query($connection, $idcheck);
	$idcheck_result_arr = mysqli_fetch_assoc($idcheck_result);
	if (in_array($carid, $idcheck_result_arr)) {
		header("Location: id_existed.php");
	}

	$brand = $_POST['car_brand'];
	$model = $_POST['car_model'];
	$year = $_POST['car_model_year'];
	$color = $_POST['car_color'];
	$vin = $_POST['vin'];
	$price = $_POST['car_price'];

	$add_cust = "INSERT INTO Product (product_id, car_brand, car_model, car_model_year, car_color, vin, car_price) VALUES ('$carid', '$brand', '$model', '$year', '$color', '$vin', '$price')";

	$add_result = mysqli_query($connection, $add_cust);
	if ($add_result) {
		echo "Successfully added product " . $id;
	} else {
		die("Database query failed. " . mysqli_error($connection));
	}

	header("Location: addSuccess.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="jquery-3.4.1.js"></script>
	<script src="cars.js"></script>
	<title>Add New Car(s)</title>
</head>

<body>
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="employees.php">Additional Actions</a></li>
				<li class="breadcrumb-item active" aria-current="page">Add Cars</li>
			</ol>
		</nav>
	</div>
	<div class="container" style="margin-top: 50px">
		<h2 class="title">Add New Car(s)</h2>
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">
						<form action="addInv.php" method="post">
							<div class="form-group">
								<label for="product_id">Car ID: </label>
								<input readonly class="form-control" type="text" name="product_id" value="<?php echo $new_id; ?>" />
							</div>
							<div class="form-group">
								<label for="car_brand">Car Brand: </label>
								<input class="form-control" type="text" name="car_brand" />
							</div>
							<div class="form-group">
								<label for="car_model">Car Model: </label>
								<input class="form-control" type="text" name="car_model" />
							</div>
							<div class="form-group">
								<label for="car_model_year">Model Year: </label>
								<input class="form-control" type="text" name="car_model_year" />
							</div>
							<div class="form-group">
								<label for="vin">VIN: </label>
								<input class="form-control" type="text" name="vin" />
							</div>
							<div class="form-group">
								<label for="car_price">Price $: </label>
								<input class="form-control" type="text" name="car_price" />
							</div>
							<div class="form-group">
								<label for="car_color">Color: </label>
								<select class="form-control" name="car_color">
									<option value="">Select Color</option>
									<option value="Aquamarine">Aquamarine</option>
									<option value="Blue">Blue</option>
									<option value="Crimson">Crimson</option>
									<option value="Fuscia">Fuscia</option>
									<option value="Goldenrod">Goldenrod</option>
									<option value="Green">Green</option>
									<option value="Indigo">Indigo</option>
									<option value="Khaki">Khaki</option>
									<option value="Maroon">Maroon</option>
									<option value="Mauv">Mauv</option>
									<option value="Orange">Orange</option>
									<option value="Pink">Pink</option>
									<option value="Puce">Puce</option>
									<option value="Purple">Purple</option>
									<option value="Red">Red</option>
									<option value="Teal">Teal</option>
									<option value="Turquoise">Turquoise</option>
									<option value="Violet">Violet</option>
									<option value="Yellow">Yellow</option>
								</select>
							</div>
							<div class="form-group"><input class="btn btn-primary" type="submit" name="submit" value="Submit" /></div>
						</form>
					</div>
				</div>
			</div>
			<div class="col">
				<h4>
					To edit existed car(s), Please enter the Car ID
					below and click "Search"
				</h4>
				<br>
				<form class="form-inline" action="editInv.php" method="post">
				<div class="form-group mb-2">
						<label for="product_id">Car ID: </label>
					</div>
					<div class="form-group mx-sm-3 mb-2">
						<input class="form-control" type="text" name="product_id" />
					</div>
					<input class="btn btn-primary mb-2" type="submit" name="search" value="Search">
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