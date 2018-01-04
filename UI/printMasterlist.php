<?php
require_once('../UI/pdfmaker.php');
$pdfmaker = new pdfMaker();
if(isset($_POST['batchNumber'])){
	$batchNumber = $_POST['batchNumber'];
	$strand = $_POST['strand'];
	$arrId= array($_POST['idapplicant']);
	$arrsName = array($_POST['name']);
	$arrsIn = array(1,2,3,4,5);
	$arrsOut = array(1,2,3,4,5);
	$remarks = array('P','P','P','P','P');
	$pdfmaker->masterList(1,"OPERATIONS",45,'12/22/2017',42);
}
?>