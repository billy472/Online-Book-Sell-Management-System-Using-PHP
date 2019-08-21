<?php
	session_start();
	$email = $_SESSION['email'];
	$name = $_SESSION['name'];
	if(!isset($_SESSION['email']))
	{
		header('location: login1.php');
		exit();
	}
	$connect = mysqli_connect('localhost','root','','project');

	$showquery1 = mysqli_query($connect, "select * from order_items where email='$email'");
	
	$showfetch1 = mysqli_fetch_all($showquery1, MYSQLI_ASSOC);
	
	
	
	

?>

<!DOCTYPE html>
<html>
	<head>
	<title>User</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	
	<style>
		.col-md-8{
			float: left;
			text-align: center;
		}
		.col-md-6{
			float: right;
		}
		.top-nav-bar{
	height: 57px;
	top: 0;
	position: sticky;
	background: #fff;
	margin-bottom: 20px;
	border-bottom: 3px  solid orange;
	z-index: 2;
}   
 
.logo{
	height: 50px;
	margin: 5px 10px;
}
.admin_login{
	float: right;
	text-align: right;
	padding: 10px;
}
.name1{
	float: right;
	padding-right: 500px;
}
	
	</style>
	
	<body>
	<div class="top-nav-bar">
				<div class="admin_login">
					<a href="logout.php">Log out</a>
				</div>
				<div class="name1"><h3><?php echo $name;  ?></div>
			<div class="header">
				<a href="indexuser.php"><img src="logo.jpg" alt="" class="logo"></a>
					
			</div>
			
			
		</div>
		<div class="col-md-8">
		<h2 style="text-align: Center;">Order Information</h2>
		<table class="table">
			<tr>
				<th>Book Name</th>
				<th>Price</th>
				<th>Quatity</th>
			</tr>
			<?php
				foreach($showfetch1 as $single)
				{
					$name = $single['item_name'];
					$ph = $single['price'];
					$da = $single['item_quatity'];
					echo "<tr>
					<td>$name</td>
					<td>$ph</td>
					<td>$da</td>
						</tr>";
				}
			?>
			
		
		</table>
		</div>
		
	
	</body>
	
	

</html>