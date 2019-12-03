<?php
// Create a database connection
$dbhost = "localhost";
$dbuser = "root"; 
$dbpass = "19960120toBY!!"; 
$dbname = "db"; 
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Test to see if success
if (mysqli_connect_errno()) {
	die("Database connection failed: " .
		mysqli_connect_error() .
		" (" . mysqli_connect_errno() . ")");
}
?>
<?php
$request = "";
if (isset($_POST['top_customers'])) {
	$request = "top_customers";
	$data_query = "SELECT Customer.customer_name AS 'Customer', Customer.customer_type AS 'Type', SUM(Transaction.car_price) AS 'Sales' FROM Customer, Transaction WHERE Customer.customer_id=Transaction.customer_id GROUP BY customer_name ORDER BY Sales DESC LIMIT 10";
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
	<script src="js/cars.js"></script>
	<title>Employee Interface</title>
</head>

<body>
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="data.php">Data Aggregation</a></li>
				<li class="breadcrumb-item active" aria-current="page">Top customers by sales</li>
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
				case "top_customers":
					echo "<tr>
					<td><b>Customer</b></td>
					<td><b>Type</b></td>
					<td><b>Sales</b></td>
					</tr>";
					break;
			}
			?>
				<?php
				while ($subject = mysqli_fetch_assoc($data_result)) {
					$customer = $subject['Customer'];
					$type = $subject['Type'];
					$sales = $subject['Sales'];

					// output data from each row
					echo "<tr>";
					echo "<td>" . $customer . "</td>";
					echo "<td>" . $type . "</td>";
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