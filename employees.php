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
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="js/jquery-3.4.1.js"></script>
	<script src="js/ricks.js"></script>
	<title>Additional Actions</title>
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
					<li class="nav-item">
						<a class="nav-link" href="customers.php">Main Page</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="data.php">Data Aggregation</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="employees.php">Additional Actions</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="startpage.php">Back to Start Page</a>
					</li>
				</ul>
			</div>
		</nav>
	</header>
	<br>
	<h2 style="text-align: center">Additional Actions</h2>
	<br>
	<div class="container">
		<div class="row text-center" style="margin-top: 50px">
			<div class="column card" style="float: left; width: 50%">
				<div class="card-body">
					<p><b>Please provide Employee ID for the below actions.</b></p>
					<br>
					<form class="form-inline" action="viewTrans.php" method="post">
						<div class="form-group mx-sm-3 mb-2">
							<input class="form-control" type="text" name="emp_id" placeholder="Your Employee Id" />
						</div>
						<input class="btn btn-primary mb-2" type="submit" name="login" value="View Transaction" />
					</form>
					<br />
					<form class="form-inline" action="addCust.php" method="post">
						<div class="form-group mx-sm-3 mb-2">
							<input class="form-control" type="text" name="emp_id" placeholder="Your Employee Id" />
						</div>
						<input class="btn btn-primary mb-2" type="submit" name="login" value="Add/Edit Customer" />
					</form>
					<br />
					<form class="form-inline" action="addInv.php" method="post">
						<div class="form-group mx-sm-3 mb-2">
							<input class="form-control" type="text" name="emp_id" placeholder="Your Employee Id" />
						</div>
						<input class="btn btn-primary mb-2" type="submit" name="login" value="Add/Edit Cars" />
					</form>
				</div>
			</div>
			<div class="column card" style="float: left; width: 50%">
				<div class="card-body">
				<p><b>Please provide Manager ID for the below action.</b></p>
				<br />
				<form class="form-inline" action="addUser.php" method="post">
					<div class="form-group mx-sm-3 mb-2">
					<input class="form-control" type="text" name="emp_id" placeholder="Your Manager Id" />
					</div>
					<input class="btn btn-primary mb-2" type="submit" name="manager_login" value="Add/Edit Employee" />
				</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>

<?php
// Close database connection
mysqli_close($connection);
?>