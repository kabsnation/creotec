<?php 
require_once('../config/config.php');
require_once('../UI/StrandHandler.php');
$connect = new Connect();
$con = $connect-> connectDB();
$queryAccount="";
$idbatch="";
$idstrand ="";
$queryBatch = "SELECT batch.idbatch, capacity, (select count(*) as count from applicants as a WHERE a.idbatch = batch.idbatch AND a.idstrand = strand.idstrand) as counter, strand, strand.idStrand FROM slots JOIN strand ON strand.idstrand = slots.idstrand JOIN batch ON batch.idbatch = slots.idbatch WHERE capacity != 0";
$resultBatch = $connect->select($queryBatch);
if(isset($_GET['idbatch'])&&isset($_GET['idstrand'])){
	$idbatch = mysqli_real_escape_string($con,stripcslashes(trim($_GET['idbatch'])));
	$idstrand = mysqli_real_escape_string($con,stripcslashes(trim($_GET['idstrand'])));
	$queryAccount = "SELECT idapplicant, firstName, LastName, middleName, genderName , batch.idbatch, schoolName, strand, targetCourse, batchCode 
	FROM accountinformation, applicants, batch,gender,targetcourse, school, strand
	where applicants.idAccountInformation=accountinformation.idAccountInformation  
	and applicants.idStrand=strand.idStrand and applicants.idBatch=batch.idBatch 
	and applicants.idtargetcourse=targetcourse.idtargetcourse 
	and applicants.idSchool=school.idSchool and gender.idGender = accountinformation.idGender and batch.idbatch= ".$idbatch. "  and applicants.idStrand = ".$idstrand." ORDER BY applicants.idAccountInformation";
}
else{
	foreach ($resultBatch as $batch) {
		$queryAccount = "SELECT idapplicant, firstName, LastName, middleName, genderName , batch.idbatch, schoolName, strand, targetCourse, batchCode 
	FROM accountinformation, applicants, batch,gender,targetcourse, school, strand
	where applicants.idAccountInformation=accountinformation.idAccountInformation  
	and applicants.idStrand=strand.idStrand and applicants.idBatch=batch.idBatch 
	and applicants.idtargetcourse=targetcourse.idtargetcourse 
	and applicants.idSchool=school.idSchool and gender.idGender = accountinformation.idGender and batch.idbatch= ".$batch['idbatch']. " ORDER BY applicants.idAccountInformation";	
		break;
	}
}
$queryStrand = "SELECT * FROM Strand ORDER BY strand";
$resultStrand = $connect->select($queryStrand);
$resultsAccount= $connect->select($queryAccount);
include('../UI/header/header_admin.php');
?>
<form action="printMasterlist.php" method="POST">
			<!-- Main content -->
			<div class="content-wrapper">
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Student Directory</span> </h4>
						</div>

						<div class="heading-elements">
							<div class="heading-btn-group">
								<input type="submit" name="" value="Print" class="btn btn-primary">
							</div>
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
									<h5 class="panel-title">Student Masterlist</h5>
								</div>

								<div class="panel-body">
									<div class="col-lg-12">
										<div class="row">

											<div class="col-lg-3">
												<div class="form-group">
													<label>Batch: </label>					                 
													<select class="form-control" id="batch" name="batch" onchange="getMasterlist(this.value,strand.value);">
														<?php $tempo;
															foreach($resultBatch as $batch){
																if($tempo != $batch['idbatch']){
																	$tempo = $batch['idbatch'];
																	if($idbatch==$batch['idbatch']){
															?>
															<option value="<?php echo $batch['idbatch'];?>" selected><?php echo $batch['idbatch'];?></option>
															<?php }else {?>
															<option value="<?php echo $batch['idbatch'];?>"><?php echo $batch['idbatch'];?></option>
															<?php }}}?>
									                </select>
									            </div>
											</div>

											<div class="col-lg-3">
												<div class="form-group">
													<label>Strand: </label>
									                <select class="form-control" id="strand" name="strand" onchange="getMasterlist(batch.value,this.value);">
														<?php
															foreach($resultStrand as $strand){
																if($idstrand==$strand['idStrand']){
															?>
															<option value="<?php echo $strand['idStrand'];?>" selected><?php echo $strand['strand']?></option>
															<?php }
															else{?>
															<option value="<?php echo $strand['idStrand'];?>"><?php echo $strand['strand']?></option>
															<?php }}?>
									                </select>
												</div>
											</div>
											
										</div>
									</div>
									

									<table class="table datatable-html" name="table1" id="table1">

										<thead style="font-size: 14px;">
											<tr>
								                <th>Trainee ID</th>
								                <th>Name</th>
								                <th>School</th>
								                <th>Gender</th>
								                <th>Target Course</th>
								            </tr>
										</thead>

										<tbody style="font-size: 13px;">
										<?php foreach($resultsAccount as $result){
												?>
								            <tr>
								            	<input type="hidden" name="batchNumber" value="<?php echo $result['idbatch'];?>">
								            	<input type="hidden" name="strand" value="<?php echo $result['strand'];?>">
								                <td><input type="hidden" name="id[]" value="<?php echo $result['idapplicant'];?>"><?php echo $result['idapplicant'];?></td>
								                <td><input type="hidden" name="name[]" value="<?php echo $result['LastName'].', '.$result['firstName'].' '.$result['middleName'] ;?>"><?php echo $result['LastName'].', '.$result['firstName'].' '.$result['middleName'] ;?></td>
								                <td><input type="hidden" name="schoolName[]" value="<?php echo $result['schoolName'];?>"><?php echo $result['schoolName'];?></td>
								                <td><input type="hidden" name="gender[]" value="<?php echo $result['genderName'];?>"><?php echo $result['genderName'];?></td>
								                <td><input type="hidden" name=""><?php echo $result['targetCourse'];?></td>
												
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
</form>
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
		    $('#table1').DataTable( {
			  "columnDefs": [ {
				"targets": 2,
				"orderable": true
				} ]
			} );
			function getMasterlist(valBatch,valStrand){
				window.location = "Student_ManageStudent.php?idbatch="+valBatch+"&idstrand="+valStrand;
			}
	</script>
</body>
</html>