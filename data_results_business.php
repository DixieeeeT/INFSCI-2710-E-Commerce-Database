<?php
  // Create a database connection
  $dbhost = "localhost";
  $dbuser = "root"; // username here
  $dbpass = "root"; // password here
  $dbname = "db"; // db name here
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
	if(isset($_POST['business_products'])){
		$request = "business_products";
		$data4_query = "SELECT p.car_brand, c.customer_name, p.car_model FROM Customer c, Product p, Transaction t WHERE t.customer_id = c.customer_id AND t.product_id = p.car_id AND c.customer_type = 'Business' GROUP BY business_category";
		$data4_result = mysqli_query($connection, $data4_query);
		if (!$data4_result) {
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
	<header>
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
			case "business_products":
				echo "<tr>
					<td><b>Product Name</b></td>
					<td><b>Business Name</b></td>
					<td><b>Quantity</b></td>
					</tr>";
					break;
		}
		?>
		<?php
			while($subject = mysqli_fetch_assoc($data4_result)) {
				$prod4 = $subject['product_name'];
				$cust4 = $subject['customer_name'];
				$stock4 = $subject['quantity'];
				
				// output data from each row
				echo "<tr>";
				echo "<td>" . $prod4 . "</td>";
				echo "<td>" . $cust4 . "</td>";
				echo "<td>" . $stock4 . "</td>"; 
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
