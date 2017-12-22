<?php
require_once("../config/config.php");
$connect = new Connect();
$con = $connect-> connectDB();
if(isset($_POST["idSchool"])&&!empty($_POST["idSchool"]))
{
	$id = $_POST["idSchool"];
	if (isset($_POST["city"])){
		$city = mysqli_real_escape_string($con,stripcslashes(trim($_POST["city"])));
		$sql = "UPDATE school SET idCity='$city' WHERE idSchool='$id'";
		$resultsGender= $connect -> update($sql);	
	}
	if  (isset($_POST["schoolName"])){
		$name = mysqli_real_escape_string($con,stripcslashes(trim($_POST["schoolName"])));
		$sql = "UPDATE school SET schoolName='$name' WHERE idSchool='$id'";
		$resultsGender= $connect -> update($sql);
	}
	if  (isset($_POST["Cname"])){
		$name = mysqli_real_escape_string($con,stripcslashes(trim($_POST["Cname"])));
		$sql = "UPDATE school SET schoolName='$name' WHERE idSchool='$id'";
		$resultsGender= $connect -> update($sql);
	}
}
if(isset($_POST["idContactPerson"])&&!empty($_POST["idContactPerson"]))
{
	$id = $_POST["idContactPerson"];
	if  (isset($_POST["Cname"])){
		$name = mysqli_real_escape_string($con,stripcslashes(trim($_POST["Cname"])));
		$sql = "UPDATE contactpersondetails SET contactName='$name' WHERE idcontactPerson='$id'";
		$resultsGender= $connect -> update($sql);
	}
	if  (isset($_POST["Cdes"])){
		$name = mysqli_real_escape_string($con,stripcslashes(trim($_POST["Cdes"])));
		$sql = "UPDATE contactpersondetails SET designation='$name' WHERE idcontactPerson='$id'";
		$resultsGender= $connect -> update($sql);
	}
	if  (isset($_POST["Ccell"])){
		$name = mysqli_real_escape_string($con,stripcslashes(trim($_POST["Ccell"])));
		$sql = "UPDATE contactpersondetails SET cellphoneNumber='$name' WHERE idcontactPerson='$id'";
		$resultsGender= $connect -> update($sql);
	}
	if  (isset($_POST["Ctele"])){
		$name = mysqli_real_escape_string($con,stripcslashes(trim($_POST["Ctele"])));
		$sql = "UPDATE contactpersondetails SET telephoneNumber='$name' WHERE idcontactPerson='$id'";
		$resultsGender= $connect -> update($sql);
	}
}
?>
	
