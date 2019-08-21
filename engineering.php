<?php
$connect = mysqli_connect('localhost','root','','project');

	//$showquery1 = mysqli_query($connect, "select * from product");
	
	
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
	
</head>
<body>
		<div class="top-nav-bar">
			<div class="search-box">
				<a href="indexuser.php"><img src="logo.jpg" alt="" class="logo"></a>
				<input type="text" name="search" class="form-control">
				<span class="input-group-text"><i class="fa fa-search"></i></span>
			</div>
			<div class="menu-bar">
				<ul>
					<ul>
					<li><a href="cart.php"><i class="fa fa-shopping-basket"></i>cart</a></li>
					<li><a href="login1.php">Login</a></li>
					<li><a href="signup1.php">Sign up</a></li>
				</ul>
				</ul>
			</div>
		</div>
		<section class="header">
			<div class="side-menu">
				<ul>
					<li><a href="engineering.php">Engineering</a></li>
					<li><a href="#">Medical</a> </li>
					<li><a href="#">Programming</a></li>
					<li><a href="#">Islamic</a></li>
					<li><a href="#">Politics</a><li>
						
				</ul>
			</div>
			</section>
			
			<section class="on-sale">
			<div class="container">
				<div class="title-box">
					<h2>Engineering</h2>
				</div>
				<div class="row">
				<?php
				$showquery2 = mysqli_query($connect, "select * from product where category='Engineering'");
		if(mysqli_num_rows($showquery2) > 0)
		{
		while($row = mysqli_fetch_array($showquery2))
		{
		?>
		<div class="col-md-3">
		<form method="post" action="cart.php?action=add&id=<?php echo $row["id"]; ?>">
		<div style="border:3px solid #5cb85c; background-color:whitesmoke; border-radius:5px; padding:16px;" align="center">
		
		<?php echo"<img src='img/".$row["name"].".jpg' class='img-responsive' width='100%' height=70%/> <br/>";?>
		<p>Name: <?php echo $row["name"]; ?></p>
		<p><?php echo "Author Name: ".$row["author_name"]; ?></p>
 
		<h4 class="text-danger">TK: <?php echo $row["price"]; ?></h4>
 
		<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />
 
		<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />
 
		<input type="number" name="quantity" value="1"/> &nbsp &nbsp <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />
 
		</div>
		</form>
		</div>
		<?php
		}
		}?></div>
		</div> </section>
			
			<section class="footer">
				<div class="container text-center">
				<div class="row">
					<div class="col-md-3">
						<h1>Useful Links</h1>
						<p>Privacy Policy<p>
						<p>Terms of use</p>
						<p>Return policy</p>
						<p>Discount coupons</p>
					</div>
					<div class="col-md-3">
						<h1>Company</h1>
						<p>About us<p>
						<p>Contact us</p>
						<p>Career</p>
						<p>Affiliate</p>
					</div>
					<div class="col-md-3">
						<h1>Support</h1>
						<p>Oreder track</p>
						<p>Find my product</p>
						<p>Guide<p>
						<p>Help desk</p>
					</div>
					<div class="col-md-3">
						<h1>Follow us on</h1>
						<p><i class="fa fa-facebook-official"></i> Facebook<p>
						<p><i class="fa fa-youtube-play"></i> youtube</p>
						<p><i class="fa fa-linkedin"></i> Linked in</p>
						<p><i class="fa fa-twitter"></i> Twitter</p>
					</div>
				</div>
				<hr>
				<p class="copy-right">	&copy Web Technologies Project</p>
				</div>
			</section>
		
		</body>
</html>



