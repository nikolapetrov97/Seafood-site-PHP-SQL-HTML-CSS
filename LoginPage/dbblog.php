<?php
	$db = mysqli_connect("localhost","root","","",3307) or die("Unable to connect");
mysqli_select_db($db,"blog");
?>