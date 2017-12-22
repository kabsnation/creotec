<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Address Book</title>

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

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/wizard_stepy.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jquery_ui/interactions.min.js"></script>
	<script type="text/javascript" src="assets/js/pages/form_select2.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_data_sources.js"></script>
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<!-- /theme JS files -->

	<style type="text/css">
		th, td { white-space: nowrap; }
	    div.dataTables_wrapper {
	        margin: 0 auto;
	    }
	 
	    div.container {
	        width: 80%;
	    }
	</style>
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
										<li class="active"><a href="School_AddAddressBook.php"><i class="icon-plus-circle2"></i> <span>Add School</span></a></li>
										<li><a href="School_ManageAddressBook.php"><i class="icon-book3"></i> <span>Manage Schools</span></a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-vcard"></i> <span>Student Directory</span></a>
									<ul>
										<li><a href="Student_ManageStudent.php"><i class="icon-book3"></i> <span>Students Masterlist</span></a></li>
									</ul>
								</li>

								<li >
									<a href="#"><i class="icon-users"></i> <span>Attendance List</span></a>
									
								</li>

								<li>
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">School Directory</span> - Add School</h4>
						</div>
					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">

					<!-- Panel -->
		            <div class="panel panel-white">
						<div class="panel-heading">
							<h6 class="panel-title">Add School</h6>
							<div class="heading-elements">
								<ul class="icons-list">
			                	</ul>
		                	</div>
						</div>

	                	<form class="stepy-validation" action="#">
							<fieldset title="1">
								<legend class="text-semibold">School Information</legend>
								<div class="row">

									<div class="col-lg-6">
										<div class="form-group">
											<label><strong>School Name:</strong><span class="text-danger">*</span> </label>
											<input type="text" class="form-control" name="schoolName" onkeyup="yeah(this)"/>
										</div>
									</div>

									<div class="col-lg-6">
										<div class="form-group">
											<label><strong>Province:</strong><span class="text-danger">*</span> </label>
											<select type="text" class="form-control select2" onchange="getCity(this.value)"/>
											<option value=""></option>
												<?php foreach($provinceResult as $province){?>
												<option value="<?php echo $province['idProvince'];?>"><?php echo $province['provinceName'];?></option>
												<?php }?>
											</select> 
										</div>

										<div class="form-group">
											<label><strong>City / Municipality:</strong><span class="text-danger">*</span> </label>
											<select type="text" name="city" id="city" class="form-control select2"/></select> 
										</div>
									</div>

								</div>
							</fieldset>

							<fieldset title="2">
								<legend class="text-semibold">Contact Person</legend>

								<div class="col-lg-12">
									<div class="text-right">
										<button type="button" class="btn btn-default" data-dismiss="modal" onclick="addToContactTable(txtContactPerson.value,txtDesignation.value,txtContactNumber.value,txtTelephoneNumber.value,txtFaxNumber.value,txtEmailAddress.value)"><i class="icon-phone-plus2 position-left"></i>Add</button>
									</div>
								</div>
								
								<div class="col-lg-6">
									<div class="form-group">
										<label><strong>Contact Person:</strong><span class="text-danger">*</span> </label>
										<input id="txtContactPerson" name="txtContactPerson" type="text" class="form-control" required="required"/>
									</div>

									<div class="form-group">
										<label><strong>Designation:</strong><span class="text-danger">*</span> </label>
										<input id="txtDesignation" name="txtDesignation" type="text" class="form-control" required="required"/>
									</div>
								</div>

								<div class="col-lg-6">
									<div class="form-group">
										<label><strong>Cellphone Number:</strong><span class="text-danger">*</span> </label>
										<input id="txtContactNumber" name="txtContactNumber" required="required"="required="required"" class="form-control" data-mask="(+63) 999-999-9999" placeholder="(+63) 999-999-9999">
									</div>

									<div class="form-group">
										<label><strong>Telephone Number:</strong><span class="text-danger">*</span> </label>
										<input id="txtTelephoneNumber" name="txtTelephoneNumber" data-mask="(+99)-9999999" placeholder="(+99)-9999999" class="form-control" required="required"/>
									</div>

									<div class="form-group">
										<label><strong>Fax Number:</strong></label>
										<input id="txtFaxNumber" name="txtFaxNumber" data-mask="(+99)-9999999" placeholder="(+99)-9999999" class="form-control"/>
									</div>

									<div class="form-group">
										<label><strong>Email Address:</strong><span class="text-danger">*</span> </label>
										<input id="txtEmailAddress" name="txtEmailAddress" type="email" class="form-control" required="required"/>
									</div>
								</div>

								<div class="col-lg-12">
									<table class="table datatable-html" required="" style="font-size: 13px; width: 100%" name="table1" id="table1">
										<thead style="font-size: 13px;">
											<tr>
								                <th>Name</th>
								                <th>Designation</th>
								                <th>Cellphone Number</th>
								                <th>Telephone Number</th>
								                <th>Fax Number</th>
								                <th>Email Address</th>
								                <th class="text-center">Actions</th>
								            </tr>
										</thead>
									</table>
								</div>

							</fieldset>

							<button type="submit" class="btn btn-blue stepy-finish">Save <i class="icon-check position-right"></i></button>
						</form>

					</div>

				</div>
				<!-- Content area -->

			</div>
			<!-- Main content -->

		</div>
		<!-- Page content -->

	</div>
	<!-- Page container -->
</body>
</html>