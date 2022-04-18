<?php
require "testmodel.php";
$db = new DB(); //read the testmode1.php function with DB
session_start();

$check1 = 1;
  if(isset($_POST['addcom'])){
    $check1 == 0;
    $sqlinsert = "INSERT INTO Comment (Pname, com) VALUES (:Pname, :com)";
    $result = $db->insert($sqlinsert, [
 ":Pname"=>$_GET['data'],
 ":com"=>$_POST["usersetcom"],
 ]);
  }
if($check1 == 1){
$_SESSION["buyitem1"] =  $_GET['data'];
}
 $sql = "SELECT * FROM Item where Name = (:name)"; //here is the sql function

  $data = $db -> select($sql,[
		":name" =>$_SESSION["buyitem1"]
		]);
  foreach($data as $v){
	$itemname = trim($v['Name']);
    $price = trim($v['Price']);
    $_SESSION["buyitem"] = $itemname;
    $_SESSION["buyprice"] = $price;
	$Img = trim($v['Img']);
	echo "{$v['Name']}<br>
		<img height='200' width='200' align='center' src='$Img'/><br>
		Price: {$v['Price']}<br>
		Item_info: {$v['Item_info']}<br>
		";
  
echo "<form method='POST' action='buyitem.php'> <!--  will switch to the testconroller.php file     -->
            <label>how many you want to buy: </label>
            <input type='text' name='count'>
		<p align= 'center' ><button type='submit' name='buy'>add to shopping car</button>  <!-- have two button and let the user chose-->  
  </form>";
  
    }

 $sqlcom = "SELECT com FROM Comment where Pname = (:name)"; //here is the sql function

  $data = $db -> select($sqlcom,[
		":name" =>$_GET['data'],
		]);
foreach($data as $v){
	$usercom = trim($v['com']);
	echo "comment: $usercom<br>
		";
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
    <title>item shopping</title>
</head>

<body>

<form method="POST" action="shopping.php"> 
<h2>add your comment</h2>
  <table>
    <tr>
  <div>
           <th> <label for="pwd">comment: </label> </th>
            <th><input style="width:200px; height:200px;" type="text" class="word" class="form-control" name="usersetcom"></th>
        </div>
     </tr>
    <tr>
    <div>
		<th><p align= "center" ><button type="submit" class="btn btn-primary" name="addcom">submite</button> </p></th>
	</div>
      </tr>
  </table>
  </form>
</body>
</html>



