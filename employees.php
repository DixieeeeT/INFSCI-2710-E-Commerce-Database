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
	<title>Employee Login</title>
</head>
<body>
	<header class = "container" style = "text-align: center">
		<h3 class = "col" style="display:inline">XXX's Cars</h3>&nbsp;&nbsp;
		<a class = "col" href="customers.php">Customer Interface</a>&nbsp;&nbsp;
		<a class = "col" href="data.php">Data Aggregation</a>&nbsp;&nbsp;
		<a class = "col" href="employees.php">Employee Login</a>&nbsp;&nbsp;
	</header>
	<br>
	<h2 style = "text-align: center">Employee Login</h2>
	<br>
	<div class = "row text-center" style = "margin-top: 200px">
		<div class = "column text-center" style = "float: left; width: 50%">
			<p><b>Please provide Employee ID for the below actions.</b></p>
			<br>
			<form action="viewTrans.php" method="post">
				<input type="text" name="emp_id" placeholder = "Your Employee Id"/>
				<input type="submit" name="login" value="View Transaction" />
			</form>
			<br/>
			<form action="addCust.php" method="post">
				<input type="text" name="emp_id" placeholder = "Your Employee Id"/>
				<input type="submit" name="login" value="Add/Edit Customer"/>
			</form>
			<br/>
			<form action="addInv.php" method="post">
				<input type="text" name="emp_id" placeholder = "Your Employee Id" />
				<input type="submit" name="login" value="Add/Edit Cars"/>
			</form>
		</div>
		<div class = "column text-center" style = "float: left; width: 50%">
			<p><b>Please provide Manager ID for the below action.</b></p>
			<br/>
			<form action="addUser.php" method="post">
				<input type="text" name="emp_id" placeholder = "Your Manager Id"/>
				<input type="submit" name="manager_login" value="Add/Edit Employee"/>
			</form>
		</div>
	</div>
</body>
</html>

<?php
	// Close database connection
	mysqli_close($connection);
?>
