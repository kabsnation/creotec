<?php
require_once('../config/config.php');
$connect = new Connect();$query = "INSERT INTO `accountinformation`(`idAccountInformation`, `firstName`, `middleName`, `lastName`, `contactNumber`, `emailAddress`, `homeAddress`, `birthDate`, `idCity`, `nationaility`, `religion`, `gName`, `gRelationship`, `gAddress`, `gContactNumber`, `gEmailAddress`, `idGender`) VALUES(2,a','b','c','09367931842','cpolidan@gmail.com','d','2017-10-13',1,'filipino','e','f','g','h','09','i',1)";
	$result = $connect -> insert($query);
	echo $result;
?>