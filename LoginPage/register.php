f<?php
	require 'dbblog.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>REGISTRATION</title>
    <link href="css/account1.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color:purple">
	<div id="main-wrapper">
	<center>
	<h2>Register Form</h2>
	<img src="css/avatar.png" class="avatar"/>
	</center>
	
	<form class="myform" action="register.php" method="post">
		<label><b>Username:</b></label><br>
		<input name="username" type="text" class="inputvalues" placeholder="Type your username" required/><br>
		<label><b>Password</b></label><br>
		<input name="password" type="password" class="inputvalues" placeholder="Type your password" required/><br>
		<label><b>Confirm Password:</b></label><br>
		<input name="cpassword" type="password" class="inputvalues" placeholder="Confirm your password" required/><br>
		<input name="submit_btn" type="submit" id="signupbtn" value="Sign up"/><br>
		<a href="login1.php"><input type="button" id="backbtn" value="Back to login"/>
	</form>
	<?php
		if(isset($_POST['submit_btn']))
		{
			
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			
			if($password==$cpassword)
			{
				$query="select * from user WHERE username='$username'";
				$query_run=mysqli_query($db,$query);
				if(mysqli_num_rows($query_run)>0)
				{
						echo '<script type="text/javascript"> alert("User already exists") </script>';
				}
				else
				{
					$query="insert into user(username,password) values ('$username','$password')";
					$query_run=mysqli_query($db,$query);
					
					if($query_run)
					{
						echo '<script type="text/javascript"> alert("SUCCESS! Go to login page to login") </script>';
					}
					else
					{
						echo '<script type="text/javascript"> alert("Error!") </script>';
					}
				}
			}
			else
			{
				echo '<script type="text/javascript"> alert("Password and confirm password does not match!") </script>';
			}
		}
	?>
	</div>
</body>
</html>