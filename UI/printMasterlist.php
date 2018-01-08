<?php
require_once('../UI/pdfmaker.php');
require_once('../config/config.php');
$con = new Connect();
$pdfmaker = new pdfMaker();
if(isset($_POST['batch'])){
	$batchNumber = $_POST['batch'];
	$strand = $_POST['strand'];
	$center = $_POST['center'];
	$query = "SELECT strand FROM strand WHERE idStrand =".$strand;
	$resultStrand = $con->select($query);
	$rowStrand = mysqli_fetch_array($resultStrand,MYSQLI_NUM);
	$query = "SELECT centerName FROM center WHERE idCenter=".$center;
	$resultCenter =$con->select($query);
	$rowCenter = mysqli_fetch_array($resultCenter,MYSQLI_NUM);
	$query = "SELECT schoolName,count(*) as count FROM  applicants, batch, school,center
	where  applicants.idBatch=batch.idBatch and applicants.idSchool=school.idSchool and center.idCenter = batch.idCenter and center.idCenter =".$center." AND applicants.idStrand =  ".$strand." AND batch.idbatch= ".$batchNumber." GROUP BY schoolName";
	$resultSchool = $con->select($query);
	$arrs = array();
	foreach ($resultSchool as $school) {
		$counter = 0;
		$query="SET @row_number =0;";
		$query1 = "SELECT @row_number:=@row_number+1 as number,idapplicant,CONCAT(firstName,' ',middleName,' ',LastName) as name, genderName, acronym,schoolName FROM accountinformation, applicants, batch,gender,targetcourse, school, strand,center where applicants.idAccountInformation=accountinformation.idAccountInformation  
		and applicants.idStrand=strand.idStrand and applicants.idBatch=batch.idBatch 
		and applicants.idtargetcourse=targetcourse.idtargetcourse 
		and applicants.idSchool=school.idSchool and gender.idGender = accountinformation.idGender and center.idCenter = batch.idCenter and batch.idbatch= ".$batchNumber." and applicants.idStrand = ".$strand." and center.idCenter = ".$center." and school.schoolName='".$school['schoolName']."'";
		$result = $con->multiSelect($query,$query1);
		while($row = mysqli_fetch_array($result,MYSQLI_NUM)){
				for($i=0;$i<5;$i++){
				 	$arrs[$counter] =$row[$i];
				 	$counter++;				
				 }
		}
		$arr2[0] = $batchNumber;
		$arr2[1]=$rowStrand[0];
		$arr2[3]=$school['count'];
		$pdfmaker->AddPage();
		$pdfmaker->FancyTable($arrs,$school['schoolName'],$arr2,$rowCenter[0]);

	}
	$pdfmaker->Output();

	// $arrsName = array($_POST['name']);
	// $arrsSchool = array($_POST['schoolName']);
	// $arrsGender = array($_POST['gender']);
	// $arrsCourse = array($_POST['course']);
	// $school= array();
	// $rowPerSchool = array();
	// $rowCounter =0;
	// $temp="";
	// //checking of number of school
	// for($i=0;$i<sizeof($_POST['schoolName']);$i++){
	// 	if($temp != $_POST['schoolName'][$i]){
	// 		$temp = $_POST['schoolName'][$i];
	// 		$school[$i] = $_POST['schoolName'][$i];
	// 	}
	// }
	// //checking row per school
	// for($i=0;$i<sizeof($school);$i++){
	// 	for($a=0;$a<sizeof($_POST['schoolName']);$a++){
	// 		if($school[$i]==$_POST['schoolName'][$a]){
	// 			$rowCounter++;
	// 		}
	// 	}
	// 	$rowPerSchool[$i]=$rowCounter;
	// 	$rowCounter=0;
	// }
	// $arrsGender = array($_POST['gender']);
	// $arrsCourse = array($_POST['course']);
	// $arrsIn = array(1,2,3,4,5);
	// $arrsOut = array(1,2,3,4,5);
	// $remarks = array('P','P','P','P','P');

	// $pdfmaker->masterList($batchNumber,$strand,sizeof($_POST['name']),$school,$rowPerSchool,$center,$_POST['id']);
}
?>