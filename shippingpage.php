<?php

	session_start();
	$name = $_SESSION['name'];
	$email = $_SESSION['email'];
	$phone_number = $_SESSION['phone_number'];
	
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
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<style>
			.left1{
				width: 50%;
				float: left;
			}
			.right1{
				width: 50%;
				float: right;
			}
	</style>
	</head>

<body>





	<div class="left1">
		<h3>Order Summery</h3><br/>
		<div class="col-md-8">
		<table class="table table-bordered">
		<tr>
		<th width="10%">Item Name</th>
		<th width="5%">Quantity</th>
		<th width="10%">Price</th>
		<th width="25%">Total</th>
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
		</tr>
		<?php
		$total = $total + ($values["item_quantity"] * $values["item_price"]);
		}
		?>
		<tr>
		<td colspan="3" align="right">Payable Total</td>
		<td align="left">$ <?php echo number_format($total, 2); ?></td>
		
		</tr>
		<?php
		}
		?>
		
		</table>
		<a href="cart.php" class="btn btn-info" role="button">Back To Cart</a>
		</div>
</div>




<div class="right1">
<h3>Delivery Details</h3><br/>
<div class="row">
  
  <div class="col-md-7">
  <form role="form" action="" method="post">
    
	 <div class="form-group">
   <label for="productname" class="loginFormElement">Name:</label>
   <input class="form-control" id="productname" name="pname" type="text" value="<?php
echo "$name";

?>"></div>
   
   <div class="form-group">
   <label for="productname" class="loginFormElement">Phone Number:</label>
   <input class="form-control" id="phone_number" name="phone_number" type="text" value="<?php
echo "$phone_number";

?>"></div>
   
   <div class="form-group">
      <label class="loginformelement" for="productdescription">Delivery Address</label>
  	  <input id="productdescription" class="form-control input-lg" name="address" type="text"></div>
 
    <button type="submit" id="confirm_order" name="submitorder" class="btn btn-success loginFormElement">Confirm Order</button>
	
  
    </div></form>
    
    </div>
</div></div>

	<?php
	
	if(isset($_POST['submitorder']))
	{
		$name = $_POST['pname'];
		$phone_number = $_POST['phone_number'];
		$total_price = $total;
		$address = $_POST['address'];
	
	
	$myquery = mysqli_query($connect,"insert into order_table(name,email,phone_number,total_price,delivery_address) values('$name','$email','$phone_number','$total_price','$address');");
	
	
	}
	
	?>
		
</body>
</html>

<?php
		
		if(isset($_POST['submitorder']))
	{
		$showquery2 = mysqli_query($connect, "SELECT id FROM order_table ORDER BY id DESC LIMIT 1");
		$a = mysqli_fetch_assoc($showquery2);
		if(!empty($_SESSION["shopping_cart"]))
		{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		//echo "$orderid";
		
		$orderid = implode(', ', $a);
		$name = $values["item_name"];
		//echo "$name";
		$q = $values["item_quantity"];
		//echo "$q";
		$price = $values["item_price"];
		//echo "$price";
		echo "<br/>";
		$myq = mysqli_query($connect, "insert into order_items(order_id,item_name,price,item_quatity,email) values('$orderid','$name','$price','$q','$email');");
		}
		}
		echo '<script>alert("Order Confirmed.")</script>';
		unset($_SESSION['shopping_cart']);
		echo '<script>window.location="indexuser.php"</script>';
	
		
	}
	
		
	?>