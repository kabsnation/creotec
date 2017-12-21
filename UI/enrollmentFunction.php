<?php
require_once('../config/config.php');
require_once('../UI/pdfmaker.php');
$connect = new Connect();
$con = $connect-> connectDB();
$pdfmaker = new pdfMaker();
$target_dir = "images/";
$target_file = $target_dir . basename($_FILES["wizard-picture"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
if(isset($_POST["batchcode"])){

	//applicant
	$batchcode = mysqli_real_escape_string($con,stripcslashes(trim($_POST["batchcode"])));
	$lastName = mysqli_real_escape_string($con,stripcslashes(trim($_POST ["txtLastName"])));
	$firstName = mysqli_real_escape_string($con,stripcslashes(trim($_POST["txtFirstName"])));
	$middleName = mysqli_real_escape_string($con,stripcslashes(trim($_POST["txtMiddleName"])));
	$province = mysqli_real_escape_string($con,stripcslashes($_POST["dropdownProvince"]));
	$city = mysqli_real_escape_string($con,stripcslashes($_POST["dropdownCity"]));
	$barangay = mysqli_real_escape_string($con,stripcslashes(trim($_POST["txtBarangay"])));
	$subdivision =mysqli_real_escape_string($con,stripcslashes(trim($_POST["txtSubdivision"])));
	$houseNo = mysqli_real_escape_string($con,stripcslashes(trim($_POST["txtSubdivisionBlock"])));
	$school = mysqli_real_escape_string($con,stripcslashes($_POST["txtSchoolName"]));
	$strand = mysqli_real_escape_string($con,stripcslashes($_POST["dropdownStrand"]));
	$bdate = mysqli_real_escape_string($con,stripcslashes($_POST["anytime-month-numeric"]));
	$gender = mysqli_real_escape_string($con,stripcslashes($_POST["dropdownSex"]));
	$contactNumber = mysqli_real_escape_string($con,stripcslashes($_POST["contactNumber"]));
	$emailAddress = mysqli_real_escape_string($con,stripcslashes($_POST["emailAddress"]));
	$religion = mysqli_real_escape_string($con,stripcslashes($_POST["dropdownReligion"]));
	$targetCourse = mysqli_real_escape_string($con,stripcslashes($_POST["dropdownTargetCourse"]));
	$nationaility= mysqli_real_escape_string($con,stripcslashes($_POST["dropdownNationality"]));

	//Guardian
	$gLastName = mysqli_real_escape_string($con,stripcslashes(trim($_POST["txtGlastName"])));
	$gFirstName = mysqli_real_escape_string($con,stripcslashes(trim($_POST["txtGfirstName"])));
	$gMiddleName = mysqli_real_escape_string($con,stripcslashes(trim($_POST["txtGmiddleName"])));
	$guardianName = $gFirstName." ".$middleName." ".$lastName;
	$relationship = mysqli_real_escape_string($con,stripcslashes($_POST["dropdownRelationship"]));
	$gContactNumber = mysqli_real_escape_string($con,stripcslashes($_POST["gContactNumber"]));
	$gEmailAddress = mysqli_real_escape_string($con,stripcslashes($_POST["txtGemailAddress"]));
	$gProvince = mysqli_real_escape_string($con,stripcslashes($_POST["dropdownGprovince"]));
	$gCity = mysqli_real_escape_string($con,stripcslashes($_POST["dropdownCity1"]));
	$gBarangay = mysqli_real_escape_string($con,stripcslashes(trim($_POST["txtGbarangay"])));
	$gSubdivision = mysqli_real_escape_string($con,stripcslashes(trim($_POST["txtGsubdivision"])));
	$gHouseNo = mysqli_real_escape_string($con,stripcslashes(trim($_POST["txtGsubdivisionBlock"])));
	$homeAddress = "";
	$gHomeAddress = "";
	
	if($subdivision =="" || $subdivision == " " && $gSubdivision ==""|| $gSubdivision== " "){
		$homeAddress = $houseNo.", ".$barangay;
		$gHomeAddress = $gHouseNo.", ".$gBarangay;
	}
	else{
		$homeAddress = $houseNo.", ".$subdivision.", ".$barangay;
		$gHomeAddress = $gHouseNo.", ".$gSubdivision.", ".$barangay;
	}
	//upload img
	$uploadOk=0;
	$doneUpload=0;
 	$check = getimagesize($_FILES["wizard-picture"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
    if ($_FILES["wizard-picture"]["size"] > 500000) {
    	$uploadOk = 0;
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
	&& $imageFileType != "gif" ) {
	    echo '<script type="text/javascript">
					alert("The uploaded file doesn\'t seem to be an image.!");
					</script>';
	    $uploadOk = 0;
	}
	
   		 if (move_uploaded_file($_FILES["wizard-picture"]["tmp_name"], $target_file)) {
   		 	$doneUpload=1;
    	} 
    	else {
       		 $doneUpload=0;
    	}
	if($doneUpload ==1){
		$query = "INSERT INTO `accountinformation`(`firstName`, `middleName`, `lastName`, `contactNumber`, `emailAddress`, `homeAddress`, `birthDate`, `idCity`, `idnationality`, `idreligion`, `gName`, `idrelationship`, `gAddress`, `gContactNumber`, `gEmailAddress`, `idGender`)  VALUES('".$firstName."','".$middleName."','".$lastName."','".$contactNumber."','".$emailAddress."','".$homeAddress."','".$bdate."',".$city.",".$nationaility.",".$religion.",'".$guardianName."','".$relationship."','".$gHomeAddress."','".$gContactNumber."','".$gEmailAddress."',".$gender.")";
		$result = $connect -> insertWithLastId($query);

		if($result!=""){
			$query="INSERT INTO `applicants`(`idtargetcourse`, `idAccountInformation`, `idStrand`, `idbatch`,picture,idSchool) VALUES('".$targetCourse."',".$result.",".$strand.",(SELECT idbatch FROM batch WHERE batchCode = '".$batchcode."'),'".$target_file."',".$school.")";
			$result = $connect -> insert($query);
			
			if($result){
				$query = "SELECT idbatch FROM batch WHERE batchCode='".$batchcode."'";
				$batchNumber = $connect->select($query);
				foreach($batchNumber as $number){
					$pdfmaker->registrationForm($lastName.", ".$firstName." ".$middleName,$number['idbatch'],$strand,$school,$target_file);
				}
				// echo '<script type="text/javascript">
				// 	window.location = "print.php?file=1";
				// 	alert("Success! Downloading the file.");
				// 	window.location = "index.php";
				// 	</script>';
			}
			else{
				echo '<script type="text/javascript">
					window.location = "enrollment.php";
					alert("Error!");
					</script>';
			}
		}
	}
	
}
else
	echo '<script type="text/javascript">
					window.location = "index.php";
					alert("No batch code!");
					</script>';
?>