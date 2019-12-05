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
<?php
if (isset($_POST['search'])) {
	$id = $_POST['emp_id'];

	$emp_query = "SELECT * FROM Employees WHERE emp_id = '$id'";
	$emp_result = mysqli_query($connection, $emp_query);
	if (!$emp_result) {
		die("Database query failed."); // bad query syntax error
	}

	$emp_row = mysqli_fetch_assoc($emp_result);
	$name = $emp_row['emp_name'];
	$street = $emp_row['emp_address_street'];
	$city = $emp_row['emp_address_city'];
	$state = $emp_row['emp_address_state'];
	$zip = $emp_row['emp_address_zip'];
	$email = $emp_row['email'];

	$sales_query = "SELECT * FROM 
			(
			SELECT * FROM salesperson
			UNION
			SELECT * FROM manager
			)
			New
			WHERE emp_id = '$id'";

	$sales_result = mysqli_query($connection, $sales_query);
	if (!$sales_result) {
		die("Database query failed."); // bad query syntax error
	}

	$sales_row = mysqli_fetch_assoc($sales_result);
	$store = $sales_row['store_id'];
	$title = $sales_row['title'];
	$salary = $sales_row['salary'];
}
?>
<?php
if (isset($_POST['submit'])) {
	$id2 = $_POST['emp_id'];
	$name2 = $_POST['emp_name'];
	$street2 = $_POST['emp_address_street'];
	$city2 = $_POST['emp_address_city'];
	$state2 = $_POST['emp_address_state'];
	$zip2 = $_POST['emp_address_zip'];
	$email2 = $_POST['email'];

	$title2 = $_POST['title'];
	$store2 = $_POST['store_id'];
	$salary2 = $_POST['salary'];

	$update_emp_query = "UPDATE Employees SET emp_name = '$name2', emp_address_street = '$street2', emp_address_city = '$city2', emp_address_state = '$state2', emp_address_zip = '$zip2', email = '$email2' WHERE emp_id = '$id2'";

	$update_emp_result = mysqli_query($connection, $update_emp_query);

	if ($update_emp_result) {
		echo "Successfully updated employee " . $id . "; ";
	} else {
		print_r($_POST);
		die("Database query failed. " . mysqli_error($connection) . " ");
	}

	$position_check = "SELECT * FROM Salesperson WHERE emp_id = '$id2'";
	$position_query = mysqli_query($connection, $position_check);
	if (mysqli_num_rows($position_query) != 0) {

		$update_sales_query = "UPDATE Salesperson SET store_id = '$store2', title = '$title2', salary = '$salary2' WHERE emp_id ='$id2'";

		$update_sales_result = mysqli_query($connection, $update_sales_query);

		if ($update_sales_result) {
			header("Location: editSuccess.php");
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
	} else if (mysqli_num_rows($position_query) == 0) {

		$update_sales_query = "UPDATE Manager SET store_id = '$store2', title = '$title2', salary = '$salary2' WHERE emp_id ='$id2'";

		$update_sales_result = mysqli_query($connection, $update_sales_query);

		if ($update_sales_result) {
			header("Location: editSuccess.php");
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
	}
}
?>
<?php
if (isset($_POST['delete'])) {
	print_r($_POST);
	$delete_id = $_POST['delete_id'];
	echo $delete_id;

	// Delete from Employees table
	$delete_emp_query = "DELETE FROM Employees WHERE emp_id = '$delete_id'";
	$delete_emp_result = mysqli_query($connection, $delete_emp_query);
	if ($delete_emp_result) {
		header("Location: editSuccess.php");
	} else {
		die("Database query failed. " . mysqli_error($connection));
	}

	// Delete from Salesperson/Manager table
	$position_check2 = "SELECT * FROM Salesperson WHERE emp_id = '$delete_id'";
	$position_query2 = mysqli_query($connection, $position_check2);

	if (mysqli_num_rows($position_query2) != 0) {

		$delete_sales_query = "DELETE FROM Salesperson WHERE emp_id = '$delete_id'";
		$delete_sales_result = mysqli_query($connection, $delete_sales_query);
		if ($delete_sales_result) {
			header("Location: editSuccess.php");
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
	} else if (mysqli_num_rows($position_query2) == 0) {

		$delete_sales_query = "DELETE FROM Manager WHERE emp_id = '$delete_id'";
		$delete_sales_result = mysqli_query($connection, $delete_sales_query);
		if ($delete_sales_result) {
			header("Location: editSuccess.php");
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
	}
}
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
	<script src="js/jquery-3.4.1.js"></script>
	<script src="js/cars.js"></script>
	<title>Edit Employee</title>
</head>

<body>
	<div class="container">
		<nav aria-label="breadcrumb">
			<ol class="breadcrumb">
				<li class="breadcrumb-item">
					<a href="employees.php">Additional Actions</a>
				</li>
				<li class="breadcrumb-item"><a href="addUser.php">Add User</a></li>
				<li class="breadcrumb-item active" aria-current="editUser.php">
					Edit User
				</li>
			</ol>
		</nav>
	</div>
	<br />
	<div class="container">
		<h2 style="title">Edit Employee</h2>
		<div class="card" style="margin-top: 20px">
			<div class="card-body">
				<form action="editUser.php" method="post">
					<!-- <p>
						  Employee Details:
						</p> -->
					<div class="form-group">
						<label for="emp_id">Employee ID: </label>
						<input class="form-control" type="text" name="emp_id" value="<?php echo $id; ?>" />
					</div>
					<div class="form-group">
						<label for="emp_name">Name: </label>
						<input class="form-control" type="text" name="emp_name" value="<?php echo $name; ?>" />
					</div>
					<div class="form-group">
						<label for="emp_address_street">Street: </label>
						<input class="form-control" type="text" name="emp_address_street" value="<?php echo $street; ?>" />
					</div>
					<div class="form-group">
						<label for="emp_address_city">City: </label>
						<input class="form-control" type="text" name="emp_address_city" value="<?php echo $city; ?>" />
					</div>
					<div class="form-group">
						<label for="emp_address_state">State: </label>
						<input class="form-control" type="text" name="emp_address_state" value="<?php echo $state; ?>" />
					</div>
					<div class="form-group">
						<label for="emp_address_zip">Zip: </label>
						<input class="form-control" type="text" name="emp_address_zip" value="<?php echo $zip; ?>" />
					</div>
					<div class="form-group">
						<label for="email">Email: </label>
						<input class="form-control" type="text" name="email" value="<?php echo htmlentities($email); ?>" />
					</div>
					<p>
						Assignment:
					</p>
					<div class="form-group">
						<label for="title">Title: </label>
						<input class="form-control" type="text" name="title" value="<?php echo $title; ?>" />
					</div>
					<div class="form-group">
						<label for="store_id">Store ID: </label>
						<input class="form-control" type="text" name="store_id" value="<?php echo $store; ?>" />
						<small class="form-text text-muted">Example: (from 2001 to 2008)</small>
					</div>
					<div class="form-group">
						<label for="salary">Salary: </label>
						<input class="form-control" type="text" name="salary" value="<?php echo $salary; ?>" />
					</div>
					<div class="form-group">
						<input class="btn btn-primary" type="submit" name="submit" value="Submit" />
					</div>
				</form>
				<br /><br />
				<h4>
					Please retype Employee ID to confirm Delete.<br /><br />
					This action is irreversible!
				</h4>
				<br />
				<form action="editUser.php" method="post">
					<div class="form-group">
						<label for="delete_id">Delete ID: </label>
						<input class="form-control" type="text" name="delete_id" />
					</div>
					<input class="btn btn-primary" type="submit" name="delete" value="Delete User" />
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