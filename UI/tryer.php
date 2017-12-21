<?php
require_once('../UI/pdfmaker.php');
$pdfmaker = new pdfMaker();
$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
$data = array('4', '4', '4', '4');
$pdfmaker->BasicTable($header,$data);
?>