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
  if(isset($_POST['manager_login'])){
  	  $login_id = $_POST['emp_id'];
	  $login_query = "SELECT DISTINCT emp_id FROM Employees, Store, Region WHERE Employees.emp_id = '$login_id' AND (Employees.emp_id = Region.region_manager)";
	  $login_result = mysqli_query($connection, $login_query);
	  if (!$login_result) {
		  die("Database query failed."); // bad query syntax
	  } else if (mysqli_num_rows($login_result) != 1) {
		  header("Location: bad_login.php");
	  }
  }
?>
<?php
	$max_query = "SELECT MAX(emp_id) FROM Employees";
	
	$max_result = mysqli_query($connection, $max_query);
	if (!$max_result) {
		die("Database query failed."); // bad query syntax error
	}
	
	$max_row = mysqli_fetch_assoc($max_result);
	$max = $max_row["MAX(emp_id)"];
	$new_id = $max + 1;
?>
<?php
	if(isset($_POST['submit'])){
		$id = $_POST['emp_id'];
		$name = $_POST['emp_name'];
		$street = $_POST['emp_address_street'];
		$city = $_POST['emp_address_city'];
		$state = $_POST['emp_address_state'];
		$zip = $_POST['emp_address_zip'];
		$email = $_POST['email'];
		
		$title = $_POST['title'];
		$store = $_POST['store_id'];
		$salary = $_POST['salary'];
		
		$add_emp = "INSERT INTO Employees VALUES ('$id', '$name', '$street', '$city', '$state', '$zip', '$email')";
		
		$add_emp_result = mysqli_query($connection, $add_emp);
		if ($add_emp_result) {
			echo "Successfully added employee " . $id . "; "; 
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
		
		$add_sales = "INSERT INTO Salesperson VALUES ('$id', '$store', '$title', '$salary')";
		$add_sales_result = mysqli_query($connection, $add_sales);
		if ($add_sales_result) {
			echo "Successfully added salesperson " . $id; 
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
	header("Location: addSuccess.php");
	}


?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="js/jquery-3.4.1.js"></script>
	<script src="js/cars.js"></script>
	<title>Add Employee</title>
</head>
<body>
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item"><a href="employees.php">Additional Actions</a></li>
				<li class="breadcrumb-item active" aria-current="page">Add Employee</li>
			</ol>
		</nav>
	</div>

	<div class="container" style="margin-top: 50px">
		<h2 class="title">Add/Edit Employee</h2>
		<div class="row">
			<div class="col">
				<div class="card">
					<div class="card-body">

		<form id="addCust" action="addUser.php" method="post">
			<!-- <p>
				Employee Details: 
			</p> -->
			
			<div class="form-group">
				<label for="emp_id">Employee ID: </label>
				<input class="form-control" type="text" name="emp_id" value="<?php echo $new_id;?>" readonly />
			</div>
		
			<div class="form-group">
				<label for="emp_name">Name: </label>
				<input class="form-control" type="text" name="emp_name" />
			</div>
			<div class="form-group">
				<label for="emp_address_street">Street: </label>
				<input class="form-control" type="text" name="emp_address_street" />
			</div>
			<div class="form-group">
				<label for="emp_address_city">City: </label>
				<input class="form-control" type="text" name="emp_address_city" />
			</div>
			<div class="form-group">
				<label for="emp_address_state">State: </label>
				<input class="form-control" type="text" name="emp_address_state" />
			</div>
			<div class="form-group">
				<label for="emp_address_zip">Zip: </label>
				<input class="form-control" type="text" name="emp_address_zip" />
			</div>
			<div class="form-group">
				<label for="email">Email: </label>
				<input class="form-control" type="text" name="email" />
			</div>
			<br>
			<!-- <p>
				Assignment:
			</p> -->
			<div class="form-group">
				<label for="title">Title: </label>
				<input class="form-control" type="text" name="title" />
			</div>
			<div class="form-group">
				<label for="store_id">Store ID: </label>
				<input class="form-control" type="text" name="store_id" />
			</div>
			<div class="form-group">
				<label for="salary">Salary: </label>
				<input class="form-control" type="text" name="salary" />
			</div>
			<div><input class="btn btn-primary" type="submit" name="submit" value="Submit"></div>
		</form>
		</div>
	</div>
</div>

<div class="col">
		<h4>
			To edit or delete an employee, enter the 
			employee ID below and click "Search"
		</h4>
		<br>
		<form class="form-inline" action="editUser.php" method="post">
			<div class="form-group mb-2">
				<label for="emp_id">Employee ID: </label>
			</div>
			<div class="form-group mx-sm-3 mb-2">
				<input class="form-control" type="text" name="emp_id" />
			</div>
			<input class="btn btn-primary mb-2" type="submit" name="search" value="Search">
		</form>
	</div>
</div>
</div>
</body>
</html>

<?php
	// Close database connection
	mysqli_close($connection);
?>
