<?php
include_once ('../config/config.php');
$connect = new Connect();
$query = 'SELECT * FROM province ORDER BY provinceName';
$queryCourse= 'SELECT * FROM targetcourse ORDER BY targetcourse';
$queryReligion = 'SELECT * FROM Religion ORDER BY religion';
$queryNationality= 'SELECT * FROM Nationality ORDER BY Nationality';
$queryRelationship= 'SELECT * FROM Relationship ORDER BY Relationship';
$resultsReligion= $connect->select($queryReligion);
$resultsNationality=$connect->select($queryNationality);
$results = $connect -> select($query);
$resultsCourse= $connect -> select($queryCourse);
$resultsRelationship= $connect -> select($queryRelationship);
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
	<link rel="icon" type="image/png" href="assets/img/favicon.png" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>CREOTEC - Enrolment</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
	<meta name="viewport" content="width=device-width" />
	<!-- Canonical SEO -->
	<!-- Bootstrap core CSS     -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<!--  Material Dashboard CSS    -->
	<link href="assets/css/material-dashboard.css?v=1.2.1" rel="stylesheet" />
	<!--  CSS for Demo Purpose, don't include it in your project     -->
	<link href="assets/css/demo.css" rel="stylesheet" />
	<!--     Fonts and icons     -->
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-default navbar-absolute">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
	

					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#"><img src="assets/img/creotec.png" style="height: 40px; padding-top: 10px;"/></a>
			</div>

			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li class="active">
						<a href="enrolment.php">
							<i class="material-icons">home</i> Home
						</a>
					</li>
				</ul>
			</div>
		</div>
	</nav>

	<div class="wrapper wrapper-full-page">
		<div class="full-page login-page" filter-color="black" data-image="assets/img/login.jpeg">
			<div class="content">
				<div class="container">
					<div class="row">
							<div class="col-sm-10 col-sm-offset-1">
								<!--      Wizard container        -->
								<div class="wizard-container">
									<div class="card wizard-card" data-color="blue" id="wizardProfile">
										<form action="enrollmentFunction.php" method="POST" enctype="multipart/form-data">
											<!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
											<div class="wizard-header">
												<h3 class="wizard-title">
													Application Form
												</h3>
												<h5>This information will let us know more about you.</h5>
											</div>

											<div class="wizard-navigation">
												<ul>
													<li >
														<a href="#schoolcode" id="schoolcode1" data-toggle="tab" >School Code</a>
													</li>
													<li >
														<a href="#generalinfo" id="generalinfo1" data-toggle="tab" >General Information</a>
													</li>
													<li >
														<a href="#personalinfo" id="personalinfo1" data-toggle="tab" >Personal Information</a>     
													</li>
													<li >
														<a href="#guardian" id="guardian1" data-toggle="tab" >Guardian</a>
													</li>
												</ul>
											</div>

											<div class="tab-content">
												<div class="tab-pane" id="schoolcode">
													<div class="row">
														<h4 class="info-text">Enter your Batch Code</h4>
														<div class="col-md-6 col-md-offset-3">
															<div class="input-group">
																<span class="input-group-addon">
																	<!-- <i class="material-icons">school</i> -->
																</span>
																<div class="form-group label-floating">
																	<label class="control-label">Batch Code
																	</label>
																	<input name="batchcode" id="batchcode" onkeyup="getBatchCode(this.value)" type="text" required class="form-control">
																</div>
																<div>
																	<label id="batchcodeMessage"></label>
																</div>
															</div>
														</div>

													</div>

													<br/>
													<br/>
												</div>
											
												<div class="tab-pane" id="generalinfo">
													<div class="row">
														<h4 class="info-text"> General Information</h4>
														<div class="col-md-4 col-md-offset-4">
														   <div class="picture-container">
																<div class="picture">
																	<img src="../../assets/img/default-avatar.png" class="picture-src" id="wizardPicturePreview" />
																	<input type="file" id="wizard-picture" name="wizard-picture" accept="image/*">
																</div>
																<h6>Upload Picture</h6>
															</div>
														</div>
													</div>

													<div class="row">
														<h4 class="info-text"> Name</h4>
														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Last Name
																		<small>(required)</small>
																	</label>
																	<input id="txtLastName" onkeyup="validname(this)"  name="txtLastName" type="text" class="form-control">
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> First Name
																		<small>(required)</small>
																	</label>
																	<input id="txtFirstName" onkeyup="validname(this)" name="txtFirstName" type="text" class="form-control">
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Middle Name
																		<small></small>
																	</label>
																	<input id="txtMiddleName" onkeyup="validname(this)" name="txtMiddleName" type="text" class="form-control">
																</div>
															</div>
														</div>
													</div>
													<div class="row">
														<h4 class="info-text"> Address</h4>
														
														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Province
																		<small>(required)</small>
																	</label>
																	<select id="dropdownProvince" name="dropdownProvince" class="form-control" data-style="btn btn-info btn-round"  data-size="12" 
																	onchange="getCity(this)">
																		<option selected>Choose Province</option>
																		<?php
																			foreach($results as $result){

																		?>
																		<option  value='<?php echo $result["idProvince"];?>'><?php echo $result["provinceName"];?></option>

																		<?php
																			}
																		?>
																	</select>
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> City / Municipality
																		<small>(required)</small>
																	</label>
																	<select id="dropdownCity" class="form-control" name="dropdownCity" data-style="btn btn-info btn-round"  data-size="12">
																		<option selected>Choose City / Municipality</option> 
																	</select>
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Barangay
																		<small>(required)</small>
																	</label>
																	<input id="txtBarangay" name="txtBarangay" onkeyup="validadd(this)" type="text" class="form-control">
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Subdivision / Village
																		<small></small>
																	</label>
																	<input id="txtSubdivision" name="txtSubdivision" onkeyup="validadd(this)"  type="text"  class="form-control">
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> House No. / Building No. / St. / Block / Lot 
																		<small></small>
																	</label>
																	<input id="txtSubdivisionBlock" name="txtSubdivisionBlock"  onkeyup="validadd(this)" type="text" class="form-control">
																</div>
															</div>
														</div>
													</div>

													<div class="row">
														<h4 class="info-text"> School</h4>
														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> School Name
																		<small></small>
																	</label>
																	<select id="txtSchoolName" name="txtSchoolName" type="text" class="form-control">
																		<option selected>Choose School</option>
																		<?php
																		foreach($resultsSchool as $resultSchool){
																		?>
																		<option value="<?php echo $resultSchool["idSchool"];?>"><?php echo $resultSchool['schoolName'];?></option>
																		<?php }?>
																	</select>
																</div>
															</div>
														</div>
													</div>

													<div class="row">
														<h4 class="info-text"> Strand</h4>
														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Strand
																		<small></small>
																	</label>
																	<select id="dropdownStrand" name="dropdownStrand" class="form-control" data-style="btn btn-info btn-round" data-size="12">
																		<option selected>Choose Strand</option>
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
														</div>
													</div>
													
													<div class="row">
														<h4 class="info-text"> Target Course</h4>
														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Target Course
																		<small></small>
																	</label>
																	<select id="dropdownTargetCourse" name="dropdownTargetCourse" class="form-control" data-style="btn btn-info btn-round" data-size="12">
																		<option selected>Choose Target Course</option>
																	<?php foreach($resultsCourse as $result){ ?>
																		<option value="<?php echo $result['idtargetcourse'];?>"><?php echo $result['targetCourse'];?></option>
																		<?php } ?>
																	</select>
																</div>
															</div>
														</div>
													</div>
													
													
												</div>

												<!--Personal INFO-->
												<div class="tab-pane" id="personalinfo">
												
													<div class="row">
														<h4 class="info-text">Birthday</h4>
														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																   <!--  <label class="control-label"> Last Name
																		<small>(required)</small>
																	</label> -->
																	 <input type="date" name="bdate" id="bdate" class="form-control datepicker" value="10/10/2016" />
																</div>
															</div>
														</div>
													</div>

													<div class="row">
														<h4 class="info-text">Gender</h4>
														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group text-center">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<div class="radio">
																		<label>
																			<input type="radio" name="optionsRadios" value ="1"> Male
																		</label>
																		<label>
																			<input type="radio" name="optionsRadios" value="2"> Female
																		</label>
																	</div>
																</div>
															</div>
														</div>
													</div>
	   
													<div class="row">
														<h4 class="info-text"> Contacts</h4>
														  <div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Contact Number 09xx-xxx-xxx
																		<small>(required)</small>
																	</label>
																	<input id="contactNumber" name="contactNumber" class="form-control"  required onkeyup="
                                  var phonenum = this.value;
                                  if (phonenum.charAt(0)!='0'){
                                    this.value ='';
                                  }
                                  if (phonenum.length == 2) 
                                  {
                                      if (phonenum != '09'){
                                        this.value ='0';
                                      }
                                  }
                                  if (phonenum.match(/^\d{4}$/) !== null) {
                                     this.value = phonenum + '-';
                                  } else if (phonenum.match(/^\d{4}\-\d{3}$/) !== null) {
                                     this.value = phonenum + '-';
                                  }; validnum(this);"   type="text" pattern=".{13,}" title="Please enter a valid mobile number in this format (09xx-xxx-xxx)." maxlength="13">
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> E-mail Address
																		<small></small>
																	</label>
																	<input id="emailAddress" onkeyup="validemail(this)" name="emailAddress" type="email" class="form-control">
																</div>
															</div>
														</div>
													</div>  
													<div class="row">
														<h4 class="info-text">Religion</h4>
														  <div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Religion
																		<small>(required)</small>
																	</label>
																	<select id="dropdownReligion" name="dropdownReligion" class="form-control" data-style="btn btn-info btn-round" data-size="12">
																		<option selected>Choose Religion</option>
																		<?php foreach($resultsReligion as $result) {?>
																		<option value="<?php echo $result['idreligion'];?>"><?php echo $result['religion'];?></option>
																		<?php }?>
																		</select>
																</div>
															</div>
														</div>
													</div> 
													<div class="row">
														<h4 class="info-text">Nationality</h4>
														  <div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Nationality
																		<small>(required)</small>
																	</label>
																	<select id="dropdownNationality" name="dropdownNationality" class="form-control" data-style="btn btn-info btn-round" data-size="12">
																		<option selected>Choose Nationality</option>
																		<?php foreach($resultsNationality as $result){?>
																		<option value="<?php echo $result['idnationality'];?>">
																			<?php echo $result['nationality']?>
																		</option>
																		<?php }?>
																	</select>
																</div>
															</div>
														</div>
													</div>     
											</div>

										   
										
											   <div class="tab-pane" id="guardian">
												
													<div class="row">
														<h4 class="info-text">Guardian's Name</h4>
														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Last Name
																		<small>(required)</small>
																	</label>
																	<input id="txtGlastName" onkeyup="validname(this)" name="txtGlastName" type="text" class="form-control">
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> First Name
																		<small>(required)</small>
																	</label>
																	<input id="txtGfirstName" name="txtGfirstName" onkeyup="validname(this)" type="text" class="form-control">
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Middle Name
																		<small></small>
																	</label>
																	<input id="txtGmiddleName" name="txtGmiddleName" onkeyup="validname(this)" type="text" class="form-control">
																</div>
															</div>
														</div>
													</div>

													<div class="row">
														<h4 class="info-text">Personal Information</h4>
														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Relationship
																		<small>(required)</small>
																	</label>
																	<select id="dropdownRelationship" name="dropdownRelationship" class="form-control" data-style="btn btn-info btn-round" data-size="12">
																		<option selected>Choose Relationship</option>
																		</option>
																		<?php foreach($resultsRelationship as $result){?>
																		<option value="<?php echo $result['idrelationship'];?>">
																			<?php echo $result['relationship']?>
																		</option>
																		<?php }?>
																	</select>
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Contact Number 09xx-xxx-xxx
																		<small>(required)</small>
																	</label>
																	<input id="gContactNumber" name="gContactNumber" class="form-control"
																	 required onkeyup="
                                  var phonenum = this.value;
                                  if (phonenum.charAt(0)!='0'){
                                    this.value ='';
                                  }
                                  if (phonenum.length == 2) 
                                  {
                                      if (phonenum != '09'){
                                        this.value ='0';
                                      }
                                  }
                                  if (phonenum.match(/^\d{4}$/) !== null) {
                                     this.value = phonenum + '-';
                                  } else if (phonenum.match(/^\d{4}\-\d{3}$/) !== null) {
                                     this.value = phonenum + '-';
                                  }; validnum(this);"   type="text" pattern=".{13,}" title="Please enter a valid mobile number in this format (09xx-xxx-xxx)." maxlength="13">
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> E-mail Address
																		<small></small>
																	</label>
																	<input id="txtGemailAddress" name="txtGemailAddress" onkeyup="validemail(this)" type="email" class="form-control">
																</div>
															</div>
														</div>
													</div>

													<div class="row">
														<h4 class="info-text"> Address</h4>
														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Province
																		<small>(required)</small>
																	</label>
																	<select id="dropdownGprovince" name="dropdownGprovince" class="form-control" data-style="btn btn-info btn-round"  data-size="12" 
																	onchange="getCity1(this.value)">
																		<option selected>Choose Province</option>
																		<?php
																			foreach($results as $result){

																		?>
																		<option  value='<?php echo $result["idProvince"];?>'><?php echo $result["provinceName"];?></option>

																		<?php
																			}
																		?>
																	</select>
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> City / Municipality
																		<small>(required)</small>
																	</label>
																	<select id="dropdownCity1" class="form-control" name="dropdownCity1" data-style="btn btn-info btn-round"  data-size="12">
																		<option selected>Choose City / Municipality</option> 
																	</select>
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Barangay
																		<small>(required)</small>
																	</label>
																	<input id="txtBarangay" onkeyup="validadd(this)" name="txtGbarangay" type="text" class="form-control">
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> Subdivision / Village
																		<small></small>
																	</label>
																	<input id="txtGsubdivision" name="txtGsubdivision" onkeyup="validadd(this)" type="text" class="form-control">
																</div>
															</div>
														</div>

														<div class="col-md-6 col-md-offset-3">
														   <div class="input-group">
																<span class="input-group-addon">
																	<i class="material-icons"></i>
																</span>
																<div class="form-group label-floating">
																	<label class="control-label"> House No. / Building No. / St. / Block / Lot 
																		<small></small>
																	</label>
																	<input id="txtGsubdivisionBlock" name="txtGsubdivisionBlock" onkeyup="validadd(this)" type="text"  class="form-control">
																</div>
															</div>
														</div>

														
													</div>
												</div>

											<div class="wizard-footer">
														<div class="pull-right">
															<input type='button' class='btn btn-next btn-fill btn-info btn-wd' name='next' id="nextBtn" value='Next' disabled="true" />
															<input type='submit' class='btn btn-finish btn-fill btn-info btn-wd' name='finish' value='Submit'/>
														</div>
														<div class="pull-left">
															<input type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
														</div>
														<div class="clearfix"></div>
											</div>

											</div> </form>

											
										</div> 
									</div>
								</div>
								<!-- wizard container -->
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>
<!--   Core JS Files   -->
<script src="assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="assets/js/material.min.js" type="text/javascript"></script>
<script src="assets/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
<!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
<!-- Library for adding dinamically elements -->
<script src="assets/js/arrive.min.js" type="text/javascript"></script>
<!-- Forms Validations Plugin -->
<script src="assets/js/jquery.validate.min.js"></script>
<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="assets/js/moment.min.js"></script>
<!--  Charts Plugin, full documentation here: https://gionkunz.github.io/chartist-js/ -->
<script src="assets/js/chartist.min.js"></script>
<!--  Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="assets/js/jquery.bootstrap-wizard.js"></script>
<!--  Notifications Plugin, full documentation here: http://bootstrap-notify.remabledesigns.com/    -->
<script src="assets/js/bootstrap-notify.js"></script>
<!--   Sharrre Library    -->
<script src="assets/js/jquery.sharrre.js"></script>
<!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
<script src="assets/js/bootstrap-datetimepicker.js"></script>
<!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
<script src="assets/js/jquery-jvectormap.js"></script>
<!-- Sliders Plugin, full documentation here: https://refreshless.com/nouislider/ -->
<script src="assets/js/nouislider.min.js"></script>
<!--  Google Maps Plugin    -->
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD1_8C5Xz9RpEeJSaJ3E_DeBv8i7j_p6Aw"></script>
<!--  Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="assets/js/jquery.select-bootstrap.js"></script>
<!--  DataTables.net Plugin, full documentation here: https://datatables.net/    -->
<script src="assets/js/jquery.datatables.js"></script>
<!-- Sweet Alert 2 plugin, full documentation here: https://limonte.github.io/sweetalert2/ -->
<script src="assets/js/sweetalert2.js"></script>
<!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="assets/js/jasny-bootstrap.min.js"></script>
<!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
<script src="assets/js/fullcalendar.min.js"></script>
<!-- Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="assets/js/jquery.tagsinput.js"></script>
<!-- Material Dashboard javascript methods -->
<script src="assets/js/material-dashboard.js?v=1.2.1"></script>
<!-- Material Dashboard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script src="assets/js/validation.js"></script>

<script type="text/javascript">
	$(document).ready(function() {
		demo.initMaterialWizard();
		setTimeout(function() {
			$('.card.wizard-card').addClass('active');
		}, 600);
	});

	function erroralert() {
		swal({
			title: 'Invalid!',
			text: 'Redirecting page...',
			type: 'error'
		});
	}

	$(document).ready(function() {
		md.initSliders()
		demo.initFormExtendedDatetimepickers();
	});
	
	function getCity(val){
		$.ajax({
			type: "POST",
			url: "getCity.php",
			data: 'idProvince=' + val,
			success: function(data){
				$("#dropdownCity").html(data);
			}
		});
	}
	function getCity1(val){
		$.ajax({
			type: "POST",
			url: "getCity.php",
			data: 'idProvince=' + val,
			success: function(data){
				$("#dropdownCity1").html(data);
			}
		});
	}

	function getBatchCode(val){
		var result = new Array();
		$.ajax({
			type: "POST",
			url: "searchBatchCode.php",
			data: 'batchcode=' + val,
			dataType:"json",
			success: function(data){
					result = data;
					$("#batchcodeMessage").prop('style','color:black;');
					if(result[1] == 0){
						$("#batchcodeMessage").html(result[0]);
		                $("#nextBtn").prop('disabled', true);
		                $("#generalinfo1").prop('disabled', true);
		                $("#personalinfo1").prop('disabled', true);
		                $("#guardian1").prop('disabled', true);
					}
					else{
						$("#batchcodeMessage").html(result[0] + result[1]);
		                $("#nextBtn").prop('disabled', false);
		                $("#generalinfo1").prop('disabled', false);
		                $("#personalinfo1").prop('disabled', false);
		                $("#guardian1").prop('disabled', false);
						getSchool(val);
						getStrand(val);
					}	
				
			},
			error: function(data){
				$("#batchcodeMessage").html('');
				$("#nextBtn").prop('disabled', true);
				$("#generalinfo1").prop('disabled', true);
				$("#personalinfo1").prop('disabled', true);
		        $("#guardian1").prop('disabled', true);
			}
		});
	}
	function getSchool(val){
		$.ajax({
			type: "POST",
			url: "getSchool.php",
			data: 'batchcode=' + val,
			success: function(data){
				$("#txtSchoolName").html(data);
			}
		});
	}
	function getStrand(val){
		$.ajax({
			type: "POST",
			url: "getStrand.php",
			data: 'batchcode=' + val,
			success: function(data){
				$("#dropdownStrand").html(data);
			}
		});
	}
</script>

</html>