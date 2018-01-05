<?php
require_once("../config/config.php");
$connect = new Connect();
$provinceQuery = "SELECT * FROM province ORDER BY provinceName";
$provinceResult = $connect->select($provinceQuery);
include("../UI/header/header_admin.php");
?>
			<!-- Main content -->
			<div class="content-wrapper" >
				
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">School Directory</span> - Add School</h4>
						</div>
					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content">
					
					<div class="row">
						<div class="col-lg-12">

							<!-- Basic layout-->
							<form action="centerFunction.php" method="POST" class="form-validate-jquery">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title"><i class="icon-address-book3" style="margin-right: 10px"></i>Add Center</h5>
										<div class="heading-elements">
					                	</div>
									</div>

									<div class="panel-body">
										<div class="row">
											<div class="col-lg-6 col-md-offset-3">
												<div class="form-group">
													<legend class="text-semibold">Center Information </legend>
													<label>Center Name:</label>
													<input type="text" required="required" name="center" class="form-control">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-6 col-md-offset-3">
												<div class="form-group">
													<legend class="text-semibold">Address </legend>
													<label>Province:</label>
													<select class="form-control" id="province" onchange="getCity(this.value)" required="required">
															<option></option>
														<?php if($provinceResult){
															foreach($provinceResult as $province){?>
															<option value="<?php echo $province['idProvince']?>">
																<?php echo $province['provinceName'];?>
															</option>
															<?php }}?>
													</select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-6 col-md-offset-3">
												<div class="form-group">
													<label>City / Municipality:</label>
													<select class="form-control" name="city" id="city" required="required"></select>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-lg-12">
												<div class="text-right">
													<input type="submit" value="Add Center" class="btn bg-primary"/>
												</div>
											</div>
										</div>
									</div>

								</div>
							</form>
							<!-- /basic layout -->

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
	function getCity(val){
		$.ajax({
			type: "POST",
			url: "getCity.php",
			data: 'idProvince=' + val,
			success: function(data){
				$("#city").html(data);
			}
		});
	}
</script>