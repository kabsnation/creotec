<?php
require_once('../config/config.php');
require_once('../UI/SchoolHandler.php');
require_once('../UI/StrandHandler.php');
$school = new SchoolHandler();
$strand = new StrandHandler();
$resultSchool = $school->getSchool();
$resultCenter = $school->getCenter();
$resultStrand = $strand->getStrand();
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
		            <div class="panel panel-white" id="generattionPanel">
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

		            <div class="col-lg-10 col-md-offset-1">
			            <div class="panel panel-white" id="generatedPanel">
			            	<div class="panel-heading">
			            		<div class="text-center">
			            			<h2 class="panel-title">Generated Batch Code</h2>
			            		</div>
			            	</div>

			            	<div class="panel-body">
			            		<div class="text-center">
			            			<label><strong>Here's your batch code!</strong></label>
			            			<h1 class="text-warning">ABC123</h1>
			            		</div>

			            		<div class="row">
			            			<div class="col-md-12">
			            				<table class="table datatable-html" style="font-size: 13px">
			            					<thead>
			            						<th>No.</th>
			            						<th>School Name</th>
			            					</thead>
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
</script>