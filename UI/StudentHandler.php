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
}
?>