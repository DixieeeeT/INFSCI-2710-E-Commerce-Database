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
	<script src="js/cars.js"></script>
	<title>Welcome to XXX's Cars</title>
</head>

<body>
	<br>
	<h2 style="text-align: center; margin-top: 1%">Welcome to XXX's Cars!</h2>
	<br>
	<h3 style="text-align: center">Choose One Option!</h3>
	<div class="container">
		<div class="row" style="margin-top: 50px">
			<div class="column card text-center" style="float: center; width: 50%; height: 20%;">
				<div class="card-body">
                    <img src="assets/img/customer.png" alt="Customer" style="width:500px; height:500px">
					<form action="realcustomers.php" method="post" style="margin-top:54px">
						<div class="form-group">
							<input class="btn btn-primary" type="submit" name="customer" value="I'm a Customer.">
						</div>
					</form>
				</div>
			</div>
			<div class="column card text-center" style="float: center; width: 50%; height: 100%;">
				<div class="card-body">
                    <img src="assets/img/employee.png" alt="Employee" style="width:500px; height:500px">
					<form action="customers.php" method="post">
                        <div class="form-group">
							<input class="form-control" type="text" name="empid" placeholder="Employee ID"/>
						</div>
                        <div class="form-group">
						    <input class="btn btn-primary" type="submit" name="employee" value="I'm an Employee.">
                        </div>
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