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
	$sid = $_POST['product_id'];
	$sbrand = $_POST['car_brand'];
	$smodel = $_POST['car_model'];
	$syear = $_POST['car_model_year'];
	$scolor = $_POST['car_color'];

	//OR car_model LIKE '%$smodel%' OR car_model_year = '$syear' OR car_color = '$scolor'

	$select_any = "SELECT * FROM Product WHERE product_id = '$sid' OR car_brand = '$sbrand' OR car_model = '$smodel' OR car_model_year = '$syear' OR car_color = '$scolor'";
	$select_any_result = mysqli_query($connection, $select_any);
	if (!$select_any_result) {
		die("Database query failed."); // bad query syntax
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="js/jquery-3.4.1.js"></script>
	<script src="js/cars.js"></script>
	<title>Customer Interface</title>
</head>

<body>
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="realcustomers.php">Main Page</a></li>
				<li class="breadcrumb-item active" aria-current="prod_result_search_cu.php">View Cars by Choices</li>
			</ol>
		</nav>
	</div>
	<br>
	<h2 style="text-align: center">View Cars Based on Your Choices.</h2>
	<br>
	<div class="container text-center">
		<table class="table">
			<tr>
				<td><b>Car ID</b></td>
				<td><b>Brand</b></td>
				<td><b>Model</b></td>
				<td><b>Model Year</b></td>
				<td><b>Color</b></td>
				<td><b>VIN</b></td>
				<td><b>Price $</b>
				<td>
			</tr>
			<?php
			while ($subject = mysqli_fetch_assoc($select_any_result)) {
				$id = $subject['product_id'];
				$brand = $subject['car_brand'];
				$model = $subject['car_model'];
				$year = $subject['car_model_year'];
				$color = $subject['car_color'];
				$vin = $subject['vin'];
				$price = $subject['car_price'];

				// output data from each row
				echo "<tr>";
				echo "<td>" . $id . "</td>";
				echo "<td>" . $brand . "</td>";
				echo "<td>" . $model . "</td>";
				echo "<td>" . $year . "</td>";
				echo "<td>" . $color . "</td>";
				echo "<td>" . $vin . "</td>";
				echo "<td>" . $price . "</td>";
				echo "</tr>";
			}
			?>
		</table>
	</div>
</body>

</html>

<?php
// Close database connection
mysqli_close($connection);
?>