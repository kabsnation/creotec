<?php include('../UI/header/header_admin.php'); ?>
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Batch Code</span> - Batch Code List </h4>
						</div>

						<div class="heading-elements">
						</div>

					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">
					
					<div class="row">
						<div class="col-lg-12">

							<div class="panel panel-flat" id="batchcodelist" name="batchcodelist">
								<div class="panel-heading">
									<h5 class="panel-title">Batch Codes List</h5>
								</div>

								<div class="panel-body">

									<div class="col-lg-12">
										<div class="row">

											<table class="table datatable-html" name="batchcode_table" id="batchcode_table">
												<thead style="font-size: 13px;">
													<tr>
										                <th>Batch Code</th>
										                <th>Center Name</th>
										                <th class="text-center">Actions</th>
										            </tr>
												</thead>
											</table>

										</div>
									</div>
									
								</div>
							</div>

							<div class="panel panel-flat" id="viewBatchCode" name="viewBatchCode" style="display: none;">
								<div class="panel-heading">
									<h5 class="panel-title"><a class="btn-link" onclick="hideBatchCodePanel()"><i class="icon-arrow-left52 position-left"></i></a>Batch Codes Details</h5>
								</div>

								<div class="panel-body">

									<div class="row">
										<div class="col-lg-12">
											<div class="text-right">
												<label>Slots Used:</label>
											</div>
										</div>
									</div>
									

									<div class="col-lg-12">
										<div class="row">

											<table class="table datatable-html">
												<thead style="font-size: 13px;">
													<tr>
										                <th>School</th>
										                <th></th>
										                <th class="text-center">Actions</th>
										            </tr>
												</thead>
											</table>

										</div>
									</div>
									
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
</body>
</html>

<script type="text/javascript">
	function hideBatchCodePanel() {
	    var x = document.getElementById("batchcodelist");
	    var y = document.getElementById("viewBatchCode");
	    if(x.style.display === "none"){
	    	x.style.display = "block";
        	y.style.display = "none";
        	
        }
        else{
        	x.style.display = "none";
        	y.style.display = "block";
        }
	}
</script>