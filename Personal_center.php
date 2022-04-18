<?php
require "testmodel.php";
$db = new DB(); //read the testmode1.php function with DB
if(isset($_POST['all_click'])){ //read the function if customer connect find all
  $sql = "SELECT Fname, Lname,Ssn, Address, Salary FROM EMPLOYEE"; //here is the sql function
  //$temp_ssn => $_POST["ssn"] 
  //$db -> __construct;
  $data = $db -> select($sql);
  foreach($data as $v){
  echo "Fname: {$v['Fname']}<br> Lname: {$v['Lname']}\n <br>Ssn: {$v['Ssn']}\n <br>Address: {$v['Address']}\n <br>Salary:{$v['Salary']}\n"; //output
    echo "<br>................................<br>";
  }
}

if(isset($_POST['Register'])){ //each button go here
  header('location:register.html');
}

session_start();
 
	// get info
	if (isset($_POST['LoginF'])) {
		$username = trim($_POST['name']);
		$password = trim($_POST['pwd']);
		
		$sql = "SELECT * FROM Userinfo where Email=(:Email) and Password = (:Password)";
		$data = $db -> select($sql,[
		":Email" =>$_POST["name"],
		":Password" =>$_POST["pwd"],
		]);
		echo $data;
      	echo "<br>";
		foreach($data as $v){
		echo "Find exactly： Uid: {$v['Uid']}<br> Email: {$v['Email']}\n <br>Password: {$v['Password']}\n";//output
		echo "<br>................................<br>";
        $sqlEmail = trim($v['Email']);
        $sqlPwd = trim($v['Password']);
          echo "$sqlEmail $sqlPwd";
          echo "<br>";
		}
		
		if (($username == '') || ($password == '')) {
			header('refresh:3; url=index.html');
			echo "the username and password can not be empty";
			exit;
		} elseif (($username != $sqlEmail) || ($password != $sqlPwd)) {
			header('refresh:3; url=index.html');
			echo "username or password have wrong<br> please try again <br> will go back within 3 second";
			exit;
		} elseif (($username = $sqlEmail) && ($password = $sqlPwd)) {
			$_SESSION['username'] = $username;
			$_SESSION['islogin'] = 1;
			// 
			header('location:Personal_center_user.php');
		}
	}

?>