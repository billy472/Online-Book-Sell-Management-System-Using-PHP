<?php

	session_start();
	
	$name = $_SESSION['name'];
	$email = $_SESSION['email'];
	$phone_number = $_SESSION['phone_number'];
	
	if($name == "")
	{
		echo '<script>alert("Please Login.")</script>';
		echo '<script>window.location="login1.php"</script>';
	}

	
$connect = mysqli_connect("localhost", "root", "", "project");
 
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
		$count = count($_SESSION["shopping_cart"]);
		$item_array = array(
		'item_id'		=>	$_GET["id"],
		'item_name'		=>	$_POST["hidden_name"],
		'item_price'		=>	$_POST["hidden_price"],
		'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
		echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
		'item_id'		=>	$_GET["id"],
		'item_name'		=>	$_POST["hidden_name"],
		'item_price'		=>	$_POST["hidden_price"],
		'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
 
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		if($values["item_id"] == $_GET["id"])
		{
		unset($_SESSION["shopping_cart"][$keys]);
		echo '<script>alert("Item Removed")</script>';
		echo '<script>window.location="cart.php"</script>';
		}
		}
	}
}
	
	
	
?>


<!DOCTYPE html>


<html>


<head>
	<meta charset="utf-8">
	<title>Home</title>
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
	<style>

	</style>
	

<body>
	<div style="clear:both"></div>
		<br />
		<h3 align="center">My Cart</h3>
		<div class="table-responsive">
		<table class="table table-bordered">
		<tr>
		<th width="40%">Item Name</th>
		<th width="10%">Quantity</th>
		<th width="20%">Price</th>
		<th width="15%">Total</th>
		<th width="5%">Action</th>
		</tr>
		<?php
		
		//$item_quantity = 2;
		if(!empty($_SESSION["shopping_cart"]))
		{
		$total = 0;
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		?>
		<tr>
		<td><?php echo $values["item_name"]; ?></td>
		<td><?php echo $values["item_quantity"]; ?></td>
		<td>$ <?php echo $values["item_price"]; ?></td>
		<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
		<td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
		</tr>
		<?php
		$total = $total + ($values["item_quantity"] * $values["item_price"]);
		}
		?>
		<tr>
		<td colspan="3" align="right">Total</td>
		<td align="right">$ <?php echo number_format($total, 2); ?></td>
		<td></td>
		</tr>
		<?php
		}
		?>
		
		</table>
		</div>
		</div>
	</div>
	<br />
		<a href="indexuser.php" class="btn btn-info" role="button">Continue Shopping</a>
		<a href="shippingpage.php" class="btn btn-info" role="button">Checkout</a>		


</body>


</html>