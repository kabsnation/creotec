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
					<li><a href="School_AddSchool.php"><i class="icon-office position-left"></i><strong>Add School</strong></a></li>
					<li><a data-toggle="modal" data-target="#modal_apply"><i class="icon-pencil position-left"></i><strong>Apply</strong></a></li>
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

				</div>
				<!-- /Content area -->

			</div>
			<!-- /Main content -->

		</div>
		<!-- /Page content -->

	    <!-- Disabled keyboard interaction -->
		<div id="modal_apply" class="modal fade" data-keyboard="false" data-backdrop="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header bg-primary">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">Work Immersion</h5>
					</div>

					<form class="form-validate-jquery" action="enrollment.php" method="POST">
					
						<div class="modal-body">
							<div class="col-md-12">
								<div class="form-group">
									<h5>Enter your Batch Code: <span class="text-danger">*</span></h5>
									<input type="text" id="batchcode" name="batchcode" class="form-control" required="required"  onkeyup="getBatchCode(this.value); validuser(this);" autofocus>
									<br/>
									<div class="text-center">
										<label id="batchcodeMessage"></label>
									</div>
								</div>
							</div>
						</div>

						<div class="modal-footer">
							<button type="reset" id="reset" name="reset" class="btn btn-link" data-dismiss="modal">Cancel</button>
							<input id="nextBtn" type="submit" disabled="true" class="btn btn-primary" Text="Apply" />
						</div>

					</form>

				</div>
			</div>
		</div>
		<!-- /disabled keyboard interaction -->

	</div>
	<!-- /Page container -->
	
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
	<script type="text/javascript" src="assets/js/pages/components_loaders.js"></script>
	<script type="text/javascript" src="assets/js/plugins/loaders/progressbar.min.js"></script>

	<script type="text/javascript">
		// window.location = "enrollment.php";
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
					}
					else{
						$("#batchcodeMessage").html(result[0] + result[1]);
		                $("#nextBtn").prop('disabled', false);
					}
				},

				error: function(data){
					$("#batchcodeMessage").html('');
					$("#nextBtn").prop('disabled', true);
				}
			});
		}
	</script>

</html>

