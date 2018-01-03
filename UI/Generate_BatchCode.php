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
		            <div class="panel panel-white">
						<div class="panel-heading">
							<div class="text-center">
								<h2 class="panel-title">Generate Batch Code</h6>
									
							</div>
						</div>

	                	<form class="stepy-validation" action="#" method="POST" enctype="multipart/form-data">
	                		<input name="batchcode" id="batchcode"  type="hidden" required class="form-control" value="<?php echo $batchcode ?>">
							<fieldset title="1">
								<legend class="text-semibold">Choose Center </legend>
								<div class="row">
									<div class="col-lg-6 col-md-offset-3">
										<div class="form-group">
							                <label>Center Location</label>
							                <select class="form-control select2" name="center" style="width: 100%;">
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
									<div class="col-lg-12"><legend class="text-bold">Choose School </legend></div>
									
									<div class="box">
										<div class="panel-heading">

									<div class="heading-elements">

									
						    	</div>

								</div>

								<div class="panel-body">
									<table class="table datatable-html" style='font-size: 13px;' name="table1" id="table1">

										<thead style="font-size: 13px;">
											<tr>
												<th style="width: 5%;"><input type="checkbox" name="" id="select-all"></th>
								                <th>School Name</th>
								                <th>Location</th>
								            </tr>
										</thead>

										<tbody style="font-size: 12px;">
											<?php if($resultSchool){
												foreach($resultSchool as $result){
												?>
								            <tr>
								            	<td> <input type="checkbox" name="idschool[]" value="<?php echo $result['idSchool'];?>" id="idschool"></td>
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
									<div class="col-lg-6 col-md-offset-3">
										<?php if($resultStrand){
											foreach($resultStrand as $strand){?>
											<div class="form-group">
										
												<label><?php echo $strand['strand'];?></label>
												<input type="text" name="strand[]" class="form-control">
												
											</div>
										<?php }}?>
									</div>
								</div>
							</fieldset>

							

							<button id="btnSubmit" name="btnSubmit" data-toggle="modal"  data-target="#exampleModal" class="btn btn-primary stepy-finish">Submit <i class="icon-check position-right"></i></button>

					<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-hidden="true">
						<div class="modal-dialog" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title"></h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
							<div class="modal-body">
								<center><h3> Generated Batch Code: </h3></center>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-primary">Save changes</button>
								<button type="button" class="btn btn-secondary" data-dismiss="modal"> Close</button>
							</div>
						</div>
					</div>
				</div>


						</form>
		            </div>
		            <!-- /wizard with validation -->

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
</script>