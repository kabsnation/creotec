<?php
require_once("../config/config.php");
$connect = new Connect();
$provinceQuery = "SELECT * FROM province ORDER BY provinceName";
$provinceResult = $connect->select($provinceQuery);
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
							<form action="contactPerson.php" method="POST" class="form-validate-jquery">
								<div class="panel panel-flat">
									<div class="panel-heading">
										<h5 class="panel-title"><i class="icon-address-book3" style="margin-right: 10px"></i>Add School</h5>
										<div class="heading-elements">
					                	</div>
									</div>

									<div class="panel-body">
										
										<div class="col-lg-6">
											<fieldset class="content-group">
												<legend class="text-bold">School</legend>
											
												<div class="form-group">
													<label><strong>School Name:</strong><span class="text-danger">*</span> </label>
													<input type="text" class="form-control" name="schoolName" onkeyup="yeah(this)" required="required" />
												</div>

											</fieldset>
										</div>

										<div class="col-lg-6">
											<fieldset class="content-group">
												<legend class="text-bold">School Address</legend>

												<div class="form-group">
													<label><strong>Province:</strong><span class="text-danger">*</span> </label>
													<select type="text" class="form-control select" onchange="getCity(this.value)" required="required"/>
													<option value=""></option>
														<?php foreach($provinceResult as $province){?>
														<option value="<?php echo $province['idProvince'];?>"><?php echo $province['provinceName'];?></option>
														<?php }?>
													</select> 
												</div>

												<div class="form-group">
													<label><strong>City / Municipality:</strong><span class="text-danger">*</span> </label>
													<select type="text" name="city" id="city" class="form-control select" required="required"/></select> 
												</div>

												<!-- <legend class="text-bold">Contact Person Details</legend>
											
												<div class="form-group">
													<label><strong>Contact Person:</strong><span class="text-danger">*</span> </label>
													<input type="text" class="form-control" required="required"/>
												</div>

												<div class="form-group">
													<label><strong>Designation:</strong><span class="text-danger">*</span> </label>
													<input type="text" class="form-control" required="required"/>
												</div>

												<div class="form-group">
													<label><strong>Cellphone Number:</strong><span class="text-danger">*</span> </label>
													<input id="contactNumber" name="contactNumber" required="required"="required="required"" class="form-control" data-mask="(+63) 999-999-9999" placeholder="(+63) 999-999-9999">
												</div>

												<div class="form-group">
													<label><strong>Telephone Number:</strong><span class="text-danger">*</span> </label>
													<input data-mask="(+99)-9999999" placeholder="(+99)-9999999" class="form-control" required="required"/>
												</div>

												<div class="form-group">
													<label><strong>Email Address:</strong><span class="text-danger">*</span> </label>
													<input type="email" class="form-control" required="required"/>
												</div> -->
											</fieldset>
										</div>

										<div class="col-lg-12">
											<fieldset class="content-group">
												<legend class="text-bold">Add School Contact Person</legend>

												<div class="col-lg-12" style="margin-bottom: 10px">
													<div class="text-right">
														<button type="button" class="btn btn-default" data-target="#modal_AddContactPerson" data-toggle="modal"><i class="icon-phone-plus2 position-left"></i>Add</button>
													</div>
												</div>
												
												<div class="col-lg-12">
													<table class="table datatable-html" style="font-size: 13px;" name="table1" id="table1">
														<thead style="font-size: 13px;">
															<tr>
												                <th>Name</th>
												                <th>Designation</th>
												                <th>Cellphone Number</th>
												                <th>Telephone Number</th>
												                <th>Fax Number</th>
												                <th>Email Address</th>
												                <th class="text-center">Actions</th>
												            </tr>
														</thead>
													</table>
												</div>
											</fieldset>
										</div>

										<div class="text-right">
											<button type="reset" class="btn btn-default" id="reset">Reset <i class="icon-reload-alt position-right"></i></button>
											<input type="submit" class="btn btn-primary" Text="Submit"></input>
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

    <!-- Small modal -->
	<div id="modal_AddContactPerson" class="modal fade">
		<div class="modal-dialog modal-md">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h5 class="modal-title">Add Contact Person</h5>
				</div>

				<div class="modal-body">
					<form id="contactPerson" class="form-validate-jquery" >
						<div class="row">
							<div class="col-lg-12">
								<legend class="text-bold">Contact Person Details</legend>
								<div class="col-lg-6">
									<legend class="text-bold">Contact Person</legend>
									<div class="form-group">
										<label><strong>Contact Person:</strong><span class="text-danger">*</span> </label>
										<input id="txtContactPerson" name="txtContactPerson" type="text" class="form-control" required="required"/>
									</div>

									<div class="form-group">
										<label><strong>Designation:</strong><span class="text-danger">*</span> </label>
										<input id="txtDesignation" name="txtDesignation" type="text" class="form-control" required="required"/>
									</div>
								</div>

								<div class="col-lg-6">
									<legend class="text-bold">Contact Information</legend>
									<div class="form-group">
										<label><strong>Cellphone Number:</strong><span class="text-danger">*</span> </label>
										<input id="txtContactNumber" name="txtContactNumber" required="required" class="form-control" data-mask="(+63)999-999-9999" placeholder="(+63)999-999-9999">
									</div>

									<div class="form-group">
										<label><strong>Telephone Number:</strong><span class="text-danger">*</span> </label>
										<input id="txtTelephoneNumber" name="txtTelephoneNumber" data-mask="(+99) 9999999" placeholder="(+99) 9999999" class="form-control" required="required"/>
									</div>

									<div class="form-group">
										<label><strong>Fax Number:</strong></label>
										<input id="txtFaxNumber" name="txtFaxNumber" data-mask="(+99) 9999999" placeholder="(+99) 9999999" class="form-control"/>
									</div>

									<div class="form-group">
										<label><strong>Email Address:</strong><span class="text-danger">*</span> </label>
										<input id="txtEmailAddress" name="txtEmailAddress" type="email" class="form-control" required="required"/>
									</div>
								</div>
							</div>
						</div>
					
				</div>

					<div class="modal-footer">
						<input type="button" onclick="addToContactTable(txtContactPerson.value,txtDesignation.value,txtContactNumber.value,txtTelephoneNumber.value,txtFaxNumber.value,txtEmailAddress.value)" class="btn btn-default" value="Submit"></input>
					</div>

				</form>
			</div>
		</div>
	</div>
	<!-- /small modal -->

</body>
</html>

<script type="text/javascript">

	function addToContactTable(contactPerson,designation,contactNumber,telephoneNumber,faxNumber,emailAddress){
		var n = emailAddress.search("@");

		if(contactPerson!=""&&designation!=""&&contactNumber!=""&&telephoneNumber!=""&&emailAddress!=""&&n!=0){
				var table = $('#table1').DataTable();
				var cPerson ="<td><input type='hidden' value= "+contactPerson+" name='contactPerson[]'>"+contactPerson+"</td>";
				var dDesignation = "<td><input type='hidden' value= "+designation+" name='designation[]' >"+designation+"</td>";
				var cNumber = "<td><input type='hidden' value= "+contactNumber+" name='contactNumber[]' >"+contactNumber+"</td>";
				var tNumber = "<td><input type='hidden' value= "+telephoneNumber+" name='telephoneNumber[]' >"+telephoneNumber+"</td>";
				var fNumber = "<td><input type='hidden' value= "+faxNumber+" name='faxNumber[]' >"+faxNumber+"</td>";
				var eAddress = "<td><input type='hidden' value= "+emailAddress+" name='emailAddress[]' >"+emailAddress+"</td>";
				var action = "<a name='sample' id='sample' style='color: #d35400'><i class='icon-trash'></i>Delete</a>";
				table.row.add([cPerson,dDesignation,cNumber,tNumber,fNumber,eAddress, action]).draw(false);
				$('#modal_AddContactPerson').modal('hide');
			}
	}
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
	var myTable = $('#table1').DataTable();
	$('#table1').on("click", "a", function(){
            console.log($(this).parent());
            myTable.row($(this).parents('tr')).remove().draw(false);
      });
</script>