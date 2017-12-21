<?php
require("../config/config.php");
class StudentHandler{
	public function getStudents(){
		$con = new Connect();
		$query = "SELECT * FROM Attendance as a 
				  JOIN trainee ON trainee.trainee_id = a.trainee_id 
				  JOIN applicants as ap ON ap.idapplicant = trainee.idapplicant 
				  JOIN accountinformation as af ON af.idAccountInformation = ap.idAccountInformation 
				  JOIN school ON school.idSchool = ap.idSchool JOIN strand ON strand.idStrand = ap.idStrand";
		$result = $con->insert($query);
		return $result;
	}
	public function getStudentsByBatchAndStrand($idbatch,$idstrand){
		$con = new Connect();
		$query = "SELECT firstName, LastName, schoolName, strand, targetCourse, batchCode 
		FROM accountinformation, applicants, batch, targetcourse, school, strand
		where applicants.idAccountInformation=accountinformation.idAccountInformation  
		and applicants.idStrand=strand.idStrand and applicants.idBatch=batch.idBatch 
		and applicants.idtargetcourse=targetcourse.idtargetcourse 
		and applicants.idSchool=school.idSchool and batch.idbatch= ".$idbatch." and applicants.idstrand = ".$idstrand;
		$result = $con->insert($query);
		return $result;
	}
}
?>