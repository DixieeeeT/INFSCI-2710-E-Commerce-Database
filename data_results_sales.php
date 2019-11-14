<?php
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "root"; // your username here
  $dbpass = "19960120toBY!!"; // your password here
  $dbname = "db"; // your db name here
  $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
  // Test if connection succeeded
  if(mysqli_connect_errno()) {
    die("Database connection failed: " . 
         mysqli_connect_error() . 
         " (" . mysqli_connect_errno() . ")"
    );
  }
?>
<?php
	$request = "";
	if(isset($_POST['top_customers'])){
		$request = "top_customers";
		$data5_query = "SELECT Customer.customer_name AS 'Customer', Customer.customer_type AS 'Type', SUM((Transaction.product_quantity)*(Transaction.price)) AS 'Revenue' FROM Customer, Transaction WHERE Customer.customer_id=Transaction.customer_id GROUP BY customer_name ORDER BY Revenue DESC LIMIT 10";
		$data5_result = mysqli_query($connection, $data5_query);
		if (!$data5_result) {
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
	<header class = "container" style = "text-align: center">
		<h3 class = "col" style="display:inline">XXX's Cars</h3>&nbsp;&nbsp;
		<a class = "col" href="customers.php">Customer Interface</a>&nbsp;&nbsp;
		<a class = "col" href="data.php">Data Aggregation</a>&nbsp;&nbsp;
		<a class = "col" href="employees.php">Employee Login</a>&nbsp;&nbsp;
	</header>
	<br>
	<h2 style = "text-align: center">View Data Aggregation Result.</h2>
	<br>
	<div class = "text-center">
		<table class = "table">
		<?php 
		switch ($request) {
			case "top_customers":
				echo "<tr>
					<td><b>Customer</b></td>
					<td><b>Type</b></td>
					<td><b>Revenue</b></td>
					</tr>";
					break;
		}
		?>
		<?php
			while($subject = mysqli_fetch_assoc($data5_result)) {
				$cust5 = $subject['Customer'];
				$type5 = $subject['Type'];
				$revenue5 = $subject['Revenue'];
				
				// output data from each row
				echo "<tr>";
				echo "<td>" . $cust5 . "</td>";
				echo "<td>" . $type5 . "</td>";
				echo "<td>" . $revenue5 . "</td>"; 
				echo "</tr>";
			}
		?>
		</table>
	</div>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
