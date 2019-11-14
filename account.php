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
	$id = $_POST['customer_id'];

	$get_account = "SELECT * FROM Accounts WHERE customer_id = '$id'";

	$account_result = mysqli_query($connection, $get_account);
	if (!$account_result) {
		die("Database query failed."); // bad query syntax
	}

	$account_row = mysqli_fetch_assoc($account_result);
	$balance = $account_row['balance'];
?>
<?php
	if(isset($_POST['pay'])){
		$bal = $_POST['balance'];
		$pay = $_POST['payment'];
		$new_bal = $bal - $pay;
		
		$payment_query = "UPDATE Accounts SET balance = '$new_bal' WHERE customer_id = '$id'";
		
		$payment_result = mysqli_query($connection, $payment_query);
		if ($payment_result) {
			echo "Successfully updated balance. Current Balance: $" . $new_bal;
		} else {
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
	<title>Customer Account</title>
</head>
<body>
	<header class = "container" style = "text-align: center">
		<h3 class = "col" style="display:inline">XXX's Cars</h3>&nbsp;&nbsp;
		<a class = "col" href="customers.php">Customer Interface</a>&nbsp;&nbsp;
		<a class = "col" href="data.php">Data Aggregation</a>&nbsp;&nbsp;
		<a class = "col" href="employees.php">Employee Login</a>&nbsp;&nbsp;
	</header>
	<br>
	<h2 style = "text-align: center">Account for Customer <?php echo $id;?>:</h2>
	<br>
	<div class = "text-center" style = "margin-top: 100px">
		<form action="account.php" method="post">
			<div>
				<label for="balance">Account Balance: </label>
				<input type="text" name="balance" value="<?php echo $balance;?>" />
			</div>
			<div>
				<label for="payment">Enter Payment Amount: </label>
				<input type="text" name="payment" />
			</div>
			<div><input type="submit" name="pay" value="Make Payment"></div>
		</form>
	</div>
</body>
</html>

<?php
	// 5. Close database connection
	mysqli_close($connection);
?>
