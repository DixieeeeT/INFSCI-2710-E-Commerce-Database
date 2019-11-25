<?php
	// Create a database connection
	$dbhost = "localhost";
	$dbuser = "root"; // username here
	$dbpass = "19960120toBY!!"; // password here
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
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="js/jquery-3.4.1.js"></script>
	<script src="js/ricks.js"></script>
	<title>Data Aggregation</title>
</head>
<body>
	<header class = "container" style = "text-align: center">
		<h3 class = "col" style="display:inline">XXX's Cars</h3>&nbsp;&nbsp;
		<a class = "col" href="customers.php">Customer Interface</a>&nbsp;&nbsp;
		<a class = "col" href="data.php">Data Aggregation</a>&nbsp;&nbsp;
		<a class = "col" href="employees.php">Employee Login</a>&nbsp;&nbsp;
	</header>
	<br>
	<h2 style = "text-align: center">Data Aggregation</h2>
	<br>
	<div class="text-center" style = "margin-top: 100px">
		<h4>
			Some data aggregations are available for viewing.<br><br> 
			Click the buttons below to view the most recent data.
		</h4>
		<br><br>
		<ul class="list-unstyled">
			<!-- <li>
				<form action="data_results_company.php" method="post">
					<label for="company_sales">Total Company Sales and Profits</label>
					<input type="submit" name="company_sales" value="Go"/>
				</form>
			</li>
			<br/> -->
			<li>
				<form action="data_results_category.php" method="post">
					<label for="car_brand">Top 10 Car Brand by Sales</label>
					<input type="submit" name="car_brand" value="Go"/>
				</form>
			</li>
			<br/>
			<li>
				<form action="data_results_region.php" method="post">
					<label for="region_sales">Sales by Region</label>
					<input type="submit" name="region_sales" value="Go"/>
				</form>
			</li>
			<br/>
			<!-- <li>
				<form action="data_results_business.php" method="post">
					<label for="business_products">Most Purchased Product by Each Business</label>
					<input type="submit" name="business_products" value="Go"/>
				</form>
			</li>
			<br/> -->
			<li>
				<form action="data_results_sales.php" method="post">
					<label for="top_customers">Top 10 Customers by Sales</label>
					<input type="submit" name="top_customers" value="Go"/>
				</form>
			</li>
		</ul>
	</div>
</body>
</html>

<?php
// Close database connection
mysqli_close($connection);
?>