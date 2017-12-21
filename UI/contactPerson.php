<?php
require("../UI/SchoolHandler.php");
$connect = new Connect();
$con = $connect->connectDB();
$handler = new SchoolHandler();
if(isset($_POST['contactPerson'])){
	//add school
	$schoolName = mysqli_real_escape_string($con,stripcslashes(trim($_POST['schoolName'])));
	$idCity = mysqli_real_escape_string($con,stripcslashes(trim($_POST['city'])));
	$lastId = $handler->addSchool($schoolName,$idCity);
	if($lastId!=""){
		for($i =0; $i <sizeof($_POST['contactPerson']); $i++){
			$contactPerson = mysqli_real_escape_string($con,stripcslashes(trim($_POST['contactPerson'][$i])));
			$designation = mysqli_real_escape_string($con,stripcslashes(trim($_POST['designation'][$i])));
			$contactNumber = mysqli_real_escape_string($con,stripcslashes(trim($_POST['contactNumber'][$i])));
			$telephoneNumber = mysqli_real_escape_string($con,stripcslashes(trim($_POST['telephoneNumber'][$i])));
			$faxNumber = mysqli_real_escape_string($con,stripcslashes(trim($_POST['faxNumber'][$i])));
			$emailAddress = mysqli_real_escape_string($con,stripcslashes(trim($_POST['emailAddress'][$i])));
			$result = $handler->addContactPerson($contactPerson,$designation,$lastId,$emailAddress,$contactNumber,
								$telephoneNumber,$faxNumber);
			if($result){
				echo "<script>
						window.location ='School_AddSchool.php';
						alert('Add school success');
					 </script>";
			}
		}
	
	}
}
?>