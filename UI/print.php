<?php 
if(isset($_GET["file"])){
	$file = "";
	//enrollment voucher
	if($_GET["file"] == 1){
		$file = "\\xampp\\htdocs\\creotec1\\images\\RegistrationForm.pdf";
	}
	//masterlist
	elseif($_GET["file"] == 2){
		$file = "\\xampp\\htdocs\\creotec1\\images\\Masterlist.pdf";
	}
	//attendance
	elseif($_GET["file"] == 3){
		$file = "\\xampp\\htdocs\\creotec1\\images\\StudentsAttendance.pdf";
	}
	 else{
		echo '<script type="text/javascript">
	      	alert("Error! File not found!");
		  </script>';
	}

	if (file_exists($file)) {
	    header('Content-Description: File Transfer');
	    header('Content-Type: application/octet-stream');
	    header('Content-Disposition: attachment; filename="'.basename($file).'"');
	    header('Expires: 0');
	    header('Cache-Control: must-revalidate');
	    header('Pragma: public');
	    header('Content-Length: ' . filesize($file));
	    readfile($file);
	    exit;

	    echo '<script type="text/javascript">
					window.location = "index.php";
					</script>';
	}else{
		echo '<script type="text/javascript">
					window.location = "index.php";
					alert("Error! Downloading the file failed.");
					</script>';
	}
}
else{
	echo '<script type="text/javascript">
	      	alert("Error!");
		  </script>';
}
?>