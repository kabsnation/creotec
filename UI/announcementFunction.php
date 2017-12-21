<?php
require_once('PostHandler.php');
$handler = new PostHandler();

if(isset($_POST["title"])){
	$title = $_POST["title"];
	$body = $_POST["body"];
	if(isset($_FILES['picture']) && $_FILES['picture']['size'] > 0){
		$image = addslashes(file_get_contents($_FILES['picture']['tmp_name'])); //SQL Injection defence!
		$result = $handler -> insertAnnouncement($title,$body,$connect,$image);
	}
	else
		$result = $handler -> insertAnnouncement($title,$body,$connect);
	echo $result;
}
?>