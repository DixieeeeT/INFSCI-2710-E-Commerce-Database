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
	if(isset($_POST['browse'])){
		$select_all = "SELECT * FROM Product";
		$select_all_result = mysqli_query($connection, $select_all);
		if (!$select_all_result) {
			die("Database query failed."); // bad query syntax
		}
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
	<link rel="stylesheet" type="text/css" href="ricks.css">
	<script src="js/jquery-3.4.1.js"></script>
	<script src="js/ricks.js"></script>
	<title>Customer Interface</title>
</head>
<body>
	<header>
		<h3 style="display:inline">Rick's Sports</h3>&nbsp;&nbsp;
		<a href="customers.php">Customer Interface</a>&nbsp;&nbsp;
		<a href="data.php">Data Aggregation</a>&nbsp;&nbsp;
		<a href="employees.php">Employee Login</a>&nbsp;&nbsp;
	</header>
	<br/><br/>
	<table>
		<tr>
			<td><b>Product ID</b></td>
			<td><b>Product Name</b></td>
			<td><b>In Stock</b></td>
			<td><b>Price</b></td>
			<td><b>Product Type</b></td>
		</tr>
	<?php
		while($subject = mysqli_fetch_assoc($select_all_result)) {
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
	<?php
		// 4. Release returned data
		mysqli_free_result($result);
	?>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
