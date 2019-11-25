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

	if(isset($_POST['login'])){
		$view_trans = "SELECT * FROM Transaction";
		$view_trans_result = mysqli_query($connection, $view_trans);
		if (!$view_trans_result) {
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
	<h2 style = "text-align: center">View all the Transactions.</h2>
	<br>
	<div class = "text-center">
		<table class = "table">
			<tr>
				<td><b>Order ID</b></td>
                <td><b>Date</b></td>
                <td><b>Salesperson</b></td>
                <td><b>Car ID</b></td>
                <td><b>Customer ID</b></td>
            	<td><b>Price $</b></td>
				<td><b>Car Brand</b></td>
				<td><b>Car Model</b></td>
				<td><b>Model Year</b></td>
				<td><b>VIN</b></td>

			</tr>
		<?php
			while($view_trans_arrs = mysqli_fetch_assoc($view_trans_result)) {
                $orderid = $view_trans_arrs['order_id'];
                $date = $view_trans_arrs['order_date'];
                $empid = $view_trans_arrs['emp_id'];
                $carid = $view_trans_arrs['product_id'];
                $custid = $view_trans_arrs['customer_id'];
            	$price = $view_trans_arrs['car_price'];
				$brand = $view_trans_arrs['car_brand'];
				$model = $view_trans_arrs['car_model'];
				$year = $view_trans_arrs['car_model_year'];
				$vin = $view_trans_arrs['vin'];
				
				// output data from each row
				echo "<tr>";
                echo "<td>" . $orderid . "</td>";
                echo "<td>" . $date . "</td>";
                echo "<td>" . $empid . "</td>";
                echo "<td>" . $carid . "</td>";
                echo "<td>" . $custid . "</td>";
                echo "<td>" . $price . "</td>";
				echo "<td>" . $brand . "</td>";
				echo "<td>" . $model . "</td>"; 
				echo "<td>" . $year . "</td>";
				echo "<td>" . $vin . "</td>";
				echo "</tr>";
			}
		?>
		</table>
	</div>
</body>
</html>

<?php
	// Close database connection
	mysqli_close($connection);
?>
