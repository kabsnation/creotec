<?php
require("../config/config.php");
$connect = new Connect();
$con = $connect->connectDB();
if(isset($_POST['center'])){
	$center = mysqli_real_escape_string($con,stripcslashes(trim($_POST['center'])));
	$city = $_POST['city'];
	$query="INSERT INTO center(centerName,idCity) VALUES('".$center."',".$city.")";
	$result = $connect->insert($query);
	if($result){
		echo "<script>
			window.location='AddCenter.php';
			alert('Success!');
		</script>";
	}
	else{
		echo "<script>
			window.location='AddCenter.php';
			alert('Error Adding center!');
		</script>";
	}
}
else{
	echo "<script>
			window.location='AddCenter.php';
			alert('Please input all fields!');
		</script>";
}

?>