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
if (isset($_POST['search'])) {
	$id = $_POST['product_id'];
	$product_query = "SELECT * FROM Product WHERE product_id = $id";

	$product_query_result = mysqli_query($connection, $product_query);
	if (!$product_query_result) {
		die("Database query failed."); // bad query syntax error
	}
	if (mysqli_num_rows($product_query_result) == 0) {
		header("Location: id_not_existed.php");
	}
	$product_arr = mysqli_fetch_assoc($product_query_result);
	$carid = $product_arr['product_id'];


	// id doesn't exist check

	/*$idcheck = "SELECT product_id FROM Product";
	$idcheck_result = mysqli_query($connection, $idcheck);
	$idcheck_result_arr = mysqli_fetch_assoc($idcheck_result);
	if (in_array($carid, $idcheck_result_arr)) {
		header("Location: id_not_existed.php");
	}*/

	$brand = $product_arr['car_brand'];
	$model = $product_arr['car_model'];
	$year = $product_arr['car_model_year'];
	$color = $product_arr['car_color'];
	$vin = $product_arr['vin'];
	$price = $product_arr['car_price'];
}
?>
<?php
if (isset($_POST['submit'])) {
	$carid2 = $_POST['product_id'];
	$brand2 = $_POST['car_brand'];
	$model2 = $_POST['car_model'];
	$year2 = $_POST['car_model_year'];
	$color2 = $_POST['car_color'];
	$vin2 = $_POST['vin'];
	$price2 = $_POST['car_price'];

	$update_query = "UPDATE Product SET car_brand = '$brand2', car_model = '$model2', car_model_year = '$year2', car_color = '$color2', vin = '$vin2', car_price = '$price2' WHERE product_id = '$carid2'";

	$update_result = mysqli_query($connection, $update_query);

	echo "Debugging: ";
	print_r($_POST);

	if ($update_result) {
		echo "Success!";
	} else {
		print_r($_POST);
		die("Database query failed. " . mysqli_error($connection));
	}

	header("Location: editSuccess.php");
}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="jquery-3.4.1.js"></script>
	<script src="ricks.js"></script>
	<title>Edit Existed Car(s)</title>
</head>

<body>
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="employees.php">Additional Actions</a></li>
				<li class="breadcrumb-item"><a href="addInv.php">Add Car</a></li>
				<li class="breadcrumb-item active" aria-current="editInv.php">Edit Car</li>
			</ol>
		</nav>
	</div>
	<div class="container" style="margin-top: 50px">
		<h2 class="title">Edit Existed Car(s)</h2>
		<div class="card">
			<div class="card-body">
				<form action="editInv.php" method="post">
					<div class="form-group row">
						<label for="product_id" class="col-sm-2 col-form-label">Car ID: </label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="product_id" value="<?php echo $carid; ?>" />
						</div>
					</div>
					<div class="form-group row">
						<label for="car_brand" class="col-sm-2 col-form-label">Car Brand: </label>
						<div class="col-sm-10">
							<input class="form-control" class="form-control" type="text" name="car_brand" value="<?php echo $brand; ?>" />
						</div>
					</div>
					<div class="form-group row">
						<label for="car_model" class="col-sm-2 col-form-label">Car Model: </label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="car_model" value="<?php echo $model; ?>" />
						</div>
					</div>
					<div class="form-group row">
						<label for="car_model_year" class="col-sm-2 col-form-label">Model Year: </label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="car_model_year" value="<?php echo $year; ?>" />
						</div>
					</div>
					<div class="form-group row">
						<label for="vin" class="col-sm-2 col-form-label">VIN: </label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="vin" value="<?php echo $vin; ?>" />
						</div>
					</div>
					<div class="form-group row">
						<label for="car_price" class="col-sm-2 col-form-label">Price $: </label>
						<div class="col-sm-10">
							<input class="form-control" type="text" name="car_price" value="<?php echo $price; ?>" />
						</div>
					</div>
					<div class="form-group row">
						<label for="car_color" class="col-sm-2 col-form-label">Color: </label>
						<div class="col-sm-10">
							<select class="form-control" name="car_color">
								<option value="Aquamarine" <?php echo ($color == 'Aquamarine') ? 'selected="selected"' : ''; ?>>Aquamarine</option>
								<option value="Blue" <?php echo ($color == 'Blue') ? 'selected="selected"' : ''; ?>>Blue</option>
								<option value="Crimson" <?php echo ($color == 'Crimson') ? 'selected="selected"' : ''; ?>>Crimson</option>
								<option value="Fuscia" <?php echo ($color == 'Fuscia') ? 'selected="selected"' : ''; ?>>Fuscia</option>
								<option value="Goldenrod" <?php echo ($color == 'Goldenrod') ? 'selected="selected"' : ''; ?>>Goldenrod</option>
								<option value="Green" <?php echo ($color == 'Green') ? 'selected="selected"' : ''; ?>>Green</option>
								<option value="Indigo" <?php echo ($color == 'Indigo') ? 'selected="selected"' : ''; ?>>Indigo</option>
								<option value="Khaki" <?php echo ($color == 'Khaki') ? 'selected="selected"' : ''; ?>>Khaki</option>
								<option value="Maroon" <?php echo ($color == 'Maroon') ? 'selected="selected"' : ''; ?>>Maroon</option>
								<option value="Mauv" <?php echo ($color == 'Mauv') ? 'selected="selected"' : ''; ?>>Mauv</option>
								<option value="Orange" <?php echo ($color == 'Orange') ? 'selected="selected"' : ''; ?>>Orange</option>
								<option value="Pink" <?php echo ($color == 'Pink') ? 'selected="selected"' : ''; ?>>Pink</option>
								<option value="Puce" <?php echo ($color == 'Puce') ? 'selected="selected"' : ''; ?>>Puce</option>
								<option value="Purple" <?php echo ($color == 'Purple') ? 'selected="selected"' : ''; ?>>Purple</option>
								<option value="Red" <?php echo ($color == 'Red') ? 'selected="selected"' : ''; ?>>Red</option>
								<option value="Teal" <?php echo ($color == 'Teal') ? 'selected="selected"' : ''; ?>>Teal</option>
								<option value="Turquoise" <?php echo ($color == 'Turquoise') ? 'selected="selected"' : ''; ?>>Turquoise</option>
								<option value="Violet" <?php echo ($color == 'Violet') ? 'selected="selected"' : ''; ?>>Violet</option>
								<option value="Yellow" <?php echo ($color == 'Yellow') ? 'selected="selected"' : ''; ?>>Yellow</option>
							</select> </div>
					</div>
					<div><input class="btn btn-primary" type="submit" name="submit" value="Submit"></div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>

<?php
// 5. Close database connection
mysqli_close($connection);
?>