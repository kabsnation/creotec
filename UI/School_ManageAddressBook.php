<?php
include('../config/config.php');
include('../UI/SchoolHandler.php');
$handler = new SchoolHandler();
$results = $handler->getSchool();
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
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Address Book</span> - Manage School Directory</h4>
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
									<h5 class="panel-title">School Directory</h5>
									<div class="heading-elements">
							    	</div>
								</div>

								<div class="panel-body">
									<table class="table datatable-html" style='font-size: 13px;' name="table1" id="table1">

										<thead style="font-size: 13px;">
											<tr>
								                <th>School Name</th>
								                <th>Location</th>
								                <th class="text-center">Actions</th>
								            </tr>
										</thead>

										<tbody style="font-size: 12px;">
											<?php if($results){
												foreach($results as $result){
												?>
								            <tr>
								                <td><?php echo $result['schoolName'];?></td>
								                <td><?php echo $result['cityName'].", ".$result['provinceName'];?></td>
												<td class="text-center">
													<a href="ViewSchool.php?id=<?php echo $result['idSchool'];?>" id="update" name="view" style="color: #2c3e50;"><i class="icon-eye" style="margin-right: 3px;"></i>View</a>
													<a href="School_UpdateSchool.php?id=<?php echo $result['idSchool'];?>" id="update" name="update" style="color: #2980b9"><i class="icon-pencil" style="margin-right: 3px;"></i>Update</a>
													<a href="#" name="sample" id="sample" style="color: #d35400;" onclick="promptDelete(<?php echo $result['idSchool'];?>)"><i class="icon-trash" style="margin-left: 5px; margin-right: 3px;"></i>Delete</a>
															
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
				"targets": 2,
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