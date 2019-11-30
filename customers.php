<?php
  // 1. Create a database connection
  $dbhost = "localhost";
  $dbuser = "root"; // your username here
  $dbpass = "root"; // password here
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
	<header class = "container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="#">XXX's Cars</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="customers.php">Customer Interface</a>
					</li>
					<li class="nav-item">
						<a class = "nav-link" href="data.php">Data Aggregation</a>
					</li>
					<li class="nav-item">
						<a class = "nav-link" href="employees.php">Employee Login</a>
					</li>
				</ul>
			</div>
		</nav> 
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
				<input type="submit" name="Submit" value="Search">
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
					<b>Search for Your Ideal Car:</b>
				</p>
				<div>
					<label for="product_id">Car Id:</label>
					<input type="text" name="product_id" />
				</div>
				<div>
					<label for="car_brand">Brand:</label>
					<input type="text" name="car_brand" />
				</div>
				<div>
					<label for="car_model">Model:</label>
					<input type="text" name="car_model" />
				</div>
				<div>
					<label for="car_model_year">Year:</label>
					<input type="text" name="car_model_year" />
				</div>
				<div>
					<label for="car_color">Color:</label>
					<select name="car_color">
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
