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
$request = "";
if (isset($_POST['car_brand'])) {
	$request = "car_brand";
	$data_query = "SELECT t.car_brand AS 'Car Brand', SUM(t.car_price) AS Sales FROM Transaction t GROUP BY t.car_brand ORDER BY `Sales` DESC LIMIT 10";
	$data_result = mysqli_query($connection, $data_query);
	if (!$data_result) {
		die("Database query failed."); // bad query syntax
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="js/jquery-3.4.1.js"></script>
	<script src="js/ricks.js"></script>
	<title>Customer Interface</title>
</head>

<body>
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="data.php">Data Aggregation</a></li>
				<li class="breadcrumb-item active" aria-current="page">Top 10 Car Brands by Sales</li>
			</ol>
		</nav>
	</div>
	<br>
	<h2 style="text-align: center">View Data Aggregation Result.</h2>
	<br>
	<div class="container text-center">
		<table class="table">
			<?php
			switch ($request) {
				case "car_brand":
					echo "<tr>
					<td><b>Car Brand</b></td>
					<td><b>Sales</b></td>
					</tr>";
					break;
			}
			?>
				<?php
				while ($subject = mysqli_fetch_assoc($data_result)) {
					$brand = $subject['Car Brand'];
					$sales = $subject['Sales'];

					// output data from each row
					echo "<tr>";
					echo "<td>" . $brand . "</td>";
					echo "<td>" . $sales . "</td>";
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