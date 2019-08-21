<?php
	session_start();
	$connect = mysqli_connect('localhost','root','','project');

	if(isset($_POST['submitbtn']))
	{
		$name = $_POST['name']; 
		$password = $_POST['password']; 
		if(!empty($name))
		{
			$login_query = mysqli_query($connect, "select * from admin where id='$name'");
			$login_fetch = mysqli_fetch_assoc($login_query);
			
			$id_db = $login_fetch['id'];
			$password_db = $login_fetch['password'];
			
			if($id_db == $name && $password_db == $password)
			{
				$_SESSION['id'] = $name;
				header('location: admintable.php');
			}
		}
		
	}

?>


<!DOCTYPE html>
<html>
    <head>
        <title>Log in</title>
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

    </style>
    <body>
	<div class="top-nav-bar">
			<div class="header">
				<a href="index.php"><img src="logo.jpg" alt="" class="logo"></a>
					
			</div>
			
			
		</div>
		
		
        <div class="form-design">
            <form action="" method="post">
                <h1>Admin Log in</h1>  
                <input type="text" name="name" placeholder="Username">
                <input type="password" name="password" placeholder="Password">
                <input type="submit" name="submitbtn" value="Sign in" class="btn btn-success">
            </form>
        </div>
    </body>
</html>