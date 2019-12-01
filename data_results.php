<?php
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "root"; // your username here
  $dbpass = "19960120toBY!!"; // password here
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
	
	if(isset($_POST['company_sales'])){
		$request = "company_sales";
		$data1_query = "SELECT SUM((Transaction.product_quantity)*(Transaction.price)) AS 'Total Revenue', (SUM(Transaction.product_quantity*Transaction.price))-(SUM(Transaction.product_quantity*Product.unit_cost)) AS 'Total Profit' FROM Transaction, Product WHERE Transaction.product_id=Product.product_id";
		$data1_result = mysqli_query($connection, $data1_query);
		if (!$data1_result) {
			die("Database query failed."); // bad query syntax
		}
	}

	else if(isset($_POST['product_categories'])){
		$request = "product_categories";
		$data2_query = "SELECT Product.product_type AS 'Product Type', SUM((Transaction.product_quantity)*(Transaction.price)) AS Revenue FROM Transaction, Product WHERE Product.product_id=Transaction.product_id GROUP BY Product.product_type ORDER BY Revenue DESC LIMIT 5";
		$data2_result = mysqli_query($connection, $data2_query);
		if (!$data2_result) {
			die("Database query failed."); // bad query syntax
		}
	}

	else if(isset($_POST['region_sales'])){
		$request = "region_sales";
		$data3_query = "SELECT Region.region_name AS Region, SUM((Transaction.product_quantity)*(Transaction.price)) AS Revenue FROM Transaction, Region, Salesperson, Store WHERE Transaction.emp_id=Salesperson.emp_id AND Salesperson.store_id=Store.store_id AND Store.region_id=Region.region_id GROUP BY Region.region_name";
		$data3_result = mysqli_query($connection, $data3_query);
		if (!$data3_result) {
			die("Database query failed."); // bad query syntax
		}
	}

	else if(isset($_POST['business_products'])){
		$request = "business_products";
		$data4_query = "SELECT product_name, Customer.customer_name, quantity FROM Customer, Product, Transaction WHERE Transaction.customer_id=Customer.customer_id AND Transaction.product_id=Product.product_id AND Customer.customer_type='business' GROUP BY product_name";
		$data4_result = mysqli_query($connection, $data4_query);
		if (!$data4_result) {
			die("Database query failed."); // bad query syntax
		}
	}

	else if(isset($_POST['top_customers'])){
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
	<link rel="stylesheet" type="text/css" href="ricks.css">
	<script src="js/jquery-3.4.1.js"></script>
	<script src="js/ricks.js"></script>
	<title>Customer Interface</title>
</head>
<body>
	<header>
		<h3 style="display:inline">Rick's Sports</h3>&nbsp;&nbsp;
		<a href="customers.php">Customer Interface</a>&nbsp;&nbsp;
		<a href="data.php">Data Aggregation</a>&nbsp;&nbsp;
		<a href="employees.php">Employee Login</a>&nbsp;&nbsp;
	</header>
	<br/><br/>
	<table>
	<?php 
	switch ($request) {
		case "company_sales":
			echo "<tr>
				<td><b>Total Revenue</b></td>
				<td><b>Total Profit</b></td>
			</tr>";
				break;
		case "product_categories":
			echo "<tr>
				<td><b>Product Type</b></td>
				<td><b>Revenue</b></td>
				</tr>";
				break;
		case "region_sales":
			echo "<tr>
				<td><b>Region</b></td>
				<td><b>Revenue</b></td>
				</tr>";
				break;
		case "business_products":
			echo "<tr>
				<td><b>Product Name</b></td>
				<td><b>Business Name</b></td>
				<td><b>Quantity</b></td>
				</tr>";
				break;
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
		while($subject = mysqli_fetch_assoc($data1_result)) {
			$revenue1 = $subject['Total Revenue'];
			$profit1 = $subject['Total Profit'];
			
			// output data from each row
			echo "<tr>";
			echo "<td>" . $revenue1 . "</td>";
			echo "<td>" . $profit1 . "</td>";
			echo "</tr>";
		}
		while($subject = mysqli_fetch_assoc($data2_result)) {
			$type2 = $subject['Product Type'];
			$revenue2 = $subject['Revenue'];
			
			// output data from each row
			echo "<tr>";
			echo "<td>" . $type2 . "</td>";
			echo "<td>" . $revenue2 . "</td>";
			echo "</tr>";
		}
		while($subject = mysqli_fetch_assoc($data3_result)) {
			$region3 = $subject['Region'];
			$revenue3 = $subject['Revenue'];
			
			// output data from each row
			echo "<tr>";
			echo "<td>" . $region3 . "</td>";
			echo "<td>" . $revenue3 . "</td>";
			echo "</tr>";
		}
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
	<?php
		// 4. Release returned data
		mysqli_free_result($result);
	?>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
