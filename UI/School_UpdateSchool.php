<?php
include('../config/config.php');
include('../UI/SchoolHandler.php');
if(!isset($_GET['id']) && !isset($_GET['idPerson'])){
	echo "<script>window.location='School_ManageAddressBook.php'</script>";
}
else if(isset($_GET['id']) || isset($_GET['idPerson'])){
	$handler = new SchoolHandler();
	$con = new Connect();
	$idPerson= "";
	$id = "";
	$resultContactPerson="";
	$resultSchool = "";
	$resultPerson = "";
	$contactPerson ="";
	$query = "";
	$connect = $con->connectDB();
	if(isset($_GET['id']) && !isset($_GET['idPerson'])){
		$id = mysqli_real_escape_string($connect,stripcslashes(trim($_GET['id'])));
		$query = 'SELECT * FROM province ORDER BY provinceName';
		$provinceResult = $con->select($query);
		$resultContactPerson = $handler->getContactPersonBySchoolId($id);
		$resultSchool = $handler->getSchoolById($id);
		echo "<style type='text/css'>
			    #editPerson{
				 display: none
				}
				#viewSchool{
				 display: block
				}
			 </style>";
	}
	if(isset($_GET['idPerson']) && isset($_GET['idPerson'])){
		$idPerson =mysqli_real_escape_string($connect,stripcslashes(trim($_GET['idPerson'])));
		$resultPerson = $handler->getContactPersonById($idPerson);
		echo "<style type='text/css'>
			    #editPerson{
				 display: block
				}
				#viewSchool{
				 display: none
				}
			 </style>";
	}
}
include('../UI/header/header_admin.php');
?>

			<!-- Main content -->
			<div class="content-wrapper" >
				<!-- Page header -->
				<div class="page-header page-header-default">
					<div class="page-header-content">
						<div class="page-title">
							<h4> <span class="text-semibold">Address Book</span> - Manage School Directory</h4>
						</div>
					</div>
				</div>
				<!-- /page header -->

				<!-- Content area -->
				<div class="content" >
					
					<div class="row">
						<div class="col-lg-12">
							<div class="panel panel-flat" name="viewSchool" id="viewSchool">
								<div class="panel-heading">
									<h5 class="panel-title">School Details</h5>
									<div class="heading-elements">
							    	</div>
								</div>

								<div class="panel-body">
									<div class="col-lg-12">
										<fieldset class="content-group">
											<?php if($resultSchool != null){
												foreach($resultSchool as $school){?>
									</div>

									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>School Name:</strong></label>

                                                <div id="SchoolName" class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="<?php echo $school['schoolName'];?>" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button class="btn btn-primary" id="btn1" onclick="HideEventListPanel(this)"><i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button> 
                                                    </div>
                                                    <div id="msg">
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
  
                                        <div id="editSchoolName" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
                                            	<label><span class="text-danger">* </span><strong>New School Name:</strong></label>
                                            	 <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" id="newSchoolName" name="newSchoolName">
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<a class="btn btn-danger" onclick="HideEventListPanel(this)">Cancel</a>
                                                    	<a class="btn btn-primary" onclick="updateSchoolName(<?php echo $id?>)"><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                    	<div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>School Address:</strong></label>

                                                <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="<?php echo $school['cityName'].", ".$school['provinceName'];?>" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button id="btn2" class="btn btn-primary" onclick="HideEventListPanel1(this)" style="margin-left: -15px;"><i style="margin-right: 5px;" class="icon-pencil"></i>Edit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="editSchoolAddress" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
												<label><strong>New Province:</strong><span class="text-danger">*</span> </label>
												<select name="dropdownProv" id="dropdownProv" class="form-control select" onchange="getCity(this.value)"/>
													<option></option>
													<?php foreach($provinceResult as $province){?>
													<option value="<?php echo $province['idProvince'];?>" onchange="getCity(this.value)"><?php echo $province['provinceName'];?></option>
													<?php }?>
												</select> 
											</div>

											<div class="form-group">
												<label><strong>New City / Municipality:</strong><span class="text-danger">*</span> </label>
												<select name="dropdownCity" id="dropdownCity" class="form-control select" /></select> 
											</div>

											<div class="form-group">
												<div class="text-right">
													<a class="btn btn-danger" onclick="HideEventListPanel1(this)">Cancel</a>
		                                        	<a class="btn btn-primary" onclick="updateSchoolAdd(<?php echo $id?>)"><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
												</div>
											</div>
	                                    </div>

										</br>
											<div class="col-lg-12">
											<table class="table datatable-html" style='font-size: 13px;' name="tablePreview" id="tablePreview">

												<thead style="font-size: 13px;">
													<tr>
										                <th>Contact Person</th>
										                <th>Designation</th>
										                <th>Cellphone Number</th>
										                <th>Telephone Number</th>
										                <th>Fax Number</th>
										                <th>Email Address</th>
										                <th class="text-center">Actions</th>
										            </tr>
												</thead>
												<tbody style="font-size: 13px;">
													<?php if($resultContactPerson){
													 foreach($resultContactPerson as $person){?>
													
													<tr>
														<td><?php echo $person['contactName'];?></td>
														<td><?php echo $person['designation'];?></td>
														<td><?php echo $person['cellphoneNumber'];?></td>
														<td><?php echo $person['telephoneNumber'];?></td>
														<td><?php echo $person['faxNumber'];?></td>
														<td><?php echo $person['emailAddress'];?></td>
														<td class="text-center">
															<ul class="icons-list">
														<li class="dropdown">
															<a href="#" class="dropdown-toggle" data-toggle="dropdown">
																<i class="icon-menu9"></i>
															</a>
															<ul class="dropdown-menu dropdown-menu-right">
																<li><a href='School_UpdateSchool.php?id=<?php echo $_GET['id']?>&idPerson=<?php echo $person['idcontactPerson'];?>' name='sample' id='sample'><i class='icon-pencil' style="margin-left: 5px; margin-right: 3px;"></i>Edit</a></li>
																<li><a href="#" name="sample" id="sample"  onclick="promptDelete1(<?php echo $person['idcontactPerson'];?>)"><i class="icon-trash" style="margin-left: 5px; margin-right: 3px;"></i>Delete</a></li>
															</ul>
														</li>
													</ul>

														
													</td>
													</tr>
													<?php }}}} ?>
												</tbody>
											</table>
										</fieldset>
									</div>

								</div>
							</div>

							<div class="panel panel-flat" name="editPerson" id="editPerson">
								<div class="panel-heading">
									<h5 class="panel-title"><a href="School_UpdateSchool.php?id=<?php echo $_GET['id']?>" class="btn-link"><i class="icon-arrow-left52 position-left"></i></a>Contact Person Details</h5>
									<div class="heading-elements">
							    	</div>
								</div>

								<div class="panel-body">
									<?php
													foreach($resultPerson as $result){
												?>
									<div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>Contact Person Name:</strong></label>

                                                <div id="SchoolName" class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="<?php echo $result["contactName"];?>" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button id="btn3" class="btn btn-primary" onclick="HideEventListPanel2(this)"><i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
 
                                        <div id="editContactPersonName" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
                                            	<label><span class="text-danger">* </span><strong>New Contact Person Name:</strong></label>
                                            	 <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" id="contactName" value="" />
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<a class="btn btn-danger" onclick="HideEventListPanel2(this)">Cancel</a>
                                                    	<a class="btn btn-primary" onclick="updateContactPersonName(<?php echo $idPerson?>)"><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>Designation:</strong></label>

                                                <div id="SchoolName" class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="<?php echo $result["designation"];?>" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button id="btn4" class="btn btn-primary" onclick="HideEventListPanel3(this)"><i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
  
                                        <div id="editDesignation" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
                                            	<label><span class="text-danger">* </span><strong>New Designation:</strong></label>
                                            	 <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" id="designation" value="" />
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<a class="btn btn-danger" onclick="HideEventListPanel3(this)">Cancel</a>
                                                    	<a class="btn btn-primary" onclick="updateContactDesignation(<?php echo $idPerson?>)"><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>Cellphone Number:</strong></label>

                                                <div id="SchoolName" class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="<?php echo $result["cellphoneNumber"];?>" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button id="btn5" class="btn btn-primary" onclick="HideEventListPanel4(this)"><i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
  
                                        <div id="editCellphoneNumber" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
                                            	<label><span class="text-danger">* </span><strong>New Cellphone Number:</strong></label>
                                            	 <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" id="cell" data-mask="(+63) 999-999-9999" placeholder="(+63) 999-999-9999" />
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<a class="btn btn-danger" onclick="HideEventListPanel4(this)">Cancel</a>
                                                    	<a class="btn btn-primary" onclick="updateContactCell(<?php echo $idPerson?>)"><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>Telephone Number:</strong></label>

                                                <div id="SchoolName" class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="<?php echo $result["telephoneNumber"];?>" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button id="btn6"  class="btn btn-primary" onclick="HideEventListPanel5(this)"><i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
  
                                        <div id="editTelephoneNumber" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
                                            	<label><span class="text-danger">* </span><strong>New Telephone Number:</strong></label>
                                            	 <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" id="tele" data-mask="(+99) 9999999" placeholder="(+99) 9999999" value="" />
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<a class="btn btn-danger" onclick="HideEventListPanel5(this)">Cancel</a>
                                                    	<a class="btn btn-primary" onclick="updateContactTele(<?php echo $idPerson?>)"><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>Fax Number:</strong></label>

                                                <div id="SchoolName" class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="<?php echo $result["faxNumber"];?>" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button id="btn7" class="btn btn-primary" onclick="HideEventListPanel6(this)"><i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
  
                                        <div id="editFaxNumber" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
                                            	<label><span class="text-danger">* </span><strong>New Fax Number:</strong></label>
                                            	 <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" id="fax"  data-mask="(+99) 9999999" placeholder="(+99) 9999999" value="" />
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<a class="btn btn-danger" onclick="HideEventListPanel6(this)">Cancel</a>
                                                    	<a class="btn btn-primary" onclick="updateContactFax(<?php echo $idPerson?>)"><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label><span class="text-danger">* </span><strong>Email Address:</strong></label>

                                                <div id="SchoolName" class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input class="form-control" value="<?php echo $result["emailAddress"];?>" disabled="true"/>
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<button id="btn8" class="btn btn-primary" onclick="HideEventListPanel7(this)"><i class="icon-pencil" style="margin-right: 5px;"></i>Edit</button>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
  
                                        <div id="editEmailAddress" class="col-md-6" style="display: none;">
                                        	<div class="form-group">
                                            	<label><span class="text-danger">* </span><strong>New Email Address:</strong></label>
                                            	 <div class="input-group content-group">
                                                    <div class="has-feedback has-feedback-left">
                                                    	<input type="email" id="email" class="form-control" value="" />
                                                        <div class="form-control-feedback">
                                                        </div>
                                                    </div>

                                                    <div class="input-group-btn">
                                                    	<a class="btn btn-danger" onclick="HideEventListPanel7(this)">Cancel</a>
                                                    	<a class="btn btn-primary" onclick="updateContactEmail(<?php echo $idPerson?>)"><i class="icon-pencil" style="margin-right: 5px;"></i>Save</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
													}
												?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Content area -->
				<!-- Content area 2 -->
				<div id="addContactPerson">
					
				</div>
				<!--Content area 2-->
			</div>
			<!-- /Main content -->

		</div>
		<!-- Page content -->
	</div>
	<!-- Page container -->
	 <!-- Small modal -->
	
	<!-- /small modal -->
	<script type="text/javascript">
		    // Warning alert
		    $('#tablePreview').dataTable( {
			  "columnDefs": [ {
				"targets": 6,
				"orderable": false
				} ]
			} );

			function alertSuccess(){
		    	swal({
    				title: "Success!",
    				text: "Redirecting your page...",
    				confirmButtonColor: "#66BB6A",
		            type: "success"
    			});
		    }

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

		    function promptDelete1(val){
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
		        			deletePerson(val);
		        		}
		        });
		    }
		    function deletePerson(val){
			    	$.ajax({
					type: "POST",
					url: "deletePerson.php",
					data: 'idPerson=' + val,
					success: function(data){
						window.location ='School_UpdateSchool.php?id=<?php echo $_GET["id"];?>';
					}
				});
		    }
		    function getCity(val){
				$.ajax({
					type: "POST",
					url: "getCity.php",
					data: 'idProvince=' + val,
					success: function(data){
						$("#dropdownCity").html(data);
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
		    //updateeee name
		    function updateSchoolName(id){
		    	var val = document.getElementById('newSchoolName').value;
		    	$.ajax({
					type: "POST",
					url: "updateSchoolFunction.php",
					data: "idSchool=" + id +"&schoolName="+val,
					success: function(data){
						swal({
					            title: "Success!",
					            text: "The information has been updated.",
					            confirmButtonColor: "#66BB6A",
					            type: "success"
					    });
						setTimeout(function() {
								window.location ='School_UpdateSchool.php?id='+id;
						}, 1000);
					}
				});
		    }

		    //updateeee add
		    function updateSchoolAdd(id){
		    	var city = document.getElementById('dropdownCity').value;
		    	$.ajax({
					type: "POST",
					url: "updateSchoolFunction.php",
					data: "idSchool=" + id +"&city="+city,
					success: function(data){
						swal({
					            title: "Success!",
					            text: "The information has been updated.",
					            confirmButtonColor: "#66BB6A",
					            type: "success"
					        });
						setTimeout(function() {
								window.location ='School_UpdateSchool.php?id='+id;
						}, 1000);
					}


				});
		    }
		     //updateeee name
		    function updateContactPersonName(id){
		    	var val = document.getElementById('contactName').value;
		    	$.ajax({
					type: "POST",
					url: "updateSchoolFunction.php",
					data: "idContactPerson=" + id +"&Cname="+val,
					success: function(data){
						window.location ='School_UpdateSchool.php?id=<?php echo $id?>&idPerson='+id;
					}
				});
		    }
		     //updateeee designation
		    function updateContactDesignation(id){
		    	var val = document.getElementById('designation').value;
		    	$.ajax({
					type: "POST",
					url: "updateSchoolFunction.php",
					data: "idContactPerson=" + id +"&Cdes="+val,
					success: function(data){
						window.location ='School_UpdateSchool.php?id=<?php echo $id?>&idPerson='+id;
					}
				});
		    }
		     //updateeee cell
		    function updateContactCell(id){
		    	var val = document.getElementById('cell').value;
		    	$.ajax({
					type: "POST",
					url: "updateSchoolFunction.php",
					data: "idContactPerson="+id+"&Ccell="+val,
					success: function(data){
						window.location ='School_UpdateSchool.php?id=<?php echo $id?>&idPerson='+id;
					}
				});
		    }
		     //updateeee tele
		    function updateContactTele(id){
		    	var val = document.getElementById('tele').value;
		    	$.ajax({
					type: "POST",
					url: "updateSchoolFunction.php",
					data: "idContactPerson="+id+"&Ctele="+val,
					success: function(data){
						window.location ='School_UpdateSchool.php?id=<?php echo $id?>&idPerson='+id;
					}
				});
		    }
		     //updateeee fax
		    function updateContactFax(id){
		    	var val = document.getElementById('fax').value;
		    	$.ajax({
					type: "POST",
					url: "updateSchoolFunction.php",
					data: "idContactPerson="+id+"&Cfax="+val,
					success: function(data){
						window.location ='School_UpdateSchool.php?id=<?php echo $id?>&idPerson='+id;
					}
				});
		    }
		     //updateeee email
		    function updateContactEmail(id){
		    	var val = document.getElementById('email').value;
		    	$.ajax({
					type: "POST",
					url: "updateSchoolFunction.php",
					data: "idContactPerson="+id+"&Cemail="+val,
					success: function(data){
						window.location ='School_UpdateSchool.php?id=<?php echo $id?>&idPerson='+id;
					}
				});
		    }
		    function showDiv(){
		    	var x = document.getElementById('viewSchool');
		    	var y = document.getElementById('editPerson');
		    	x.style.display = "none";
		    	y.style.display = "block";
		    }

		    function HideEventListPanel() {
		        var x = document.getElementById("editSchoolName");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		           $('#btn1').prop('disabled', true);
		        } else {
		            x.style.display = "none";
		           $('#btn1').prop('disabled', false);
		        }
		    }

		    function HideEventListPanel1() {
		        var x = document.getElementById("editSchoolAddress");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		            $('#btn2').prop('disabled', true);
		        } else {
		            x.style.display = "none";
		            $('#btn2').prop('disabled', false);
		        }
		    }

		    function HideEventListPanel2() {
		        var x = document.getElementById("editContactPersonName");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		            $('#btn3').prop('disabled', true);
		        } else {
		            x.style.display = "none";
		            $('#btn3').prop('disabled', false);
		        }
		    }

		    function HideEventListPanel3() {
		        var x = document.getElementById("editDesignation");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		            $('#btn4').prop('disabled', true);
		        } else {
		            x.style.display = "none";
		            $('#btn4').prop('disabled', false);
		        }
		    }

		    function HideEventListPanel4() {
		        var x = document.getElementById("editCellphoneNumber");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		            $('#btn5').prop('disabled', true);
		        } else {
		            x.style.display = "none";
		            $('#btn5').prop('disabled', false);
		        }
		    }

		    function HideEventListPanel5() {
		        var x = document.getElementById("editTelephoneNumber");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		            $('#btn6').prop('disabled', true);
		        } else {
		            x.style.display = "none";
		            $('#btn6').prop('disabled', false);
		        }
		    }

		    function HideEventListPanel6() {
		        var x = document.getElementById("editFaxNumber");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		            $('#btn7').prop('disabled', true);
		        } else {
		            x.style.display = "none";
		            $('#btn7').prop('disabled', false);
		        }
		    }

		    function HideEventListPanel7() {
		        var x = document.getElementById("editEmailAddress");
		        if (x.style.display === "none") {
		            x.style.display = "block";
		            $('#btn8').prop('disabled', false);
		        } else {
		            x.style.display = "none";
		            $('#btn8').prop('disabled', false);
		        }
		    }

		    function hidePerson() {
		        var x = document.getElementById("editPerson");
		        var y = document.getElementById("viewSchool");
		        if(x.style.display === 'display'){
		        	x.style.display = "none";
		        	y.style.display = "block";
		        }
		        else{
		        	x.style.display = "none";
		        	y.style.display = "block";
		        }
		    }

		    function hideDiv(){
		    	var x = document.getElementById('viewSchool');
		    	var y = document.getElementById('editPerson');
		    	x.style.display = "block";
		    	y.style.display = "none";
		    }
	</script>
</body>
</html>