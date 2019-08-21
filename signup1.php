<?php
	
	$connect = mysqli_connect('localhost','root','','project');
	
	if(isset($_POST['submitbtn']))
	{
		$name = $_POST['name'];
		$email = $_POST['email'];
		$phonenumber = $_POST['phonenumber'];
		$password = $_POST['password'];
	
	
	$myquery = mysqli_query($connect,"insert into user(name,email,phone_number,password) values('$name','$email','$phonenumber','$password');");
	
	if($myquery)
	{
		$success = 'Registration successful';
		header('location: login1.php');
	}
	}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Sign Up</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

        <!-- Popper JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    </head>
    
    <style>
    
        *{margin: 0; padding: 0;}
        body{
  margin: 0;
  padding: 0;
  font-family: sans-serif;
  background: url(img1.jpg) no-repeat;
  background-size: cover;
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

h2{
	text-decoration: none;
	text-align: right;
	color: white;
	margin: 20px;
	
}
        
.form-wrap{ 
            width: 320px;
             background: #3e3d3d; 
             padding: 50px 20px; 
             box-sizing: border-box; 
             position: fixed; 
             left: 50%; top: 55%; 
             transform: translate(-50%, -50%);}
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
    border-radius: 3px; 
    padding: 6px 15px; 
    box-sizing: border-box; 
    margin-bottom: 20px; 
    font-size: 16px; color: #fff;}
        
input[type="button"]{ 
    background: #bac675; 
    border: 0; 
    cursor: pointer; 
    color: #3e3d3d;
    }
input[type="button"]:hover{ 
    background: #a4b15c; 
    transition: .6s;
    }
        
::placeholder{color: #fff;}
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
				<a href="indexuser.php"><img src="logo.jpg" alt="" class="logo"></a>
			</div>
			
		</div>
		<div class="form-wrap">
            <form action="" onsubmit="return validation()" method="post">
                <h1>Sign Up</h1>
				<h5 class="text-danger">
			<?php
					if(isset($success))
					{
						echo $success;
					}
			?>
		
		</h5>
                <input type="text" id="name" name="name" placeholder="Name">
                <span id="Name" style="color: red;"></span>
                <input type="email" id="email" name="email" placeholder="Email" required="required">
                <span id="Email" style="color: red;"></span>
                <input type="text" id="phonenumber" name="phonenumber" placeholder="Phone Number">
                <span id="Phone_Number" style="color: red;"></span>
                <input type="password" id="password" name="password" placeholder="Password">
                <span id="Password" style="color: red;"></span>
                <input type="password" id="conpassword" placeholder="Confirm Password">
                <span id="Con_Password" style="color: red;"></span>
                <input type="submit" name="submitbtn" value="Sign Up" class="btn btn-success">
				<p>Already have an account &nbsp <a href="login1.php">Log in here</p>
            
            </form>
        
        </div>
    
    <script type="text/JavaScript">

        function validation() {

            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var phonenumber = document.getElementById('phonenumber').value;
            var password = document.getElementById('password').value;
            var conpassword = document.getElementById('conpassword').value;

            if(name == "")
            {
                document.getElementById('Name').innerHTML = " ** Please fill the name fileld";
                return false;
            }
            if((name.length <= 2) || (name.length >= 20))
            {
                document.getElementById('Name').innerHTML = " ** Length must be within 3 to 20 character";
                return false;
            }
            if(!isNaN(name))
            {
                document.getElementById('Name').innerHTML = " ** only characters are allowed";
                return false;
            }

            if(email == "")
            {
                document.getElementById('Email').innerHTML = " ** Please fill the email fileld";
                return false;
            }
            /*if(email.indexOf('@') <= 0){
                document.getElementById('Email').innerHTML = " ** Invalid email";
                return false;
            }
            if((email.charAt(email.length-4)!='.') || (email.charAt(email.length-3)!='.')){
                document.getElementById('Email').innerHTML = " ** Invalid email";
                return false;
            }*/

            if(phonenumber == "")
            {
                document.getElementById('Phone_Number').innerHTML = " ** Please fill the phone number fileld";
                return false;
            }
            if(isNaN(phonenumber))
            {
                document.getElementById('Phone_Number').innerHTML = " ** only numbers are allowed";
                return false;
            }
            if(phonenumber.length != 11)
            {
                document.getElementById('Phone_Number').innerHTML = " ** length must be 11 digits";
                return false;
            }


            if(password == "")
            {
                document.getElementById('Password').innerHTML = " ** Please fill the password fileld";
                return false;
            }
            if(password.length <= 5)
            {
                document.getElementById('Password').innerHTML = " ** Length at least 6 character";
                return false;
            }
            if(conpassword == "")
            {
                document.getElementById('Con_Password').innerHTML = " ** Length at least 6 character";
                return false;
            }
            if(conpassword != password)
            {
                document.getElementById('Con_Password').innerHTML = " ** Password do not match";
                return false;
            }

        }
        
    </script>
    
    </body>
</html>