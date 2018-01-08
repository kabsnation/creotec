<?php 
include('../config/config.php');
$con = new Connect();
$conn = $con->connectDB();
$query= "SELECT batch.idbatch, batchCode,centerName FROM batch JOIN center ON batch.idCenter = center.idCenter where batch.markasdeleted = 0";
$resultBatch = $con->select($query);
if(isset($_GET['id'])){
	$id = mysqli_real_escape_string($conn,stripcslashes(trim($_GET['id'])));
	$querySchool = "SELECT batch.idbatch, batchCode,centerName, schoolName FROM batch JOIN center ON batch.idCenter = center.idCenter JOIN school_batch ON batch.idbatch = school_batch.idbatch JOIN school ON school_batch.idSchool = school.idSchool where batch.idbatch = ".$id." and batch.markasdeleted = 0 order by batch.idbatch DESC";
	$resultSchool = $con->select($querySchool);
}
include('../UI/header/header_admin.php');
?>
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
												
												<tbody>
													<?php if($resultBatch){
														foreach($resultBatch as $res){?>
														<tr>
														<td><?php echo $res['batchCode'];?></td>
														<td><?php echo $res['centerName'];?></td>
														<td class="text-center">
															<a href="BatchCode_List.php?id=<?php echo $res['idbatch'];?>" id="update" name="view" style="color: #2c3e50;"><i class="icon-eye" style="margin-right: 3px;"></i>View</a>
															<!-- <a href="School_UpdateSchool.php?id=<?php echo $res['idbatch'];?>" id="update" name="update" style="color: #2980b9"><i class="icon-pencil" style="margin-right: 3px;"></i>Update</a> -->
															<a href="#" name="sample" id="sample" style="color: #d35400;" onclick="promptDelete(<?php echo $res['idbatch'];?>)"><i class="icon-trash" style="margin-left: 5px; margin-right: 3px;"></i>Delete</a>
														</td>
														</tr>
												<?php }}?>
												</tbody>
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

											<table class="table datatable-html" id="table1">
												<thead style="font-size: 13px;">
													<tr>
														<th>No.</th>
										                <th>School</th>
										            </tr>
												</thead>
												<tbody>
											<?php if(isset($resultSchool)){

													$count = 1;
												foreach ($resultSchool as $school) {
												?>
												<tr>
													<td><?php echo $count?></td>
													<td><?php echo $school['schoolName'];?></td>
												</tr>
												<?php $count++;}}?>
												</tbody>
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
	<?php if(isset($_GET['id'])){?>
		hideBatchCodePanel();
	<?php }?>
	$('#batchcode_table').DataTable( {
			  "columnDefs": [ {
				"targets": 2,
				"orderable": false
				} ]
			} );
	$('#table1').DataTable( {
			  "columnDefs": [ {
				"targets": 0,
				"orderable": true
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

		    function deleteSchool(val){
		    	$.ajax({
				type: "POST",
				url: "generateBatchCode.php",
				data: 'id=' + val,
					success: function(data){
						window.location ='BatchCode_List.php';
					}
				});
		    }
</script>