<?php
require_once('../UI/SchoolHandler.php');
$handler = new SchoolHandler();
$resultSchool = $handler->getSchool();
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
	<script type="text/javascript" src="assets/js/plugins/pickers/pickadate/legacy.js"></script>
	<script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/wizard_stepy.js"></script>
	<script type="text/javascript" src="assets/js/pages/uploader_bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/plugins/uploaders/fileinput.min.js"></script>
	<script type="text/javascript" src="assets/js/pages/components_modals.js"></script>
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables_data_sources.js"></script>
	<!-- /theme JS files -->

	<script src="assets/js/validation.js"></script>
</head>
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
										<li><a href="School_AddAddressBook.php"><i class="icon-plus-circle2"></i> <span>Add School</span></a></li>
										<li><a href="School_ManageAddressBook.php"><i class="icon-book3"></i> <span>Manage Schools</span></a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-vcard"></i> <span>Student Directory</span></a>
									<ul>
										<li ><a href="Student_ManageAddressBook.php"><i class="icon-book3"></i> <span>Students Masterlist</span></a></li>
									</ul>
								</li>

								<li>
									<a href="Attendance_View.php"><i class="icon-users"></i> <span>Attendance List</span></a>
									
								</li>

								<li class="active">
									<a href="Generate_BatchCode.php"><i class="icon-cogs"></i> <span>Generate Batch Code</span></a>
									
								</li>

							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->

			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Address Book</span> - Manage Students Directory</h4>
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
								<h2 class="panel-title">Generate Batch Code</h6>
									
							</div>
						</div>

	                	<form class="stepy-validation" action="#" method="POST" enctype="multipart/form-data">
	                		<input name="batchcode" id="batchcode"  type="hidden" required class="form-control" value="<?php echo $batchcode ?>">
							<fieldset title="1">
								<legend class="text-semibold">Choose Center </legend>
								<div class="row">
									<div class="col-lg-6 col-md-offset-3">
										<div class="form-group">
							                <label>Center Location</label>
							                <select class="form-control select2" style="width: 100%;">
							                  <option></option>
							                </select>
							              </div>
										<br/>
									</div>
								</div>
							</fieldset>

							<fieldset title="2">
								<legend class="text-semibold">Schools</legend>
								<div class="row">
									<div class="col-lg-12"><legend class="text-bold">Choose School </legend></div>
									
									<div class="box">
										<div class="panel-heading">

									<div class="heading-elements">

									
						    	</div>

								</div>

								<div class="panel-body">
									<table class="table datatable-html" style='font-size: 13px;' name="table1" id="table1">

										<thead style="font-size: 13px;">
											<tr>
												<th style="width: 5%;"><a></a><i class="icon-check"></i></th>
								                <th>School Name</th>
								                <th>Location</th>
								            </tr>
										</thead>

										<tbody style="font-size: 12px;">
											<?php if($resultSchool){
												foreach($resultSchool as $result){
												?>
								            <tr>
								            	<td> <input type="checkbox" name="idschool[]" value="<?php echo $result['idSchool'];?>" id="idschool"></td>
								                <td><?php echo $result['schoolName'];?></td>
								                <td><?php echo $result['cityName'].", ".$result['provinceName'];?></td>
								            </tr>
								            <?php }}?>
								          
								        </tbody>

									</table>

							
						</div>
					</div>
											
								</div>
							</fieldset>

							<fieldset title="3">
								<legend class="text-semibold">Alloted Slots</legend>
								<div class="row" style="margin-bottom: 20px;">
								</div>
							</fieldset>

							

							<button id="btnSubmit" name="btnSubmit" data-toggle="modal"  data-target="#exampleModal" class="btn btn-primary stepy-finish">Submit <i class="icon-check position-right"></i></button>

					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title"></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<div class="modal-body">
								<center><h3> Generated Batch Code: </h3></center>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary">Save changes</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
							</div>
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

