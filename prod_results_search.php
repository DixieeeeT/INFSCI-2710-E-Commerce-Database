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
<?php
	if(isset($_POST['search'])){
		$sid = $_POST['product_id'];
		$sname = $_POST['product_name'];
		$sprice = $_POST['price'];
		$stype = $_POST['product_type'];
		
		$select_any = "SELECT * FROM Product WHERE product_id='$sid' OR product_name LIKE '%$sname%' OR price='$sprice' OR product_type='$stype'";
		$select_any_result = mysqli_query($connection, $select_any);
		if (!$select_any_result) {
			die("Database query failed."); // bad query syntax
		}
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
	<h2 style = "text-align: center">View Goods by your option.</h2>
	<br>
	<div class = "text-center">
		<table class = "table">
			<tr>
				<td><b>Product ID</b></td>
				<td><b>Product Name</b></td>
				<td><b>In Stock</b></td>
				<td><b>Price</b></td>
				<td><b>Product Type</b></td>
			</tr>
		<?php
			while($subject = mysqli_fetch_assoc($select_any_result)) {
				$id = $subject['product_id'];
				$name = $subject['product_name'];
				$stock = $subject['quantity'];
				$price = $subject['price'];
				$type = $subject['product_type'];
				
				// output data from each row
				echo "<tr>";
				echo "<td>" . $id . "</td>";
				echo "<td>" . $name . "</td>";
				echo "<td>" . $stock . "</td>"; 
				echo "<td>" . $price . "</td>";
				echo "<td>" . $type . "</td>";
				echo "</tr>";
			}
		?>
		</table>
	</div>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
