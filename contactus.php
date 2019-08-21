<?php
	
	$connect = mysqli_connect('localhost','root','','project');
	
	if(isset($_POST['submit']))
	{
		$name = $_POST['myname'];
		$email = $_POST['email'];
		$phone_number = $_POST['phone_number'];
		$message = $_POST['message'];
	
	
	$myquery = mysqli_query($connect,"insert into contact(name,email,phone_number,message) values('$name','$email','$phone_number','$message');");
	
	if($myquery)
	{
		$success = 'Successful';
		echo '<script>alert("Successful")</script>';
	}
	else
	{
		echo '<script>alert("Unsuccessful")</script>';
	}
	}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="style22.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  </head>
  <body>

<div class="contact-section">
	<!--<a href="indexuser.php" class="contact-form-btn">Home</a>-->
  <h1>Contact Us</h1>
  <div class="border"></div>
  <form class="contact-form" role="form" action="" method="post">
    <input type="text" class="contact-form-text" name="myname" placeholder="Your name" required="required">
    <input type="email" class="contact-form-text" name="email" placeholder="Your email"required="required">
    <input type="text" class="contact-form-text" name="phone_number" placeholder="Your phone" required="required">
    <textarea class="contact-form-text" name="message" placeholder="Your message" required="required"></textarea>
    <input type="submit" class="contact-form-btn" value="Send">
	<h5 class="text-danger">
			<?php
					if(isset($success))
					{
						echo $success;
					}
			?>
  </form>
</div>


  </body>
</html>
