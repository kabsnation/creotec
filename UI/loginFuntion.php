<?php
require("../UI/AccountHandler.php");
$handler = new AccountHandler();
$conn = new Connect();
$con=$conn->connectDB();
if(isset($_POST["employeeid"])&&isset($_POST["password"])){
	$employeeID= mysqli_real_escape_string($con,stripcslashes(trim($_POST["employeeid"])));
	$password=mysqli_real_escape_string($con,stripcslashes(trim($_POST["password"])));
	$results=$handler->getAccount($employeeID,$password);
	if(isset($results)){
		echo "<script> window.location='School_AddSchool.php'; alert('Login Failed');</script>";
	}
	else{
		echo "<script> window.location='index.php'; alert('Login Failed');</script>";
		echo $results."asds";
	}
	
}
?>