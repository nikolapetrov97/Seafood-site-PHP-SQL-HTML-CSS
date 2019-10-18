<?php
	session_start();
	require'dbblog.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Seafood shop</title>
    <link href="css/account1.css" rel="stylesheet" type="text/css">
</head>
<body style="background-color:#002633">
	<div id="main-wrapper"> 
	<center>
	<h2>Login Form</h2>
	<img src="css/avatar.png" class="avatar"/>
	</center>
	
	<form class="myform" action="login1.php" method="post">
		<label><b>Username:</b></label><br>
		<input name="username" type="text" class="inputvalues" placeholder="Type your username"/><br>
		<label><b>Password:</b></label><br>
		<input name="password" type="password" class="inputvalues" placeholder="Type your password"/><br>
		<input name="login" type="submit" id="loginbtn" value="Login"/><br>
		<a href="register.php"><input type="button" id="registerbtn" value="Register"/>
	</form>
<?php
	if(isset($_POST['login']))
	{
		$username=$_POST['username'];
		$password=$_POST['password'];
		$query="select * from user WHERE username='$username' AND password='$password'";
		$query_run=mysqli_query($db,$query);
		if(mysqli_num_rows($query_run)>0)
		{
			$_SESSION['username']= $username;
			header('location:index.php');
		}
		else
		{
			echo '<script type="text/javascript"> alert("Wrong username or password !") </script>';
		}
	}
?>
	</div>
</body>
</html>