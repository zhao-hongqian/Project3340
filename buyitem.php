<?php
require "testmodel.php";
$db = new DB(); //read the testmode1.php function with DB
session_start();

echo $_SESSION["username"];
echo "<br>";
echo $_SESSION["buyitem"];
echo "<br>";
echo $_SESSION["count"];
echo "<br>";
echo $_SESSION["buyprice"];
echo "<br>";
if(isset($_POST['buy'])){//here is from the buy
  $sql = "INSERT INTO Shoppingcar (Email, item, amount, 
Price) VALUES (:Email, :item, :amount, :Price)";
  //$temp_ssn => $_POST["ssn"] 
  //$db -> __construct;
  $result = $db->insert($sql, [
 ":Email"=>$_SESSION['username'],
 ":item"=>$_SESSION["buyitem"],
 ":amount"=>$_POST["count"],
 ":Price"=>$_SESSION["buyprice"],
 ]);
  unset($_SESSION["buyitem"]);
  unset($_SESSION["buyprice"]);
  echo "$result<br>";
  if($result >0){
  echo "finish to add";
      header('refresh:3; url=Personal_center_user.php');
  }
  else{
    echo "error can not add";
      header('refresh:3; url=Personal_center_user.php');
  }
}

?>