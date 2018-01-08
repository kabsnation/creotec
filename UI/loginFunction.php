<?php
require("../UI/AccountHandler.php");
require("../config/config.php");
$handler = new AccountHandler();
session_start();
$conn = new Connect();
$con =$conn->connectDB();
if(isset($_POST["employeeID"])&&isset($_POST["password"])){
	$employeeID= mysqli_real_escape_string($con,stripcslashes(trim($_POST["employeeID"])));
	$password=mysqli_real_escape_string($con,stripcslashes(trim($_POST["password"])));
	$results=$handler->getAccount($employeeID,$password);
	if(isset($results)){
		if(mysqli_num_rows($results)==1){
			foreach ($results as $result) {
				if($employeeID==$result['userName'] && $password == $result['password']){
					$_SESSION['id'] = $result['idEmployeeAccounts'];
					echo "<script> window.location ='School_AddSchool.php';alert('Login Success');</script>";
				}
			}
		}
		else{
			echo "<script> window.location ='index.php'; alert('Login Failed');</script>";
		}
	}
	else{
		echo "<script> window.location ='index.php'; alert('Login Failed');</script>";
	}
}
?>