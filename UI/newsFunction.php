<?php
require_once('PostHandler.php');
$handler = new PostHandler();

if(isset($_POST["title"])){
	$company =$_POST["company"];
	$title = $_POST["title"];
	$body = $_POST["body"];
	if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0){
		$image = addslashes(file_get_contents($_FILES['picture']['tmp_name'])); 
		$result = $handler-> insertNews($title,$body,$connect,$company,$image);
	}
	else
		$result = $handler-> insertNews($title,$body,$connect,$company,$image);
	echo $result;
}
?>