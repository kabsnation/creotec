<?php 
require_once('../config/config.php');
$connect = new Connect();
$con = $connect-> connectDB();
$queryAccount="";
$queryBatch = "SELECT batch.idbatch, capacity, (select count(*) as count from applicants as a WHERE a.idbatch = batch.idbatch AND a.idstrand = strand.idstrand) as counter, strand, strand.idStrand FROM slots JOIN strand ON strand.idstrand = slots.idstrand JOIN batch ON batch.idbatch = slots.idbatch WHERE capacity != 0";
$resultBatch = $connect->select($queryBatch);
if(isset($_GET['idbatch'])){
	$idbatch = mysqli_real_escape_string($con,stripcslashes(trim($_GET['idbatch'])));
	$queryAccount = "SELECT firstName, LastName, schoolName, strand, targetCourse, batchCode 
	FROM accountinformation, applicants, batch, targetcourse, school, strand
	where applicants.idAccountInformation=accountinformation.idAccountInformation  
	and applicants.idStrand=strand.idStrand and applicants.idBatch=batch.idBatch 
	and applicants.idtargetcourse=targetcourse.idtargetcourse 
	and applicants.idSchool=school.idSchool and batch.idbatch= ".$idbatch. " ORDER BY applicants.idAccountInformation";
}
else{
	foreach ($resultBatch as $batch) {
		$queryAccount = "SELECT firstName, LastName, schoolName, strand, targetCourse, batchCode 
		FROM accountinformation, applicants, batch, targetcourse, school, strand
		where applicants.idAccountInformation=accountinformation.idAccountInformation  
		and applicants.idStrand=strand.idStrand and applicants.idBatch=batch.idBatch 
		and applicants.idtargetcourse=targetcourse.idtargetcourse 
		and applicants.idSchool=school.idSchool and batch.idbatch= ".$batch['idbatch']. " ORDER BY applicants.idAccountInformation";	
		break;
	}
}
$resultsAccount= $connect->select($queryAccount);
?>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Manage Student Directory</title>

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
										<li class="active"><a href="Student_ManageAddressBook.php"><i class="icon-book3"></i> <span>Students Masterlist</span></a></li>
									</ul>
								</li>

								<li>
									<a href="Attendance_View.php"><i class="icon-users"></i> <span>Attendance List</span></a>
									
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Address Book</span> - Manage Students Directory</h4>
						</div>
					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">
					
					<div class="row">
						<div class="col-lg-12">

							<div class="panel panel-flat">
								<div class="panel-heading">

									<h5 class="panel-title">Student Directory</h5>

									<div class="heading-elements">

										
										<div class="form-group">
											<label>Batch: </label>					                 
											<select class="select">
												<?php $tempo;
													foreach($resultBatch as $batch){
														if($tempo != $batch['idbatch']){
															$tempo = $batch['idbatch'];
													?>
													<option value="<?php echo $batch['idbatch'];?>"><?php echo $batch['idbatch'];?></option>
													<?php }}?>
							                </select>
							                <br />

						    	<button type="button" class="btn btn-info"  onclick="printAttendance();"><i class="icon-printer" style="margin-right: 5px;"></i>Print</button>
						    		<br />

						    		</div>					         
						    	</div>

								</div>

								<div class="panel-body" style="margin-top: 15px;">
									<table class="table datatable-html" name="table1" id="table1">

										<thead style="font-size: 14px;">
											<tr>
								                <th>Batch Code</th>
								                <th>Name</th>
								                <th>School</th>
								                <th>Strand</th>
								                <th>Target Course</th>
								            </tr>
										</thead>

										<tbody style="font-size: 13px;">
										<?php foreach($resultsAccount as $result){
												?>
								            <tr>
								                <td><?php echo $result['batchCode'];?></td>
								                <td><?php echo $result['LastName'].', '.$result['firstName'] ;?></td>
								                <td><?php echo $result['schoolName'];?></td>
								                <td><?php echo $result['strand'];?></td>
								                <td><?php echo $result['targetCourse'];?></td>
												
								            </tr>
								            <?php }?>

								        </tbody>

									</table>

								</div>
							</div>

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

	<script type="text/javascript">
		    // Warning alert
		    $('#sample').on('click', function() {
		        swal({
		            title: "Are you sure?",
		            text: "You will not be able to recover this information!",
		            type: "warning",
		            showCancelButton: true,
		            confirmButtonColor: "#FF7043",
		            confirmButtonText: "Delete",
		            closeOnConfirm: true,
		            closeOnCancel: true
		        });
		    });
		    $('#table1').dataTable( {
			  "columnDefs": [ {
				"targets": 2,
				"orderable": true
				} ]
			} );
	</script>
</body>
</html>