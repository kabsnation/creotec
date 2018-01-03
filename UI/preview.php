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
	                				
											<div class="form-group col-md-12">
												<label class="control-label">Name:<span class="text-danger">*</span></label>
												<input id="txtLastName" name="txtLastName" required="required" type="text" class="form-control" onkeyup="validname(this)">
											</div>
										<div class="content-group-md col-md-6">
											<label class="control-label">Birthdate: <span class="text-danger">*</span></label>
											<div class="input-group">
												<span class="input-group-addon"><i class="icon-calendar3"></i></span>
												<input type="text" class="form-control" id="anytime-month-numeric" name="anytime-month-numeric" value="01/01/2018" required="required">
											</div>
										</div>
									

									<div class="content-group-md col-md-6">
										<label class="control-label">Gender: <span class="text-danger">*</span></label>
										<select id="dropdownSex" name="dropdownSex" required="required" class="form-control select  ">
											<option></option>
																		<?php foreach($resultsGender as $result) {?>
																		<option value="<?php echo $result['idGender'];?>"><?php echo $result['genderName'];?></option>
																		<?php }?>
																		</select>
										</select>
									</div>
										
									<div class="content-group-md col-md-6">
										<label class="control-label ">Nationality: <span class="text-danger">*</span></label>
										<select id="dropdownNationality" name="dropdownNationality" required="required" class="form-control select">
											<option></option>
																		<?php foreach($resultsNationality as $result){?>
																		<option value="<?php echo $result['idnationality'];?>">
																			<?php echo $result['nationality']?>
																		</option>
																		<?php }?>
										</select>
									</div>

									<div class="content-group-md col-md-6">
										<label class="control-label">Religion: <span class="text-danger">*</span></label>
										<select id="dropdownReligion" name="dropdownReligion" required="required" class="form-control select">
											<option></option>
																		<?php foreach($resultsReligion as $result) {?>
																		<option value="<?php echo $result['idreligion'];?>"><?php echo $result['religion'];?></option>
																		<?php }?>
																		</select>
										</select>
									</div>

									<div class="content-group-md col-md-6">
										<label class="control-label">Contact Number: <span class="text-danger">*</span></label>
										<input id="contactNumber" name="contactNumber" required="required" class="form-control" data-mask="(+63) 999-999-9999">
										</div>
										<div class="content-group-md col-md-6">
										<label class="control-label">Email Address: <span class="text-danger">*</span></label>
										<input id="emailAddress" name="emailAddress" required="required" class="form-control" type="email">
										<br />
										</div>

								
								
									<div class="form-group col-md-6">
											<label class="control-label col-lg-3">Province:<span class="text-danger">*</span></label>
											<select id="dropdownProvince" name="dropdownProvince" required="required" class="form-control select" onchange="getCity(this.value)">
												<option></option>
												<?php
													foreach($results as $result){
												?>
													<option  value='<?php echo $result["idProvince"];?>'><?php echo $result["provinceName"];?></option>
												<?php
													}
												?>
											</select> 
										</div>

										<div class="form-group col-md-6">
											<label class="control-label">City / Municipality:<span class="text-danger">*</span></label>
											<select id="dropdownCity" name="dropdownCity" required="required" class="form-control select"> 
											</select> 
										</div>
									
										<div class="form-group col-md-6">
											<label class="control-label ">Barangay:<span class="text-danger">*</span></label>
											<input id="txtBarangay" name="txtBarangay" required="required" type="text" class="form-control" onkeyup="validadd(this)">
										</div>
									
								
								
										<div class="form-group col-md-6">
											<label class="control-label">Subdivision / Village:</label>
											<input type="text" class="form-control" id="txtSubdivision" name="txtSubdivision" onkeyup="validadd(this)">
										</div>
									    
									    <div class="form-group col-md-12">
											<label class="control-label ">House No./ Building No./ St./ Block / Lot</label>
											<input type="text" class="form-control" id="txtSubdivisionBlock" name="txtSubdivisionBlock" onkeyup="validadd(this)">
										</div>

									</div>

<div class="col-lg-4">
										
									<div class="col-lg-12"><legend class="text-bold">School</legend></div>
									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">School Name: <span class="text-danger">*</span></label>
											<select id="txtSchoolName" required="required" name="txtSchoolName" class="form-control select">
												<option></option>
																		<?php
																		foreach($resultsSchool as $resultSchool){
																		?>
																		<option value="<?php echo $resultSchool["idSchool"];?>"><?php echo $resultSchool['schoolName'];?></option>
																		<?php }?>
											</select>
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label ">Choose your Strand: <span class="text-danger">*</span></label>
											<select id="dropdownStrand" required="required" name="dropdownStrand" class="form-control select">
												<option></option>
												<?php
												foreach($resultStrand as $strand){
												?>
												<option value='<?php echo $strand["idStrand"];?>'>
													<?php echo $strand["strand"];?>
												</option>
												<?php }?>
											</select> 
										</div>
									</div>

									<div class="col-md-12">
										<div class="form-group">
											<label class="control-label">Target Course: <span class="text-danger">*</span></label>
											<select id="dropdownTargetCourse" name="dropdownTargetCourse" required="required" class="form-control select">
												<option></option>
																	<?php foreach($resultsCourse as $result){ ?>
																		<option value="<?php echo $result['idtargetcourse'];?>"><?php echo $result['targetCourse'];?></option>
																		<?php } ?>
											</select> 
										</div>
									</div>	
									<legend class="text-semibold col-md-12">Guardian Information</legend>
								
									
											<div class="form-group col-md-12">
												<label class="control-label ">Name:</label>
												<input id="txtGmiddleName" name="txtGmiddleName" type="text" class="form-control" onkeyup="validname(this)">
											</div>
										
									
											<div class="form-group col-md-6">
												<label class="control-label ">Relationship: <span class="text-danger">*</span></label>
												<select id="dropdownRelationship" name="dropdownRelationship" required="required" class="form-control select">
													<option></option>
																		
																		<?php foreach($resultsRelationship as $result){?>
																		<option value="<?php echo $result['idrelationship'];?>">
																			<?php echo $result['relationship']?>
																		</option>
																		<?php }?>
												</select>
											</div>
											<div class="form-group col-md-6">
												<label class="control-label ">Contact Number:<span class="text-danger">*</span></label>
												<input id="gContactNumber" name="gContactNumber" required="required" type="text" class="form-control" data-mask="(+63) 999-999-9999">
											</div>	
											<div class="form-group col-md-12">
												<label class="control-label col-md-12">Email Address:</label>
												<input id="txtGemailAddress" name="txtGemailAddress" required="required" type="email" class="form-control">
											</div>	
								</div>
<div class="col-lg-4">
										<legend class="text-bold col-md-12">Address</legend>
										<div class="form-group col-md-12">
											<label class="control-label">Province:<span class="text-danger">*</span></label>
											<select id="dropdownGprovince" name="dropdownGprovince" required="required" class="form-control select" onchange="getCity1(this.value)">
																		<option></option>
																		<?php
																			foreach($results as $result){

																		?>
																		<option  value='<?php echo $result["idProvince"];?>'><?php echo $result["provinceName"];?></option>

																		<?php
																			}
																		?></select> 
										</div>
										<div class="form-group col-md-12">
											<label class="control-label ">City / Municipality:<span class="text-danger">*</span></label>
											<select id="dropdownCity1" name="dropdownCity1" required="required" class="form-control select"></select> 
										</div>
									
										<div class="form-group col-md-12">
											<label class="control-label ">Barangay:<span class="text-danger">*</span></label>
											<input id="txtGbarangay" name="txtGbarangay" type="text" class="form-control" onkeyup="validadd(this)">
										</div>
									
								

										<div class="form-group col-md-12">
											<label class="control-label ">Subdivision / Village:</label>
											<input id="txtGsubdivision" name="txtGsubdivision" type="text" class="form-control" onkeyup="validadd(this)">
										</div>
									
										<div class="form-group col-md-12">
											<label class="control-label ">House No./ Building No./ St./ Block / Lot</label>
											<input id="txtGsubdivisionBlock" name="txtGsubdivisionBlock" type="text" class="form-control" onkeyup="validadd(this)">
										</div>
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