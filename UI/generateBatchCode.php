<?php
require_once("../config/config.php");
require_once("../UI/StrandHandler.php");
if(isset($_POST['idschool'])){
	$connect = new Connect();
	$con = $connect->connectDB();
	$handler = new StrandHandler();
	$center = mysqli_real_escape_string($con,stripcslashes(trim($_POST['center'])));
	$batchCode = $handler->generateRandomString();
	//insert to batch
	$query="INSERT INTO batch(batchCode,idCenter) VALUES('".$batchCode."',".$center.")";
	$batchId = $connect->insertWithLastId($query);
	$arr = sizeof($_POST['idstrand']);
	if($batchId!=""){
		//insert to schoolbatch
		foreach($_POST['idschool'] as $school){
			$query="INSERT INTO school_batch(idbatch,idSchool) VALUES(".$batchId.",".$school.")";
			$result = $connect->insert($query);
		}
		if($result){
			//insert to slots
			for($i=0;$i< $arr ;$i++){
				$query="INSERT INTO slots(idbatch,idStrand,capacity) VALUES(".$batchId.",".$_POST['idstrand'][$i].",".$_POST['capacity'][$i].")";
				$result = $connect->insert($query);
			}
				if($result){
					echo "<script>alert('Success! Batch Code: ".$batchCode."'); window.location='Generate_BatchCode.php?id=".$batchId.";</script>";
				}
		}
	}
}
else if(isset($_POST['id'])){
	$con = new Connect();
	$query = "UPDATE batch SET markasdeleted = 1 WHERE idbatch =".$_POST['id'];
	$result = $con->insert($query);
}

?>