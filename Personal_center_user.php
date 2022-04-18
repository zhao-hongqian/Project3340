<?php
require "testmodel.php";
$db = new DB(); //read the testmode1.php function with DB
	session_start();
	
	$username = $_SESSION['username'];
	echo "Welcome to xxxx Personal center <br>";
	echo "user name is : $username <br>";
	
	echo "<a href='index.html'>logout</a>";

?>

<html>

<head>
    <!-- Bootstrap for css styling -->
  <style>
.box a{ padding:0 50px;}<!-- make the href far and easy read-->
</style>
  </head>
<body>

<h1 class="text-primary text-center">Thank you for using</h1>

<form method="POST" action= "itempage.php" >

		<p align= "center" ><button type="submit" name="shopping">go to shopping</button> 
		
  </form>
  
  <form method="POST" action= "shoppingcar.php" >

		<p align= "center" ><button type="submit" name="car">go to shopping car</button> 
		
  </form>
</body>
</html>