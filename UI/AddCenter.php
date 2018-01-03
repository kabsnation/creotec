<?php
require_once("../config/config.php");
$connect = new Connect();
$provinceQuery = "SELECT * FROM province ORDER BY provinceName";
$provinceResult = $connect->select($provinceQuery);
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add Center</title>

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
	<script type="text/javascript" src="assets/js/core/libraries/jasny_bootstrap.min.js"></script>
	<!-- /theme JS files -->
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
							<li><a href="index.php"><i class="icon-switch2"></i> Logout</a></li>
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
										<li><a href="Student_ManageStudent.php"><i class="icon-book3"></i> <span>Students Masterlist</span></a></li>
									</ul>
								</li>

								<li >
									<a href="#"><i class="icon-users"></i> <span>Attendance List</span></a>
									
								</li>

								<li>
									<a href="#"><i class="icon-city"></i> <span>Center</span></a>
									<ul>
										<li class="active"><a href="AddCenter.php"><i class="icon-plus-circle2"></i> <span>Add Center</span></a></li>
									</ul>
									
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
			<div class="content-wrapper" >
				
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
					
					<div class="row">
						<div class="col-lg-12">

							<!-- Basic layout-->
							<form action="contactPerson.php" method="POST" class="form-validate-jquery">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title"><i class="icon-address-book3" style="margin-right: 10px"></i>Add Center</h5>
										<div class="heading-elements">
					                	</div>
									</div>

									<div class="panel-body">
										<div class="row">
											<div class="col-lg-6 col-md-offset-3">
												<div class="form-group">
													<legend class="text-semibold">Center Information </legend>
													<label>Center Name:</label>
													<input type="text" required="required" class="form-control">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-6 col-md-offset-3">
												<div class="form-group">
													<legend class="text-semibold">Address </legend>
													<label>Province:</label>
													<select class="form-control"></select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-6 col-md-offset-3">
												<div class="form-group">
													<label>City / Municipality:</label>
													<select class="form-control"></select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-12">
												<div class="text-right">
													<input type="button" value="Add Center" class="btn bg-primary"/>
												</div>
											</div>
										</div>
									</div>

								</div>
							</form>
							<!-- /basic layout -->

						</div>
					</div>

				</div>
				<!-- Content area -->

			</div>
			<!-- /Main content -->

		</div>
		<!-- Page content -->
	</div>
	<!-- Page container -->

</body>
</html>
