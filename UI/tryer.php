<?php
require_once('../UI/pdfmaker.php');
class PDF extends FPDF
{
// Load data
/*function LoadData($file)
{
    // Read file lines
    $lines = file($file);
    $data = array();
    foreach($lines as $line)
        $data[] = explode(';',trim($line));
    return $data;
}*/

// Simple table
function BasicTable($header, $data)
{
    // Header
    foreach($header as $col)
        $this->Cell(40,7,$col,1);
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        foreach($row as $col)
            $this->Cell(40,6,$col,1);
        $this->Ln();
    }
}

// Better table
function ImprovedTable($header, $data)
{
    // Column widths
    $w = array(40, 35, 40, 45);
    // Header
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C');
    $this->Ln();
    // Data
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR');
        $this->Cell($w[1],6,$row[1],'LR');
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R');
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R');
        $this->Ln();
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

// Colored table
function FancyTable($headertitle,$header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(1,10,100);
    $this->SetTextColor(255);
    $this->SetDrawColor(2,15,141);
    $this->SetLineWidth(.3);
    $this->SetFont('arial','','10');
    // Header
    $wt = array(190);
    for($i=0;$i<count($headertitle);$i++)
        $this->Cell($wt[$i],7,$headertitle[$i],1,0,'C',true);
    $this->Ln();

    $w = array(10, 25, 70, 20,65);
    $this->SetFont('arial','','8');
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    $counter = 1;
    foreach($data as $row)
    {
        $this->Cell($w[$counter-1],6,$row,'LR',0,'L',$fill);
        if($counter ==5){
	        $this->Ln();
	        $fill = !$fill;
	        $counter =0;
        }
        $counter++;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}

}

$pdf = new PDF();
// Column headings

$pdf->SetFont('Arial','',14);
$headertitle=array("Lyceum of the Philippines");
$header = array('No.', 'Trainee ID', 'Name', 'Gender','Target Course');
$data=array("1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075","1","0001","Christian Philip Polidan","Male","BS Community Development","8075","8075","8075","8075","8075");
$pdf->AddPage();
//$pdf->BasicTable($header,$data);
//$pdf->AddPage();
//$pdf->ImprovedTable($header,$data);
//$pdf->AddPage();
$pdf->FancyTable($headertitle,$header,$data);
$pdf->Output();
?>