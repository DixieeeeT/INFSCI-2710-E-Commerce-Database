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
	$max_query = "SELECT MAX(product_id) FROM Product";
	
	$max_result = mysqli_query($connection, $max_query);
	if (!$max_result) {
		die("Database query failed."); // bad query syntax error
	}
	
	$max_row = mysqli_fetch_assoc($max_result);
	$max = $max_row["MAX(product_id)"];
	$new_id = $max + 1;
?>
<?php
	if(isset($_POST['submit'])){
		$id = $_POST['product_id'];
		$name = $_POST['product_name'];
		$quant = $_POST['quantity'];
		$price = $_POST['price'];
		$cost = $_POST['unit_cost'];
		$type = $_POST['product_type'];
		
		$add_cust = "INSERT INTO Product VALUES ('$id', '$name', '$quant', '$price', '$cost', '$type')";
		
		$add_result = mysqli_query($connection, $add_cust);
		if ($add_result) {
			echo "Successfully added product " . $id; 
		} else {
			die("Database query failed. " . mysqli_error($connection));
		}
		
	}
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="jquery-3.4.1.js"></script>
	<script src="ricks.js"></script>
	<title>Add Inventory</title>
</head>
<body>
	<header class = "container" style = "text-align: center">
		<h3 class = "col" style="display:inline">XXX's Cars</h3>&nbsp;&nbsp;
		<a class = "col" href="customers.php">Customer Interface</a>&nbsp;&nbsp;
		<a class = "col" href="data.php">Data Aggregation</a>&nbsp;&nbsp;
		<a class = "col" href="employees.php">Employee Login</a>&nbsp;&nbsp;
	</header>
	<br>
	<h2 style = "text-align: center">Add Inventory</h2>
	<br>
	<div class="text-center" style = "margin-top: 50px">
		<form action="addInv.php" method="post">
			<div>
				<label for="product_id">Product ID: </label>
				<input type="text" name="product_id" value="<?php echo $new_id; ?>"/> 
			</div>
			<div>
				<label for="product_name">Name: </label>
				<input type="text" name="product_name" />
			</div>
			<div>
				<label for="quantity">Quantity: </label>
				<input type="text" name="quantity" />
			</div>
			<div>
				<label for="price">Price: </label>
				<input type="text" name="price" />
			</div>
			<div>
				<label for="unit_cost">Unit Cost: </label>
				<input type="text" name="unit_cost" />
			</div>
			<div>
				<label for="product_type">Type: </label>
				<select name="product_type">
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
			<div><input type="submit" name="submit" value="Submit" /></div>
		</form>
		<br><br>
		<h4>
			To edit inventory, enter the product ID 
			below and click "Search"
		</h4>
		<br>
		<form action="editInv.php" method="post">
			<label for="product_id">Product ID: </label>
			<input type="text" name="product_id" />
			<input type="submit" name="search" value="Search" />
		</form>
	</div>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>


