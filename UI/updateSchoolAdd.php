<?php
require_once("../config/config.php");
$connect = new Connect();
$con = $connect-> connectDB();
if(!empty($_POST["idSchool"]))
{
	$id = $_POST["idSchool"];
	$city = $_POST["city"];

	$sql = "UPDATE school SET idCity='$city' WHERE idSchool='$id'";
	$resultsGender= $connect -> update($sql);	
}
?>
	
