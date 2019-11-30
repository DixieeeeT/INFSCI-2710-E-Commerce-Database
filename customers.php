<?php
// 1. Create a database connection
$dbhost = "localhost";
$dbuser = "root"; // your username here
$dbpass = "root"; // password here
$dbname = "db"; // your db name here
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
	<meta charset="UTF-8" />
	<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css" />
	<title>Customer Interface</title>
</head>

<body>
	<div id="app">
		<el-container>
			<el-header>
				<el-row>
					<el-col :span="4">
						<h3>XXX's Cars</h3>
					</el-col>
					<el-col :span="20">
						<el-menu :default-active="activeIndex" class="el-menu-demo" mode="horizontal">
							<el-menu-item index="1"><a href="customers.php">Customer Interface</a></el-menu-item>
							<el-menu-item index="2"><a href="data.php">Data Aggregation</a></el-menu-item>
							<el-menu-item index="3"><a href="employees.php">Employee Login</a></el-menu-item>
						</el-menu>
					</el-col>
				</el-row>
			</el-header>
			<el-main>
				<h2 style="text-align: center;">Welcome to XXX's Cars!</h2>
				<h3 style="text-align: center">Choose One Option!</h3>
				<div class="row" style="margin-top: 100px">
					<div class="column text-center" style="float: left; width: 33.33%;">
						<h3>View by Account:</h3>
						<el-form action="account.php" method="post" size="mini">
							<el-form-item label="Cusomer ID">
								<el-input type="text" name="customer_id"></el-input>
							</el-form-item>
							<el-form-item>
								<el-input type="submit" name="Submit" value="Search"></el-input>
							</el-form-item>
						</el-form>
					</div>
					<div class="column text-center" style="float: left; width: 33.33%;">
						<h3>View All the Merchandise:</h3>
						<el-form action="prod_results_all.php" method="post" size="mini">
							<el-form-item label="Start browse here">
								<el-input type="submit" name="brouse" value="Browse"></el-input>
							</el-form-item>
						</el-form>
					</div>
					<div class="column text-center" style="float: left; width: 33.33%;">
						<h3>Search for your Ideal Car:</h3>
						<el-form action="prod_results_search.php" method="post" size="mini">
							<el-form-item label="Card ID">
								<el-input type="text" name="product_id"></el-input>
							</el-form-item>
							<el-form-item label="Brand">
								<el-input type="text" name="car_brand"></el-input>
							</el-form-item>
							<el-form-item label="Model">
								<el-input type="text" name="car_model"></el-input>
							</el-form-item>
							<el-form-item label="Year">
								<el-input type="text" name="car_model_year"></el-input>
							</el-form-item>
							<el-form-item label="Color">
								<el-select v-model="car_color" placeholder="Select color">
									<el-option v-for="item in carcolor" :key="item.value" :label="item.label" :value="item.value"></el-option>
								</el-select>
							</el-form-item>
							<el-form-item>
								<el-input type="submit" name="search" value="Search"></el-input>
							</el-form-item>
						</el-form>
					</div>
				</div>
			</el-main>
		</el-container>
	</div>
</body>
<script src="https://unpkg.com/vue/dist/vue.js"></script>
<script src="https://unpkg.com/element-ui/lib/index.js"></script>
<script>
	new Vue({
		el: '#app',
		data: function() {
			return {
				activeIndex: '1',
				carcolor: [{
						label: 'Select Color',
						value: ''
					},
					{
						label: 'Aquamarine',
						value: 'Aquamarine'
					},
					{
						label: 'Blue',
						value: 'Blue'
					},
					{
						label: 'Crimson',
						value: 'Crimson'
					},
					{
						label: 'Fuscia',
						value: 'Fuscia'
					},
					{
						label: 'Goldenrod',
						value: 'Goldenrod'
					},
					{
						label: 'Green',
						value: 'Green'
					},
					{
						label: 'Indigo',
						value: 'Indigo'
					},
					{
						label: 'Khaki',
						value: 'Khaki'
					},
					{
						label: 'Maroon',
						value: 'Maroon'
					},
					{
						label: 'Mauv',
						value: 'Mauv'
					},
					{
						label: 'Orange',
						value: 'Orange'
					},
					{
						label: 'Pink',
						value: 'Pink'
					},
					{
						label: 'Puce',
						value: 'Puce'
					},
					{
						label: 'Purple',
						value: 'Purple'
					},
					{
						label: 'Red',
						value: 'Red'
					},
					{
						label: 'Teal',
						value: 'Teal'
					},
					{
						label: 'Turquoise',
						value: 'Turquoise'
					},
					{
						label: 'Violet',
						value: 'Violet'
					},
					{
						label: 'Yellow',
						value: 'Yellow'
					}
				]
			}
		}
	})
</script>
<style>
	body {
		font-family: 'Helvetica Neue', Helvetica, 'PingFang SC',
			'Hiragino Sans GB', 'Microsoft YaHei', '微软雅黑', Arial, sans-serif;
	}
</style>

</html>

<?php
// 5. Close database connection
mysqli_close($connection);
?>