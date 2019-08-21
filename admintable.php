<?php
	session_start();
	if(!isset($_SESSION['id']))
	{
		header('location: adminlogin.php');
		exit();
	}
	$connect = mysqli_connect('localhost','root','','project');

	$showquery1 = mysqli_query($connect, "select * from user");
	
	$showfetch1 = mysqli_fetch_all($showquery1, MYSQLI_ASSOC);
	
	
	$showquery2 = mysqli_query($connect, "select * from order_table");
	
	$showfetch2 = mysqli_fetch_all($showquery2, MYSQLI_ASSOC);
	
	
	

?>

<!DOCTYPE html>
<html>
	<head>
	<title>Admin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	
	<style>
		.col-md-5{
			float: left;
		}
		.col-md-6{
			float: right;
		}
		.logout{
			float: right;
		}
		.add{
			float: left;
		}
	</style>
	
	<body>
		<div class="logout"><a href="adminlogin.php">Log out</a></div>
		<div class="add"><a href="addproduct.php">Add Product</a></div>
		<div class="col-md-5"><br/>
		<h2 style="text-align: Center;">User Information</h2>
		<table class="table">
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Phone Number</th>
			</tr>
			<?php
				foreach($showfetch1 as $single)
				{
					$name = $single['name'];
					$email = $single['email'];
					$phone_number = $single['phone_number'];
					echo "<tr>
					<td>$name</td>
					<td>$email</td>
					<td>$phone_number</td>
						</tr>";
				}
			?>
			
		
		</table>
		</div>
		
		<div class="col-md-6">
		<h2 style="text-align: Center;">Order Information</h2>
		<table class="table">
			<tr>
				<th>Order ID</th>
				<th>Book Name</th>
				<th>Phone Number</th>
				<th>Total Price</th>
				<th>Delivery Address</th>
			</tr>
			<?php
				foreach($showfetch2 as $single)
				{
					$order_id = $single['id'];
					$phone_number = $single['phone_number'];
					$book_name = $single['name'];
					$price = $single['total_price'];
					$delivery_address = $single['delivery_address'];
					echo "<tr>
					<td>$order_id</td>
					<td>$book_name</td>
					<td>$phone_number</td>
					<td>$price</td>
					<td>$delivery_address</td>
						</tr>";
				}
			?>
			
		
		</table>
		</div>
	
	</body>
	
	

</html>