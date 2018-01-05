<?php
session_start();
require("../UI/AccountHandler.php");
$handler = new AccountHandler();
if(isset($_SESSION['id'])){
	$id = $_SESSION['id'];
	$result = $handler->getAccountById($id);
	if($result){
		$arr = array();
$scripts = '<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/forms/selects/select2.min.js"></script>
	<script type="text/javascript" src="assets/js/plugins/notifications/sweet_alert.min.js"></script>

	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_data_sources.js"></script>
	<script type="text/javascript" src="assets/js/pages/components_modals.js"></script>
	<script type="text/javascript" src="assets/js/core/libraries/jasny_bootstrap.min.js"></script>';
if(strpos($_SERVER['REQUEST_URI'],'School_AddSchool.php')){
	$arr[0] = 'Add School';
	$arr[1] = 'active';
	$arr[2] = '';
	$arr[3] ='';
	$arr[4] ='';
	$arr[5]='';
	$arr[6]='';
	$arr[7]='';
	$arr[8]=$scripts;
}
else if(strpos($_SERVER['REQUEST_URI'],'School_ManageAddressBook.php')){
	$arr[0] = 'Manage School';
	$arr[1] = '';
	$arr[2] = 'active';
	$arr[3] ='';
	$arr[4] ='';
	$arr[5]='';
	$arr[6]='';
	$arr[7]='';
	$arr[8]=$scripts;
}
else if(strpos($_SERVER['REQUEST_URI'],'Student_ManageStudent.php')){
	$arr[0] = 'Manage Students';
	$arr[1] = '';
	$arr[2] = '';
	$arr[3] ='active';
	$arr[4] ='';
	$arr[5]='';
	$arr[6]='';
	$arr[7]='';
	$arr[8]=$scripts;
}
else if(strpos($_SERVER['REQUEST_URI'] ,'Attendance_View.php')){
	$arr[0] = 'Students Attendance';
	$arr[1] = '';
	$arr[2] = '';
	$arr[3] ='';
	$arr[4] ='active';
	$arr[5]='';
	$arr[6]='';
	$arr[7]='';
	$arr[8]=$scripts;

}
else if(strpos($_SERVER['REQUEST_URI'] ,'School_UpdateSchool.php')){
	$arr[0] = 'Update School';
	$arr[1] = '';
	$arr[2] = 'active';
	$arr[3] ='';
	$arr[4] ='';
	$arr[5]='';
	$arr[6]='';
	$arr[7]='';
	$arr[8]=$scripts;

}
else if(strpos($_SERVER['REQUEST_URI'] ,'Generate_BatchCode.php')){
	$arr[0] = 'Generate BatchCode';
	$arr[1] = '';
	$arr[2] = '';
	$arr[3] ='';
	$arr[4] ='';
	$arr[5]='active';
	$arr[6] ='';
	$arr[7]='';
	$arr[8] ='<script type="text/javascript" src="assets/js/plugins/forms/wizards/stepy.min.js"></script>
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
	<script type="text/javascript" src="assets/js/plugins/tables/datatables/datatables.min.js"></script>
	<script type="text/javascript" src="assets/js/pages/datatables_data_sources.js"></script>
	<script type="text/javascript" src="assets/js/core/app.js"></script>
	<script type="text/javascript" src="assets/js/pages/wizard_stepy.js"></script>
	<script type="text/javascript" src="assets/js/pages/picker_date.js"></script>
	<script type="text/javascript" src="assets/js/pages/uploader_bootstrap.js"></script>
	<script type="text/javascript" src="assets/js/plugins/uploaders/fileinput.min.js"></script>';
}
else if(strpos($_SERVER['REQUEST_URI'] ,'BatchCode_List.php')){
	$arr[0] = 'Batch Code List';
	$arr[1] = '';
	$arr[2] = '';
	$arr[3] ='';
	$arr[4] ='';
	$arr[5] ='';
	$arr[6]='active';
	$arr[7]='';
	$arr[8]=$scripts;
}
else if(strpos($_SERVER['REQUEST_URI'] ,'AddCenter.php')){
	$arr[0] = 'Add Center';
	$arr[1] = '';
	$arr[2] = '';
	$arr[3] ='';
	$arr[4] ='';
	$arr[5] ='';
	$arr[6]='';
	$arr[7]='active';
	$arr[8]=$scripts;
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
	<title><?php echo $arr[0];?></title>

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
	<?php echo $arr[8]?>
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
							<?php foreach($result as $info){?>
							<span><?php echo $info['userName'];?></span>
							<?php }?>
							<i class="caret"></i>
						</a>

						<ul class="dropdown-menu dropdown-menu-right">
							<!-- <li><a href="#"><i class="icon-cog5"></i> Account settings</a></li> -->
							<li><a href="Login.php?logout=true"><i class="icon-switch2"></i> Logout</a></li>
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
										<li class="<?php echo $arr[1];?>"><a href="School_AddSchool.php"><i class="icon-plus-circle2"></i> <span>Add School</span></a></li>
										<li class="<?php echo $arr[2];?>"><a href="School_ManageAddressBook.php"><i class="icon-book3"></i> <span>Manage Schools</span></a></li>
									</ul>
								</li>

								<li>
									<a href="#"><i class="icon-vcard"></i> <span>Student Directory</span></a>
									<ul>
										<li class="<?php echo $arr[3];?>"><a href="Student_ManageStudent.php"><i class="icon-book3"></i> <span>Students Masterlist</span></a></li>
									</ul>
								</li>

								<li class="<?php echo $arr[4];?>">
									<a href="Attendance_View.php"><i class="icon-users"></i> <span>Attendance List</span></a>
									
								</li>

								<li>
									<a href="#"><i class="icon-vcard"></i> <span>Batch Code</span></a>
									<ul>
										<li class="<?php echo $arr[5];?>">
											<a href="Generate_BatchCode.php"><i class="icon-cogs"></i> <span>Generate Batch Code</span></a>
										</li>

										<li class="<?php echo $arr[6];?>">
											<a href="BatchCode_List.php"><i class="icon-menu2"></i><span>Batch Code List</span></a>
										</li>
									
									</ul>
								</li>
									<li >
											<a href="AddCenter.php"><i class="icon-city"></i> <span>Center</span></a>
											<ul>
												<li class="<?php echo $arr[7];?>"><a href="AddCenter.php"><i class="icon-plus-circle2"></i> <span>Add Center</span></a></li>
											</ul>
											
										</li>
								


							</ul>
						</div>
					</div>
					<!-- /main navigation -->

				</div>
			</div>
			<!-- /main sidebar -->