<?php
require_once('../UI/pdfmaker.php');
$pdfmaker = new pdfMaker();
$arrs= array("Cuevas, Mark Dherrick P.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.");
$arrsId = array("LAG-0000000001","LAG-0000000002","LAG-0000000003","LAG-0000000004","LAG-0000000005");
$arrsIn = array(1,2,3,4,5);
$arrsOut = array(1,2,3,4,5);
$remarks = array('P','P','P','P','P');
$pdfmaker->masterList(1,"OPERATIONS",45,'12/22/2017',42);
?>