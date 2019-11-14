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
  if(isset($_POST['login'])){
  	  $login_id = $_POST['emp_id'];
	  $login_query = "SELECT emp_id FROM Employees WHERE emp_id = '$login_id'";
	  $login_result = mysqli_query($connection, $login_query);
	  if (!$login_result) {
		  die("Database query failed."); // bad query syntax
	  } else if (mysqli_num_rows($login_result) != 1) {
		  header("Location: bad_login.php");
	  }
  }
?>
<?php
	// Get next index
	$max_query = "SELECT MAX(customer_id) FROM Customer";
	
	$max_result = mysqli_query($connection, $max_query);
	if (!$max_result) {
		die("Database query failed."); // bad query syntax error
	}
	
	$max_row = mysqli_fetch_assoc($max_result);
	$max = $max_row["MAX(customer_id)"];
	$new_id = $max + 1;
?>
<?php
	// On submit - create customer, account, home/business 
	if(isset($_POST['submit'])){
		$id = $_POST['customer_id'];
		$name = $_POST['customer_name'];
		$street = $_POST['customer_address_street'];
		$city = $_POST['customer_address_city'];
		$state = $_POST['customer_address_state'];
		$zip = $_POST['customer_address_zip'];
		$type = $_POST['customer_type'];
		$gender = $_POST['gender'];
		$age = $_POST['age'];
		$home_income = $_POST['home_income'];
		$marriage = $_POST['marriage_status'];
		$category = $_POST['business_category'];
		$business_income = $_POST['business_income'];
		
		// Create customer
		$add_cust = "INSERT INTO Customer VALUES ('$id', '$name', '$street', '$city', '$state', '$zip', '$type')";
		
		$add_result = mysqli_query($connection, $add_cust);
		if ($add_result) {
			echo "Successfully added customer " . $id. "; "; 
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
		
		// Create account
		$add_account = "INSERT INTO Accounts VALUES ('$id', 0)";
		$account_result = mysqli_query($connection, $add_account);
		if ($account_result) {
			echo "Successfully created account #" . $id . "; ";
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
		
		// Decide if home or business, and create appropriately
		if ($type == 'home') {
			$add_home = "INSERT INTO Customer_Home VALUES ('$id', '$marriage', '$gender', '$age', '$home_income')";
			$home_result = mysqli_query($connection, $add_home);
			if ($home_result) {
				echo "Successfully created home customer.";
			} else {
				die("Database query failed. " . mysqli_error($connection));
			}
		} else {
			$add_business = "INSERT INTO Customer_Business VALUES ('$id', '$category', '$business_income')";
			$business_result = mysqli_query($connection, $add_business);
			if ($business_result) {
				echo "Successfully created business customer.";
			} else {
				die("Database query failed. " . mysqli_error($connection));
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="js/jquery-3.4.1.js"></script>
	<script src="js/ricks-addCust.js"></script>
	<title>Add Customer</title>
</head>
<body>
	<header class = "container" style = "text-align: center">
		<h3 class = "col" style="display:inline">XXX's Cars</h3>&nbsp;&nbsp;
		<a class = "col" href="customers.php">Customer Interface</a>&nbsp;&nbsp;
		<a class = "col" href="data.php">Data Aggregation</a>&nbsp;&nbsp;
		<a class = "col" href="employees.php">Employee Login</a>&nbsp;&nbsp;
	</header>
	<br>
	<h2 style = "text-align: center">Add/Edit Customer</h2>
	<br>
	<div class="text-center" style = "margin-top: 50px">
		<form id="addCust" action="addCust.php" method="post">
			<div>
				<label for="customer_id">Customer ID: </label>
				<input type="text" name="customer_id" value="<?php echo $new_id; ?>" readonly />
			</div>
			<div>
				<label for="customer_name">Name: </label>
				<input type="text" name="customer_name" />
			</div>
			<div>
				<label for="customer_address_street">Street: </label>
				<input type="text" name="customer_address_street" /><br/>
				<label for="customer_address_city">City: </label>
				<input type="text" name="customer_address_city" /><br/>
				<label for="customer_address_state">State Abbr: </label>
				<input type="text" name="customer_address_state" /><br/>
				<label for="customer_address_zip">Zip: </label>
				<input type="text" name="customer_address_zip" />
			</div>
			<div>
				<label for="customer_type">Type: </label>
				<select name="customer_type" id="customer_type">
					<option value="home">Home</option>
					<option value="business">Business</option>
				</select>
			</div>
			<div id="home">
				<label for="gender">Gender: </label>
				<input type="text" name="gender" /><br/>
				<label for="age">Age: </label>
				<input type="text" name="age" /><br/>
				<label for="home_income">Yearly Income: </label>
				<input type="text" name="home_income" /><br/>
				<label for="marriage_status">Marital Status: </label>
				<input type="text" name="marriage_status" />
			</div>
			<div id="business">
				<label for="business_category">Type of Business: </label>
				<input type="text" name="business_category" /><br/>
				<label for="business_income">Yearly Income: </label>
				<input type="text" name="business_income" />
			</div>
			<div><input type="submit" name="submit" value="Submit" /></div>
		</form>
		<br><br>
		<h4>
			To edit a customer profile, enter the customer 
			ID below and click "Search"
		</h4>
		<br>
		<form action="editCust.php" method="post">
			<label for="customer_id">Customer ID: </label>
			<input type="text" name="customer_id" />
			<input type="submit" name="search" value="Search">
		</form>
	</div>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
