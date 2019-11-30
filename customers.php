<?php
// 1. Create a database connection
$dbhost = "localhost";
$dbuser = "root"; // your username here
$dbpass = "root"; // password here
$dbname = "db"; // your db name here
$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
// Test if connection succeeded
if (mysqli_connect_errno()) {
	die("Database connection failed: " .
		mysqli_connect_error() .
		" (" . mysqli_connect_errno() . ")");
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
	<header class="container">
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="customers.php">XXX's Cars</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item active">
						<a class="nav-link" href="customers.php">Customer Interface</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="data.php">Data Aggregation</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="employees.php">Employee Login</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<br>
	<h2 style="text-align: center">Welcome to XXX's Cars!</h2>
	<br>
	<h3 style="text-align: center">Choose One Option!</h3>
	<div class="container">
		<div class="row" style="margin-top: 50px">
			<div class="column card" style="float: left; width: 33.33%; height: 20%;">
				<div class="card-body">
					<form action="account.php" method="post">
						<p>
							<b>View By Account:</b>
						</p>
						<div class="form-group">
							<label for="customer_id">Customer ID: </label>
							<input class="form-control" type="text" name="customer_id" />
						</div>
						<div class="form-group">
							<input class="btn btn-primary" type="submit" name="Submit" value="Search">
						</div>
					</form>
				</div>
			</div>
			<div class="column card text-center" style="float: left; width: 33.33%; height: 20%;">
				<div class="card-body">
					<p>
						<b>View All the Merchandise:</b>
					</p>
					<form action="prod_results_all.php" method="post">
						<input class="btn btn-primary" type="submit" name="browse" value="Browse">
					</form>
				</div>
			</div>
			<div class="column card" style="float: left; width: 33.33%;">
				<div class="card-body">
					<form action="prod_results_search.php" method="post">
						<p>
							<b>Search for Your Ideal Car:</b>
						</p>
						<div class="form-group">
							<label for="product_id">Car Id:</label>
							<input class="form-control" type="text" name="product_id" />
						</div>
						<div class="form-group">
							<label for="car_brand">Brand:</label>
							<input class="form-control" type="text" name="car_brand" />
						</div>
						<div class="form-group">
							<label for="car_model">Model:</label>
							<input class="form-control" type="text" name="car_model" />
						</div>
						<div class="form-group">
							<label for="car_model_year">Year:</label>
							<input class="form-control" type="text" name="car_model_year" />
						</div>
						<div class="form-group">
							<label for="car_color">Color:</label>
							<select class="form-control" name="car_color">
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
							<input type="submit" class="btn btn-primary" name="search" value="Search" />
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<?php
// 5. Close database connection
mysqli_close($connection);
?>