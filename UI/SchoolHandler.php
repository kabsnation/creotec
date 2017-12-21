<?php
require_once('../config/config.php');
class SchoolHandler{
	public function getSchoolByBatchCode($batchCode){
		$connect = new Connect();
		$con = $connect-> connectDB();
		$batchCode = mysqli_real_escape_string($con,stripcslashes(trim($batchCode)));
		$query = "SELECT s.idSchool,schoolName FROM `school` as s LEFT JOIN school_batch as sb ON sb.idSchool = s.idSchool  LEFT JOIN batch ON batch.idbatch = sb.idbatch WHERE batchCode = '".$batchCode."'";
		$result = $connect -> select($query);
		return $result;
	}
	public function getSchool(){
		$connect = new Connect();
		$query = "SELECT * FROM `school` JOIN city ON school.idCity = city.idCity JOIN province ON city.idProvince = province.idProvince  WHERE markasdeleted = 0 ORDER BY schoolName";
		$result = $connect -> select($query);
		return $result;
	}
	public function getContactPersonBySchoolId($idSchool){
		$connect = new Connect();
		$query ="SELECT * FROM `contactPersonDetails` WHERE idSchool= ".$idSchool;
		$result = $connect->select($query);
		return $result;
	}
	public function addContactPerson($contactName,$designation,$idSchool,$emailAddress,$cellphoneNumber = "",$telephoneNumber= "",
		$faxNumber=""){
		$connect = new Connect();
		$query= "INSERT INTO contactPersonDetails(contactName,designation,cellphoneNumber,telephoneNumber,faxNumber,emailAddress,idSchool)
				 VALUES ('".$contactName."','".$designation."','".$cellphoneNumber."','".$telephoneNumber."','".$faxNumber."','".$emailAddress."',".$idSchool.")";
		$result = $connect-> insert($query);
		return $result;
	}
	public function getContactPersonById($id){
		$connect = new Connect();
		$query ="SELECT * FROM `contactPersonDetails` WHERE idcontactPerson= ".$id;
		$result = $connect->select($query);
		return $result;
	}
	public function addSchool($schoolName,$city){
		$connect = new Connect();
		$query = "INSERT INTO school(schoolName,idCity) VALUES ('".$schoolName."',".$city.")";
		$lastId = $connect->insertWithLastId($query);
		return $lastId;
	}
	public function deleteSchool($idSchool){
		$connect = new Connect();
		$query = "UPDATE school SET markasdeleted = 1 WHERE idSchool=".$idSchool;
		$result = $connect -> delete($query);
		return $result;
	}
	public function getSchoolById($idSchool){
		$connect = new Connect();
		$query="SELECT * FROM school LEFT JOIN city on city.idcity = school.idcity LEFT JOIN province ON province.idprovince = city.idprovince WHERE idSchool=".$idSchool;
		$result = $connect->select($query);
		return $result;
	}
	

}
?>