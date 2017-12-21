<?php
require_once('../UI/StrandHandler.php');
$handler = new StrandHandler();
if(isset($_POST["batchcode"])){
	$results = $handler -> getStrandByBatchCode($_POST["batchcode"]);

	?>
	<option></option> 
	<?php
	if(mysqli_num_rows($results)>0){
		foreach ($results as $row) {
			$slots[$row["idStrand"]] = (int)$row["capacity"] - (int)$row["counter"];
			if($slots[$row["idStrand"]]>0)
				echo '<option value="'.$row["idStrand"].'">'.$row["strand"].'</option>';
		}
	}
}
?>