<?php
require "testmodel.php";
$db = new DB(); //read the testmode1.php function with DB
session_start();

if(isset($_POST['buycar'])){//here is from the testdelet.php
  $sql = "DELETE FROM Shoppingcar WHERE Email=(:Email)";
  //$temp_ssn => $_POST["ssn"] 
  //$db -> __construct;
  $result = $db -> delet($sql,[":Email" =>$_SESSION['username']]);
  if($result >0){
  echo "Thank you 
  <a href='./Personal_center_user.php'>back to personal center</a>";
  }
  else{
    echo "sorry please check again
    <a href='./Personal_center_user.php'>back to personal center</a>";
  }
}

if(isset($_POST['car'])){ 
  echo "shopping car";
  $sql = "SELECT * FROM Shoppingcar where Email = (:Name)"; //here is the sql function
  
		$data = $db -> select($sql,[
		":Name" =>$_SESSION['username'],
		]);
  foreach($data as $v){
    $Price = trim($v['Price']);
	$amount = trim($v['amount']);
    $totle = $Price*$amount;
	echo "<table border='1'>
    <tr>
    <th>username: {$v['Email']}</th>
    <th>item: {$v['item']}</th>
    <th>amount: {$v['amount']}</th>
    <th>totle price: $totle</th>
    </tr>
    		</table>";
    
    echo "<a href='./Personal_center_user.php'>back to personal center</a>
            
            ";
  }

}
?>

<html>

<head>

<style>
.photo{
    float:left;
    width:50%;
}
.word{
    float:right;
    width:50%;
}
</style>
    <title>shopping</title>
</head>

<body>

<form method="POST" action="shoppingcar.php"> 
    <div>
		<p align= "center" ><button type="submit" name="buycar">buy them</button> </p>
	</div>
  
  </form>
</body>
</html>