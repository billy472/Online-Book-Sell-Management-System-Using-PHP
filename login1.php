<?php
	session_start();
	$connect = mysqli_connect('localhost','root','','project');
	$match = "";
	if(isset($_POST['submitbtn']))
	{
		$email = $_POST['email']; 
		$password = $_POST['password']; 
		if(!empty($email))
		{
			$login_query = mysqli_query($connect, "select * from user where email='$email'");
			$login_fetch = mysqli_fetch_assoc($login_query);
			
			$email_db = $login_fetch['email'];
			$password_db = $login_fetch['password'];
			$name_db = $login_fetch['name'];
			$phone_db = $login_fetch['phone_number'];
			
			if($email_db == $email && $password_db == $password)
			{	
				$_SESSION['email'] = $email;
				$_SESSION['name'] = $name_db;
				$_SESSION['phone_number'] = $phone_db;
				header('location: indexuser.php');
			}
			else
			{
				$match = "Email or password do not match!";
			}
		}
		
	}

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Log in</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>  
	
   <style>
 *{
	margin: 0; 
	padding: 0;
}

body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: url(img1.jpg) no-repeat;
  background-size: cover;
}

.top-nav-bar{
	height: 60px;
	top: 0;
	position: sticky;
	background: #fff;
	margin-bottom: 20px;
	border-bottom: 3px  solid orange;
	z-index: 2;
}   
 
.logo{
	float: left;
	height: 45px;
	width: 60px;
	margin: 5px 10px;
	
}

 
.form-design{ 
		width: 320px; background: #3e3d3d; 
		padding: 40px 20px; 
		box-sizing: border-box; 
		position: fixed; 
		left: 50%; 
		top: 50%; 
		transform: translate(-50%, -50%);
}
h1{
	text-align: center; 
	color: #fff; 
	font-weight: normal; 
	margin-bottom: 20px;
}
        
input{
	width: 100%; 
	background: none; 
	border: 1px solid #fff; 
	border-radius: 3px; padding: 6px 15px; 
	box-sizing: border-box; 
	margin-bottom: 20px; 
	font-size: 16px; 
	color: #fff;
}
        
input[type="submit"]{ 
	background: #bac675; 
	border: 0; 
	cursor: pointer; 
	color: #3e3d3d;
}
input[type="submit"]:hover{ 
	background: #a4b15c; 
	transition: .6s;
}
        
::placeholder{
	color: #fff;
}
p{
	color: white;
	font-size: 12px;
}
p a{
	color: white;
}
.admin_login{
	float: right;
	text-align: right;
	padding: 10px;
}
    </style>
    <body>
	<div class="top-nav-bar">
				<div class="admin_login">
					<a href="adminlogin.php">Admin Login</a>
				</div>
			<div class="header">
				<a href="index.php"><img src="logo.jpg" alt="" class="logo"></a>
					
			</div>
			
			
		</div>
		
		
        <div class="form-design">
            <form action="" method="post">
                <h1>Log in</h1> 
				<h5 class="text-danger"><?php echo $match; ?></h5>
                <input type="email" name="email" placeholder="Email">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="submitbtn" value="Sign in" class="btn btn-success">
				<p>Do not have an account &nbsp <a href="signup1.php">Sign up here</p>
            </form>
        </div>
    </body>
</html>