<?php
require "testmodel.php";
$db = new DB(); //read the testmode1.php function with DB
session_start();

if(isset($_POST['search'])){ 
	echo '<form method="POST" action="itempage.php">
		    <label for="name">user name: </label>
            <input type="text" name="name">
			<button type="submit" name="search">search</button>
		</form>';
	$_SESSION['haveitem'] = 0;
	//read the function if customer connect find all
  $sql = "SELECT Name,Img FROM Item where Name = (:Name)"; //here is the sql function
  //$temp_ssn => $_POST["ssn"] 
  //$db -> __construct;
		$data = $db -> select($sql,[
		":Name" =>$_POST["name"],
		]);
  foreach($data as $v){
	$itemname = trim($v['Name']);
	$Img = trim($v['Img']);
	$_SESSION['item'] = $username;
	echo "    <!DOCTYPE html>
    <html>
	<head>
		<script src='./js/item.js' defer>
		</script><!-- here I was check online defer can make js run at same time if not have defer the program can not working-->
	</head>
    <body>
    	<h1 id='itemname' onclick='checkitem()'>$itemname</h1>
		<p align= 'center' ><Button type='submit' onclick='checkitem()'><img height='200' width='200' align='center' src='$Img'/></Button></p>  <!-- have two button and let the user chose-->  
     </body>
     </html>";

	$_SESSION['haveitem'] = 1;
	
  }
  if($_SESSION['haveitem'] == 0){
  echo "Sorry we do not have this item";
  }
}

if(isset($_POST['shopping'])){ 
	echo '<form method="POST" action="itempage.php">
		    <label for="name">user name: </label>
            <input type="text" name="name">
			<button type="submit" name="search">search</button>
		</form>';
	
	//read the function if customer connect find all
  $sql = "SELECT Name,Img FROM Item"; //here is the sql function
  //$temp_ssn => $_POST["ssn"] 
  //$db -> __construct;
  $data = $db -> select($sql);
  foreach($data as $v){
	$itemname = trim($v['Name']);
	$Img = trim($v['Img']);
	echo "
    <!DOCTYPE html>
    <html>
		<script src='./js/item.js' defer>
		</script><!-- here I was check online defer can make js run at same time if not have defer the program can not working-->
	</head>
    <body>
    	<div id='itemname'>$itemname</div>
		<p align= 'center' ><Button type='submit' onclick='checkitem()'><img height='200' width='200' align='center' src='$Img'/></Button></p>  <!-- have two button and let the user chose-->  
     </body>
     </html>
        
        ";
  }
}

if(isset($_POST['Register'])){ //each button go here
  header('location:register.html');
}

session_start();

?>