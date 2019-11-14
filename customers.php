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
	<h2 style = "text-align: center">Welcome to XXX's Cars!</h2>
	<br>
	<h3 style = "text-align: center">Choose One Option!</h3>
	<br>
	<div class = "row" style = "margin-top: 200px">
		<div class = "column text-center" style = "float: left; width: 33.33%;">
			<form action="account.php" method="post">
				<p>
					<b>View By Account:</b>
				</p>
				<label for="customer_id">Customer ID: </label>
				<input type="text" name="customer_id" />
				<input type="submit" name="Submit">
			</form>
		</div>
		<div class = "column text-center" style = "float: left; width: 33.33%;">
			<p>
				<b>View All the Merchandise:</b>
			</p>
			<form action="prod_results_all.php" method="post">
				<input type="submit" name="browse" value="Browse">
			</form>
		</div>
		<div class = "column text-center" style = "float: left; width: 33.33%;">
			<form action="prod_results_search.php" method="post">
				<p>
					<b>Search for a Product:</b>
				</p>
				<div>
					<label for="product_name">Name:</label>
					<input type="text" name="product_name" />
				</div>
				<div>
					<label for="product_id">Product ID:</label>
					<input type="text" name="product_id" />
				</div>
				<div>
					<label for="price">Price:</label>
					<input type="text" name="price" />
				</div>
				<div>
					<label for="product_type">Type:</label>
					<select name="product_type">
						<option value="">Select Type</option>
						<option value="baseball">Baseball</option>
						<option value="basketball">Basketball</option>
						<option value="cycling">Cycling</option>
						<option value="football">Football</option>
						<option value="hockey">Hockey</option>
						<option value="skiing">Skiing</option>
						<option value="soccer">Soccer</option>
						<option value="tennis">Tennis</option>
						<option value="volleyball">Volleyball</option>
					</select>
				</div>
				<div>
					<input type="submit" name="search" value="Search" />
				</div>
			</form>
		</div>
	</div>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
