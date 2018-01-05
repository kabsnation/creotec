<?php
require_once('../config/config.php');
require_once('../UI/pdfmaker.php');
$connect = new Connect();
$con = $connect-> connectDB();
$pdfmaker = new pdfMaker();
if(isset($_GET['id']) && isset($_GET['batchCode'])){
	$id = mysqli_real_escape_string($con,stripcslashes(trim($_GET['id'])));
	$batchcode = mysqli_real_escape_string($con,stripcslashes(trim($_GET['batchCode'])));
	$query ="SELECT idapplicant,school.idSchool,picture,firstName,middleName,lastName,birthDate,genderName,nationality,religion,contactNumber,cityName,homeAddress,provinceName,emailAddress,gAddress,schoolName,strand,targetCourse,gName,relationship, gContactNumber, gEmailAddress FROM applicants JOIN accountinformation as ai ON ai.idAccountInformation = applicants.idAccountInformation JOIN strand on strand.idStrand = applicants.idStrand JOIN targetcourse ON targetcourse.idtargetcourse = applicants.idtargetcourse JOIN school ON school.idSchool = applicants.idSchool JOIN city ON city.idCity = ai.idCity JOIN province ON province.idProvince = city.idProvince JOIN gender on ai.idGender = gender.idGender JOIN nationality ON ai.idnationality = nationality.idnationality JOIN religion ON ai.idreligion = religion.idreligion JOIN relationship ON ai.idrelationship = relationship.idrelationship where applicants.idapplicant =".$id;
	$result = $connect->select($query);
	if($result){
		if(isset($_GET['pdf'])){
			if($_GET['pdf']=='true'){
				foreach($result as $info){
						$query = "SELECT idbatch FROM batch WHERE batchCode='".$batchcode."'";
						$batchNumber = $connect->select($query);
						$query = "SELECT schoolName from school WHERE idSchool =".$info['idSchool'];
						$schoolName = $connect->select($query);
						$name ="";
						if($row = mysqli_fetch_array($batchNumber)){
							foreach ($schoolName as $name) {
								$name = $name['schoolName'];
							}
						foreach($batchNumber as $number){
							$department = "PRODUCTION";
							if($info['strand']== 'ABM'){
								$department="SUPPORT";
							}
							$pdfmaker->registrationForm(str_pad($id + 1, 5, 0, STR_PAD_LEFT),$info['lastName'].", ".$info['firstName']." ".$info['middleName'],$row[0],$info['strand'],$info['schoolName'],$info['picture'],$department);
						}	
					}
					else{
						echo "<script>window.location='index.php';</script>";
					}
				}
			}
		}
	}
	else{
		echo "<script>window.location='index.php';</script>";
	}
}
else{
		echo "<script>window.location='index.php';</script>";
	}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CREOTEC - Enrollment</title>

	<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">

	<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->
</head>
<body>
	<!-- Main navbar -->
	<div class="navbar navbar-default">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php"><img src="assets/images/logo_light.png" alt=""></a>
		</div>

		<div class="navbar-collapse collapse">
			<div class="navbar-right">
				<ul class="nav navbar-nav">
					<li><a href="index.php" disabled="true"><i class="icon-home"></i><span> <strong>Home</strong></span></a></li>
				</ul>
			</div>
		</div>
		
	</div>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">
					
					<!-- Wizard with validation -->
		            <div class="panel panel-white">
						<div class="panel-heading">
							<div class="text-center">
								<h2 class="panel-title">Application Form</h6>
								
							</div>
						</div>

	                	<form class="form-group" method="POST" enctype="multipart/form-data">
	                		<div class="container">
	                		<div class="row">
	                		<div class="col-md-4">
	                		<legend class="text-semibold col-md-12">Student Information</legend>
	                				<?php if($result){
	                					foreach($result as $info){?>
											<div class="content-group-md col-md-12">
												<label class="control-label">Name: </label>
												<label class="control-label"><strong><?php echo $info['firstName']. ' '. $info['middleName'].' '.$info['lastName'];?></strong></label>
											</div>
											<?php }}?>
										<div class="content-group-md col-md-12">
											<label class="control-label">Birthdate: </label>
											<label class="control-label"><strong><?php echo $info['birthDate'];?></strong></label>
										</div>
									

									<div class="content-group-md col-md-12">
										<label class="control-label">Gender: </label>
										<label class="control-label"><strong><?php echo $info['genderName'];?></strong></label>
										
									</div>
										
									<div class="content-group-md col-md-12">
										<label class="control-label ">Nationality: </label>
										<label class="control-label"><strong><?php echo $info['nationality'];?></strong></label>
									</div>

									<div class="content-group-md col-md-12">
										<label class="control-label">Religion: </label>
										<label class="control-label"><strong><?php echo $info['religion'];?></strong></label>
									</div>

									<div class="content-group-md col-md-12">
										<label class="control-label">Contact Number: </label>
										<label class="control-label"><strong><?php echo $info['contactNumber'];?></strong></label>
										</div>
										<div class="content-group-md col-md-12">
										<label class="control-label">Email Address:</label>
										<label class="control-label"><strong><?php echo $info['emailAddress'];?></strong></label>
										<br />
										</div>

								
								
									<div class="content-group-md col-md-12">
											<label class="control-label ">Province: </label>
											<label class="control-label"><strong><?php echo $info['provinceName'];?></strong></label>
									</div>
										<div class="content-group-md col-md-12">
											<label class="control-label">City / Municipality: </label>
											<label class="control-label"><strong><?php echo $info['provinceName'];?></strong></label>
										</div>
									
										<div class="content-group-md col-md-12">
											<label class="control-label ">Home Address: </label>
											<label class="control-label"><strong><?php echo $info['homeAddress'];?></strong></label>
										</div>
									</div>
									
								
							<div class="col-lg-4">
										
									<div class="col-lg-12"><legend class="text-bold">School</legend></div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">School Name: </label>
											<label class="control-label"><strong><?php echo $info['schoolName'];?></strong></label>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label ">Choose your Strand: </label>
											<label class="control-label"><strong><?php echo $info['strand'];?></strong></label>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Target Course: </label>
											<label class="control-label"><strong><?php echo $info['targetCourse'];?></strong></label>
										</div>
									</div>	
								</div>
									<div class="col-lg-4">

										<legend class="text-semibold col-md-12">Guardian Information</legend>
											<div class="col-md-12">
												<label class="control-label">Name: </label>
												<label class="control-label"><strong><?php echo $info['gName'];?></strong></label>
											</div>
											<div class="col-md-12">
												<label class="control-label ">Relationship: </label>
												<label class="control-label"><strong><?php echo $info['relationship'];?></strong></label>
											</div>
											<div class="col-md-12">
												<label class="control-label ">Contact Number: </label>
												<label class="control-label"><strong><?php echo $info['contactNumber'];?></strong></label>
											</div>	
											<div class="col-md-12">
												<label class="control-label">Email Address:</label>
												<label class="control-label"><strong><?php echo $info['gEmailAddress'];?></strong></label>
											</div>	
										<div class="form-group col-md-12">
											<label class="control-label">Address: </label>
											<label class="control-label"><strong><?php echo $info['gAddress'];?></strong></label>
											
										</div>
										<div class="form-group col-md-12">
											<label class="text-danger" style="margin-top: -10px;">
												DONT FORGET TO PRINT YOUR VOUCHER!
											</label>
											<br>
											<a href="preview.php?id=<?php echo $id;?>&batchCode=<?php echo $batchcode?>&pdf=true">Print Voucher</a>	
										</div>
							</div>

						</form>
		            </div>
		            <!-- /wizard with validation -->

				</div>
				<!-- Content area -->

			</div>
			<!-- /Main content -->

		</div>
		<!-- Page content -->
	</div>
	<!-- Page container -->

</body>

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/forms/wizards/stepy.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/styling/uniform.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/ui/moment/moment.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/daterangepicker.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/anytime.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/picker.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/picker.date.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/picker.time.js"></script>
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/legacy.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/wizard_stepy.js"></script>
	<script type="text/javascript" src="assets/js/pages/picker_date.js"></script>
	<script type="text/javascript" src="assets/js/pages/uploader_bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/plugins/uploaders/fileinput.min.js"></script>
	<!-- /theme JS files -->

	<script src="assets/js/validation.js"></script>

</script>
</html>