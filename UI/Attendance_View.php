<?php
include('../UI/StudentHandler.php');
$handler = new StudentHandler();
$results = $handler->getStudents();
include('../UI/header/header_admin.php');
?>
<style type="text/css">
	th, td { white-space: nowrap; }
    div.dataTables_wrapper {
        margin: 0 auto;
    }

    div.container {
        width: 80%;
    }
</style>
			<!-- Main content -->
			<div class="content-wrapper" >
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Attendance List</span> - View Attendance</h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<a class="btn btn-link btn-float has-text"><i class=" icon-printer text-info" onclick="printAttendance()"></i><span>Print</span></a>
								<a href="#" class="btn btn-link btn-float has-text"><i class="icon-inbox text-teal"></i> <span>Send</span></a>
							</div>
						</div>
					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content" >
					
					<div class="row">
						<div class="col-lg-12">

							<div class="panel panel-flat">
								<div class="panel-heading">
									<h5 class="panel-title">Students' Attendance</h5>
									<div class="heading-elements">
									</div>
								</div>

								<div class="panel-body">

									<div class="row">
										<div class="col-lg-12">
											<div class="col-lg-4">
												<div class="form-group">
													<label><strong>Batch:</strong></label>
													<select class="form-control"></select>
												</div>
											</div>

											<div class="col-lg-4">
												<div class="form-group">
													<label><strong>School:</strong></label>
													<select class="form-control"></select>
												</div>
											</div>

											<div class="col-lg-4">
												<div class="form-group">
													<label><strong>Date:</strong></label>
													<select class="form-control"></select>
												</div>
											</div>
										</div>
									</div>

									<div class="row">
										<div class="col-lg-12">
											<table class="table datatable-html" style='font-size: 13px;' name="table1" id="table1">

												<thead style="font-size: 13px;">
													<tr>
										                <th>Student Name</th>
										                <th>Strand</th>
										                <th style="width: 30%;">Date</th>
										                <th>Time in</th>
										                <th>Time out</th>
										                <th class="text-center">Remarks</th>
										            </tr>
												</thead>

												<tbody style="font-size: 12px;">
													<?php if($results){
														foreach($results as $result){
														?>
										            <tr>
										                <td><?php echo $result['lastName'].', '.$result['firstName'] ;?></td>
										                <td><?php echo $result['strand']?></td>
										                <td><?php echo $result['date']?></td>
										                <td><?php echo $result['time_in']?></td>
										                <td><?php echo $result['time_out']?></td>
														<td class="text-center">
															<?php if($result['remarks'] =="PRESENT"){?>
															<span class='label label-success'><?php echo $result['remarks'];?></span>
															<?php } else {?>
															<span class='label label-danger'><?php echo $result['remarks'];?></span>
															<?php }?>
														</td>
										            </tr>
										            <?php }}?>
										          
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
				<!-- Content area 2 -->

				<!--Content area 2-->
			</div>
			<!-- /Main content -->

		</div>
		<!-- Page content -->

	</div>
	<!-- Page container -->

	<script type="text/javascript">
		    // Warning alert
			$('#table1').dataTable( {
			  "columnDefs": [ {
				"targets": 5,
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

		    function printAttendance(){
		    	window.location = "print.php?file=3";
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
	</script>
</body>
</html>