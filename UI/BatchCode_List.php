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
</body>
</html>