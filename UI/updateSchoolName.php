<?php
require_once("../config/config.php");
$connect = new Connect();
$con = $connect-> connectDB();
if(!empty($_POST["idSchool"]))
{
	$id = $_POST["idSchool"];
	$name = $_POST["schoolName"];
	$sql = "UPDATE school SET schoolName='$name' WHERE idSchool='$id'";
	$resultsGender= $connect -> update($sql);	
}
?>
	
