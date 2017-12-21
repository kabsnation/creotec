<?php
require("../UI/StudentHandler.php");
$handler = new StudentHandler();
$conn = new Connect();
$con = $conn->connectDB();
if(isset($_POST['idbatch'])){
	$idbatch = mysqli_real_escape_string($con,stripcslashes(trim($_POST['idbatch'])));
	$idstrand = mysqli_real_escape_string($con,stripcslashes(trim($_POST['idstrand'])));
	$result = $handler->getStudentsByBatchAndStrand($idbatch,$idstrand);
	foreach ($result as $res) {
		echo $res['batchCode'];
	}
}
?>