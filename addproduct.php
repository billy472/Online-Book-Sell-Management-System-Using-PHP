<?php
	
	$connect = mysqli_connect('localhost','root','','project');
	
	if(isset($_POST['submit']))
	{
		$name = $_POST['pname'];
		$authorname = $_POST['authorname'];
		$category = $_POST['productcategory'];
		$price = $_POST['productprice'];
		$status = $_POST['productstatus'];
		$description = $_POST['productdescription'];
	
	
	$myquery = mysqli_query($connect,"insert into product(name,author_name,category,price,status,description) values('$name','$authorname','$category','$price','$status','$description');");
	
	if($myquery)
	{
		$success = 'Product adding successful';
	}
	else
	{
		$success = 'Product adding unsuccessful';
	}
	}

?>


<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<style>
.col-md-5{
	text-align: right;
}

</style>
</head>

	<body>
		<div class="container">

<div class="container">
  
  <div class="row">
    <div class="col-md-6">
    <h1>Add Product</h1>
    </div>
	<div class="col-md-5">
    <h4><a href="admintable.php">Admin Home</a></h4>
    </div>
  </div>
  
    
  
<div class="row">
  
  <div class="col-md-6">
  <form role="form" action="" method="post">
    
	 <div class="form-group">
   <label for="productname" class="loginFormElement">Product Name:</label>
   <input class="form-control" id="productname" name="pname" type="text">
   
   <label for="productname" class="loginFormElement">Author Name:</label>
   <input class="form-control" id="productname" name="authorname" type="text">
 
	<label for="productname" class="loginFormElement">Category:</label>
    <select class="form-control" id="productcategory" name="productcategory"><option>Select one</option>
      <option>Engineering</option>
      <option>Medical</option>
      <option>Programming</option>
      <option>Politics</option>
      <option>Islamic</option>
    </select>
    
</div>
    
 <div class="form-group">
   <label for="productprice" class="loginFormElement">Product Price</label>
   <input class="form-control" id="productprice" name="productprice" type="text">
 </div>
   
<!-----
<div class="form-group">
 
<label class="control-label">Product Image</label>
 
<input class="filestyle" data-icon="false" type="file">
 
</div>
   ----->
   
   <label for="productname" class="loginFormElement">Status:</label>
    <select class="form-control" id="productstatus" name="productstatus"><option>Select one</option>
      <option>On Sale</option>
      <option>New Product</option>
      <option>Featured Category</option>
      <option>Discounts</option>
    </select><br/>
   
    <div class="form-group">
      <label class="loginformelement" for="productdescription">Product Description</label>
  	  <input id="productdescription" class="form-control input-lg" name="productdescription" type="text"><div class="container">
      </div><br/>
 
    <button type="submit" id="loginSubmit" name="submit" class="btn btn-success loginFormElement">Add Product</button>
	
					<h5 class="text-danger">
			<?php
					if(isset($success))
					{
						echo $success;
					}
			?>
		
		</h5>
  
    </div></form>
    
    </div>
	</body>
</html>