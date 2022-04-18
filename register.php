<?php
require "testmodel.php";
$db = new DB(); //read the testmode1.php function with DB

//here is add function
if(isset($_POST['signup'])){//here is from the signup

  $sql = "INSERT INTO Userinfo (Email, Password) VALUES (:Email, :Password)";
  //$temp_ssn => $_POST["ssn"] 
  //$db -> __construct;
  $result = $db->insert($sql, [
 ":Email"=>$_POST["name"],
 ":Password"=>$_POST["pwd"],
 ]);
  if($result >0){
  echo "finish to sign up";
  header('refresh:3; url=index.html');
  }
  else{
    echo "error can not sign up";
	header('refresh:3; url=index.html');
  }
}

?>