<?php
require_once('../UI/SchoolHandler.php');
$handler = new SchoolHandler();
if(isset($_POST["batchcode"])){
	$results = $handler -> getSchoolByBatchCode($_POST["batchcode"]);
	?>
	<option></option> 
	<?php
	foreach($results as $result){
		echo '<option value="'.$result["idSchool"].'">'.$result["schoolName"].'</option>';
	}
}
else if(isset($_POST['idSchool'])){
	$results = $handler->deleteSchool($_POST['idSchool']);
	echo $results;
}
?>