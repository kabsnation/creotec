<?php
require_once('../UI/SchoolHandler.php');
require_once('../config/config.php');
$handler = new SchoolHandler();
 if(isset($_POST['idPerson'])){
	$results = $handler->deletePerson($_POST['idPerson']);
	if($results){
		echo $results;
	}
	else
		echo "error";
}
?>