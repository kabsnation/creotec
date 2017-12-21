<?php
include('../UI/SchoolHandler.php');
if(!isset($_GET['id']) && !isset($_GET['idPerson'])){
	echo "<script>window.location='School_ManageAddressBook.php'</script>";
}
else if(isset($_GET['id']) || isset($_GET['idPerson'])){
	$handler = new SchoolHandler();
	$con = new Connect();
	$idPerson= "";
	$id = "";
	$resultContactPerson="";
	$resultSchool = "";
	$resultPerson = "";
	$contactPerson ="";
	$query = "";
	$connect = $con->connectDB();
	if(isset($_GET['id'])){
		$id = mysqli_real_escape_string($connect,stripcslashes(trim($_GET['id'])));
		$query = 'SELECT * FROM province ORDER BY provinceName';
		$provinceResult = $con->select($query);
		$resultContactPerson = $handler->getContactPersonBySchoolId($id);
		$resultSchool = $handler->getSchoolById($id);
		echo "<style type='text/css'>
			    #editPerson{
				 display: none
				}
				#viewSchool{
				 display: block
				}
			 </style>";
	}
	if(isset($_GET['idPerson'])){
		$idPerson =mysqli_real_escape_string($connect,stripcslashes(trim($_GET['idPerson'])));
		$resultPerson = $handler->getContactPersonById($idPerson);
		echo "<style type='text/css'>
			    #editPerson{
				 display: block
				}
				#viewSchool{
				 display: none
				}
			 </style>";
	}
}
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage School Directory</title>
	<link rel="shortcut icon" type="image/x-icon" href="assets/favicon.ico">

		<!-- Global stylesheets -->
	<link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
	<link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
	<link href="assets/css/bootstrap.css" rel="stylesheet" type="text/css">
	<link href="assets/css/core.css" rel="stylesheet" type="text/css">
	<link href="assets/css/components.css" rel="stylesheet" type="text/css">
	<link href="assets/css/colors.css" rel="stylesheet" type="text/css">
	<!-- /global stylesheets -->

	<!-- Core JS files -->
	<script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
	<!-- /core JS files -->

	<!-- Theme JS files -->
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_data_sources.js"></script>
	<script type="text/javascript" src="assets/js/pages/components_modals.js"></script>
	    <script type="text/javascript" src="assets/js/pages/uploader_bootstrap.js"></script>
    <script type="text/javascript" src="assets/js/pages/form_validation.js"></script>
    <script type="text/javascript" src="assets/js/plugins/forms/validation/validate.min.js"></script>
       <script type="text/javascript" src="assets/js/plugins/uploaders/fileinput.min.js"></script>
	<!-- /theme JS files -->
</head>
<style type="text/css">
</style>
<body>
	<!-- Main navbar -->
	<div class="navbar navbar-default">
		<div class="navbar-header">
			<a class="navbar-brand" href="index.php"><img src="assets/images/logo_light.png" alt=""></a>

			<ul class="nav navbar-nav visible-xs-block">
				<li><a class="sidebar-mobile-main-toggle"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>
		</div>

		<div class="navbar-collapse collapse" id="navbar-mobile">
			<ul class="nav navbar-nav">
				<li><a class="sidebar-control sidebar-main-toggle hidden-xs"><i class="icon-paragraph-justify3"></i></a></li>
			</ul>

			<div class="navbar-right">
				<ul class="nav navbar-nav">
					</li>

					<li class="dropdown dropdown-user">
						<a class="dropdown-toggle" data-toggle="dropdown">
							<span>Username</span>
							<i class="caret"></i>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<!-- <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li> -->
							<li><a href="#"><i class="icon-switch2"></i> Logout</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<!-- /main navbar -->

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main sidebar -->
			<div class="sidebar sidebar-main sidebar-default">
				<div class="sidebar-content">

					<!-- Main navigation -->
					<div class="sidebar-category sidebar-category-visible">
						<div class="category-content no-padding">
							<ul class="navigation navigation-main navigation-accordion">

								<!-- Main -->
								<li class="navigation-header"><span>Main</span> <i class="icon-menu" title="Main"></i></li>
								<li><a href="#"><i class="icon-newspaper"></i> <span>Home</span></a></li>
								<li class="navigation-header"><span>Address Book</span> <i class="icon-menu" title="Address Book"></i></li>
								

								<li>
									<a href="#"><i class="icon-office"></i> <span>School Directory</span></a>
									<ul>
										<li><a href="School_AddSchool.php"><i class="icon-plus-circle2"></i> <span>Add School</span></a></li>
										<li class="active"><a href="School_ManageAddressBook.php"><i class="icon-book3"></i> <span>Manage Schools</span></a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-vcard"></i> <span>Student Directory</span></a>
									<ul>
										<li><a href="Student_ManageStudent.php"><i class="icon-book3"></i> <span>Manage Students</span></a></li>
									</ul>
								</li>

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->

			<!-- Main content -->
			<div class="content-wrapper" >
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4> <span class="text-semibold">Address Book</span> - Manage School Directory</h4>
						</div>
					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content" >
					
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-flat" name="viewSchool" id="viewSchool">
								<div class="panel-heading">
									<h5 class="panel-title">School Details</h5>
									<div class="heading-elements">
							    	</div>
								</div>

								<div class="panel-body">
									<div class="col-lg-12">
										<fieldset class="content-group">
											<?php if($resultSchool != null){
												foreach($resultSchool as $school){?>
									</div>

									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>School Name:</strong></label>

                                                <div id="SchoolName" class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="<?php echo $school['schoolName'];?>" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button class="btn btn-primary" id="btn1" onclick="HideEventListPanel(this)"><i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button> 
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
  
                                        <div id="editSchoolName" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
                                            	<label><span class="text-danger">* </span><strong>New School Name:</strong></label>
                                            	 <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" id="newSchoolName" name="newSchoolName" value="y4eah">
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<a class="btn btn-danger" onclick="HideEventListPanel(this)">Cancel</a>
                                                    	<a class="btn btn-primary" onclick="updateSchoolName(<?php echo $id?>)"><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                    	<div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>School Address:</strong></label>

                                                <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="<?php echo $school['cityName'].", ".$school['provinceName'];?>" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button id="btn2" class="btn btn-primary" onclick="HideEventListPanel1(this)" style="margin-left: -15px;"><i style="margin-right: 5px;" class="icon-pencil"></i>Edit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="editSchoolAddress" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
												<label><strong>New Province:</strong><span class="text-danger">*</span> </label>
												<select type="text" class="form-control select" onchange="getCity(this.value)"/>
													<?php foreach($provinceResult as $province){?>
													<option value="<?php echo $province['idProvince'];?>" onchange="getCity(this.value)"><?php echo $province['provinceName'];?></option>
													<?php }?>
												</select> 
											</div>

											<div class="form-group">
												<label><strong>New City / Municipality:</strong><span class="text-danger">*</span> </label>
												<select type="text" name="dropdownCity" id="dropdownCity" class="form-control select" /></select> 
											</div>

											<div class="form-group">
												<div class="text-right">
													<a class="btn btn-danger" onclick="HideEventListPanel1(this)">Cancel</a>
		                                        	<a class="btn btn-primary" onclick=""><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
												</div>
											</div>
	                                    </div>

										</br>
											<div class="col-lg-12">
											<table class="table datatable-html" style='font-size: 13px;' name="tablePreview" id="tablePreview">

												<thead style="font-size: 13px;">
													<tr>
										                <th>Contact Person</th>
										                <th>Designation</th>
										                <th>Cellphone Number</th>
										                <th>Telephone Number</th>
										                <th>Fax Number</th>
										                <th>Email Address</th>
										                <th class="text-center">Actions</th>
										            </tr>
												</thead>
												<tbody style="font-size: 13px;">
													<?php if($resultContactPerson){
													 foreach($resultContactPerson as $person){?>
													
													<tr>
														<td><?php echo $person['contactName'];?></td>
														<td><?php echo $person['designation'];?></td>
														<td><?php echo $person['cellphoneNumber'];?></td>
														<td><?php echo $person['telephoneNumber'];?></td>
														<td><?php echo $person['faxNumber'];?></td>
														<td><?php echo $person['emailAddress'];?></td>
														<td class="text-center">
															<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																<i class="icon-menu9"></i>
															</a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href='School_UpdateSchool.php?idPerson=<?php echo $person['idcontactPerson'];?>' name='sample' id='sample'><i class='icon-pencil' style="margin-left: 5px; margin-right: 3px;"></i>Edit</a></li>
																<li><a href="#" name="sample" id="sample"  onclick="promptDelete(<?php echo $school['idSchool'];?>)"><i class="icon-trash" style="margin-left: 5px; margin-right: 3px;"></i>Delete</a></li>
															</ul>
														</li>
													</ul>

														
													</td>
													</tr>
													<?php }}}} ?>
												</tbody>
											</table>
										</fieldset>
									</div>

								</div>
							</div>

							<div class="panel panel-flat" name="editPerson" id="editPerson">
								<div class="panel-heading">
									<h5 class="panel-title"><a class="btn-link" onclick="hidePerson(this)"><i class="icon-arrow-left52 position-left"></i></a>Contact Person Details</h5>
									<div class="heading-elements">
							    	</div>
								</div>

								<div class="panel-body">

									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>Contact Person Name:</strong></label>

                                                <div id="SchoolName" class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button id="btn3" class="btn btn-primary" onclick="HideEventListPanel2(this)"><i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
  
                                        <div id="editContactPersonName" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
                                            	<label><span class="text-danger">* </span><strong>New Contact Person Name:</strong></label>
                                            	 <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="" />
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<a class="btn btn-danger" onclick="HideEventListPanel2(this)">Cancel</a>
                                                    	<a class="btn btn-primary" onclick=""><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>Designation:</strong></label>

                                                <div id="SchoolName" class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button id="btn4" class="btn btn-primary" onclick="HideEventListPanel3(this)"><i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
  
                                        <div id="editDesignation" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
                                            	<label><span class="text-danger">* </span><strong>New Designation:</strong></label>
                                            	 <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="" />
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<a class="btn btn-danger" onclick="HideEventListPanel3(this)">Cancel</a>
                                                    	<a class="btn btn-primary" onclick=""><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>Cellphone Number:</strong></label>

                                                <div id="SchoolName" class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button id="btn5" class="btn btn-primary" onclick="HideEventListPanel4(this)"><i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
  
                                        <div id="editCellphoneNumber" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
                                            	<label><span class="text-danger">* </span><strong>New Cellphone Number:</strong></label>
                                            	 <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="" />
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<a class="btn btn-danger" onclick="HideEventListPanel4(this)">Cancel</a>
                                                    	<a class="btn btn-primary" onclick=""><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>Telephone Number:</strong></label>

                                                <div id="SchoolName" class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button id="btn6"  class="btn btn-primary" onclick="HideEventListPanel5(this)"><i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
  
                                        <div id="editTelephoneNumber" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
                                            	<label><span class="text-danger">* </span><strong>New Telephone Number:</strong></label>
                                            	 <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="" />
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<a class="btn btn-danger" onclick="HideEventListPanel5(this)">Cancel</a>
                                                    	<a class="btn btn-primary" onclick=""><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>Fax Number:</strong></label>

                                                <div id="SchoolName" class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button id="btn7" class="btn btn-primary" onclick="HideEventListPanel6(this)"><i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
  
                                        <div id="editFaxNumber" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
                                            	<label><span class="text-danger">* </span><strong>New Fax Number:</strong></label>
                                            	 <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="" />
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<a class="btn btn-danger" onclick="HideEventListPanel6(this)">Cancel</a>
                                                    	<a class="btn btn-primary" onclick=""><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>Email Address:</strong></label>

                                                <div id="SchoolName" class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button id="btn8" class="btn btn-primary" onclick="HideEventListPanel7(this)"><i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
  
                                        <div id="editEmailAddress" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
                                            	<label><span class="text-danger">* </span><strong>New Email Address:</strong></label>
                                            	 <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="" />
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<a class="btn btn-danger" onclick="HideEventListPanel7(this)">Cancel</a>
                                                    	<a class="btn btn-primary" onclick=""><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Content area -->
				<!-- Content area 2 -->
				<div id="addContactPerson">
					
				</div>
				<!--Content area 2-->
			</div>
			<!-- /Main content -->

		</div>
		<!-- Page content -->
	</div>
	<!-- Page container -->
	 <!-- Small modal -->
	
	<!-- /small modal -->
	<script type="text/javascript">
		    // Warning alert
		    $('#tablePreview').dataTable( {
			  "columnDefs": [ {
				"targets": 6,
				"orderable": false
				} ]
			} );
		    function promptDelete(val){
		    	swal({
			            title: "Are you sure?",
			            text: "You will not be able to recover this information!",
			            type: "warning",
			            showCancelButton: true,
			            confirmButtonColor: "#FF7043",
			            confirmButtonText: "Delete",
			            closeOnConfirm: true,
			            closeOnCancel: true
		        	},
		        	function(isConfirm){
		        		if(isConfirm){
		        			deleteSchool(val);
		        		}
		        });
		    }
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
		    function deleteSchool(val){
		    	$.ajax({
				type: "POST",
				url: "getSchool.php",
				data: 'idSchool=' + val,
					success: function(data){
						window.location ='School_ManageAddressBook.php';
					}
				});
		    }
		    function updateSchoolName(id){
		    	var val = document.getElementById('newSchoolName').value;
		    	// alert(id+val);
		    }
		    function showDiv(){
		    	var x = document.getElementById('viewSchool');
		    	var y = document.getElementById('editPerson');
		    	x.style.display = "none";
		    	y.style.display = "block";
		    }

		    function HideEventListPanel() {
		        var x = document.getElementById("editSchoolName");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		           $('#btn1').prop('disabled', true);
		        } else {
		            x.style.display = "none";
		           $('#btn1').prop('disabled', false);
		        }
		    }

		    function HideEventListPanel1() {
		        var x = document.getElementById("editSchoolAddress");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		            $('#btn2').prop('disabled', true);
		        } else {
		            x.style.display = "none";
		            $('#btn2').prop('disabled', false);
		        }
		    }

		    function HideEventListPanel2() {
		        var x = document.getElementById("editContactPersonName");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		            $('#btn3').prop('disabled', true);
		        } else {
		            x.style.display = "none";
		            $('#btn3').prop('disabled', false);
		        }
		    }

		    function HideEventListPanel3() {
		        var x = document.getElementById("editDesignation");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		            $('#btn4').prop('disabled', true);
		        } else {
		            x.style.display = "none";
		            $('#btn4').prop('disabled', false);
		        }
		    }

		    function HideEventListPanel4() {
		        var x = document.getElementById("editCellphoneNumber");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		            $('#btn5').prop('disabled', true);
		        } else {
		            x.style.display = "none";
		            $('#btn5').prop('disabled', false);
		        }
		    }

		    function HideEventListPanel5() {
		        var x = document.getElementById("editTelephoneNumber");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		            $('#btn6').prop('disabled', true);
		        } else {
		            x.style.display = "none";
		            $('#btn6').prop('disabled', false);
		        }
		    }

		    function HideEventListPanel6() {
		        var x = document.getElementById("editFaxNumber");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		            $('#btn7').prop('disabled', true);
		        } else {
		            x.style.display = "none";
		            $('#btn7').prop('disabled', false);
		        }
		    }

		    function HideEventListPanel7() {
		        var x = document.getElementById("editEmailAddress");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		            $('#btn8').prop('disabled', false);
		        } else {
		            x.style.display = "none";
		            $('#btn8').prop('disabled', false);
		        }
		    }

		    function hidePerson() {
		        var x = document.getElementById("editPerson");
		        var y = document.getElementById("viewSchool");
		        if(x.style.display === 'display'){
		        	x.style.display = "none";
		        	y.style.display = "block";
		        }
		        else{
		        	x.style.display = "none";
		        	y.style.display = "block";
		        }
		    }

		    function hideDiv(){
		    	var x = document.getElementById('viewSchool');
		    	var y = document.getElementById('editPerson');
		    	x.style.display = "block";
		    	y.style.display = "none";
		    }
	</script>
</body>
</html>