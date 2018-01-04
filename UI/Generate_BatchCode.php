<?php
require_once('../config/config.php');
require_once('../UI/SchoolHandler.php');
require_once('../UI/StrandHandler.php');
$school = new SchoolHandler();
$strand = new StrandHandler();
$resultSchool = $school->getSchool();
$resultCenter = $school->getCenter();
$resultStrand = $strand->getStrand();
if(isset($_GET['id'])){
	$con = new Connect();
	$conn = $con->connectDB();
	$id = mysqli_real_escape_string($conn,stripcslashes(trim($_GET['id'])));
	$query = "SELECT batch.idbatch, batchCode,centerName, schoolName FROM batch JOIN center ON batch.idCenter = center.idCenter JOIN school_batch ON batch.idbatch = school_batch.idbatch JOIN school ON school_batch.idSchool = school.idSchool where batch.idbatch = ".$id." and batch.markasdeleted = 0";
	$resultt = $con->select($query);
	if($resultt){
		$batchCode ="";
		$centerName ="";
		if($row = mysqli_fetch_array($resultt)){
			$batchCode = $row['batchCode'];
			$centerName = $row['centerName'];
		}
	}
	
}
include('../UI/header/header_admin.php');
?>

	<!-- Page container -->
	<div class="page-container">

		<!-- Page content -->
		<div class="page-content">

			<!-- Main content -->
			<div class="content-wrapper">

				<!-- Content area -->
				<div class="content">
					
					<!-- Wizard with validation -->
		            <div class="panel panel-white" id="generationPanel">
						<div class="panel-heading">
							<div class="text-center">
								<h2 class="panel-title">Generate Batch Code</h6>
									
							</div>
						</div>

	                	<form class="stepy-validation" action="generateBatchCode.php" method="POST" enctype="multipart/form-data" >
							<fieldset title="1">
								<legend class="text-semibold">Choose Center </legend>
								<div class="row">
									<div class="col-lg-6 col-md-offset-3">
										<div class="form-group">
							                <label>Center Location</label>
							                <select class="form-control select2" name="center"  required="required" style="width: 100%;">

							                	<?php if($resultCenter){
							                		foreach($resultCenter as $center){?>
							                  <option value="<?php echo $center['idCenter']?>"><?php echo $center['centerName'];?></option>
							                  <?php }}?>
							                </select>
							              </div>
										<br/>
									</div>
								</div>
							</fieldset>

							<fieldset title="2">
								<legend class="text-semibold">Schools</legend>
								<div class="row">
									<div class="col-lg-12">
										<legend class="text-bold">Choose School </legend>
									</div>
									
									<div class="box">
										<div class="panel-heading">

										</div>
										<input type="text" id="checker" class="label" disabled="true" required="required" name="">
										<div class="panel-body">
											<table class="table datatable-html" style='font-size: 13px;' name="table1" id="table1">

												<thead style="font-size: 13px;">
													<tr>
														<th style="width: 5%;"><input type="checkbox" onchange="addToHidden(this)" name="" id="select-all"></th>
										                <th>School Name</th>
										                <th>Location</th>
										            </tr>
												</thead>

												<tbody style="font-size: 12px;">
													<?php if($resultSchool){
														foreach($resultSchool as $result){
														?>
										            <tr>
										            	<td> <input type="checkbox" name="idschool[]" onchange="addToHidden(this)" value="<?php echo $result['idSchool'];?>" id="idschool"></td>
										                <td><?php echo $result['schoolName'];?></td>
										                <td><?php echo $result['cityName'].", ".$result['provinceName'];?></td>
										            </tr>
										            <?php }}?>
										          
										        </tbody>
											</table>
										</div>
									</div>
											
								</div>
							</fieldset>

							<fieldset title="3">
								<legend class="text-semibold">Alloted Slots</legend>
								<div class="row" style="margin-bottom: 20px;">
									<div class="col-lg-2 col-md-offset-5">
										<?php if($resultStrand){
											foreach($resultStrand as $strand){?>
											<div class="form-group">
										
												<label><?php echo $strand['strand'];?></label>
												<input type="hidden" name="idstrand[]" value="<?php echo $strand['idStrand'];?>">
												<input type="number" name="capacity[]" required="required" class="form-control">
												
											</div>
										<?php }}?>
									</div>
								</div>
							</fieldset>

							<input id="btnSubmit" type="submit" name="btnSubmit" class="btn btn-primary stepy-finish"></input>
						</form>
		            </div>
		            <!-- /wizard with validation -->

		            <div class="col-lg-10 col-md-offset-1" >
			            <div class="panel panel-white" id="generatedPanel" style="display: none">
			            	<div class="panel-heading">
			            		<div class="text-center">
			            			<h2 class="panel-title">Generated Batch Code</h2>
			            		</div>
			            	</div>

			            	<div class="panel-body">
			            		<div class="text-center">
			            			<label><strong>Center name:</strong></label>
			            			<h2 style="margin-top: -5px;"><strong><?php echo $centerName;?></strong></h2>
			            		</div>
			            			
			            		<div class="text-center">
			            			<label><strong>Here's your batch code!</strong></label>
			            			<h1 class="text-warning" style="margin-top: -5px;"><?php echo $batchCode;?></h1>
			            		</div>

			            		<div class="row">
			            			<div class="col-md-12">
			            				<table class="table datatable-html" style="font-size: 13px" id="table2">
			            					<thead>
			            						<th>No.</th>
			            						<th>School Name</th>
			            					</thead>
			            					<tbody>
			            						<?php if($resultt){
			            							$counter = 1;
			            							foreach($resultt as $info){?>
			            						<tr>
			            							<td><?php echo $counter;?></td>
			            							<td><?php echo $info['schoolName']?></td>
			            						</tr>
			            						<?php $counter++;}}?>
			            					</tbody>
			            				</table>
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
<script type="text/javascript">
	$('#table1').DataTable( {
			  "columnDefs": [ {
				"targets": 0,
				"orderable": false
				} ]
			} );
	$('#table2').DataTable( {
			  "columnDefs": [ {
				"targets": 0,
				"orderable": false
				} ]
			} );
	var counter = 0;
	$('#select-all').click(function(event) {   
        if(counter ==0){
            $(':checkbox').each(function() {
                this.checked = true;                        
            });
            counter = 1;
            }
        else{
            $(':checkbox').each(function() {
                    this.checked = false;                        
                });
            counter = 0;
            }
	});
	function addToHidden(checkbox){
		if(checkbox.checked == true){
			document.getElementById('checker').value='true';
		}
		else{
			document.getElementById('checker').value=null;
		}
	}
	function hidePerson() {
		        var x = document.getElementById("generationPanel");
		        var y = document.getElementById("generatedPanel");
		        if(x.style.display === 'display'){
		        	x.style.display = "none";
		        	y.style.display = "block";
		        }
		        else{
		        	x.style.display = "none";
		        	y.style.display = "block";
		        }
		    }
	<?php if(isset($_GET['id'])){?>
		hidePerson();
	<?php }?>
</script>