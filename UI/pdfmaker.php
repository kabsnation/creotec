<?php
require("../fpdf181/fpdf.php");
require_once('../config/config.php');
class pdfMaker extends FPDF{
public function registrationForm($id,$name,$batchNumber,$strand,$school,$target_file,$department){
		$pdf=new FPDF();
		//var_dump(get_class_methods($pdf));
		$pdf->AddPage();
		$date = date('d/m/y');
		//------------------------
		//FIRST COPY
		$pdf->Image("/xampp/htdocs/creotec/images/registration_form.jpg", 0,0,210); 
		$pdf->Image($target_file, 170.82,25,24); 
		//date line
		$pdf->SetFont("arial","","8");
		$pdf->SetX(180);
		$pdf->Cell(0,23,$date, 0,0);

		//FIRST LINE
		$pdf->SetFont("arial","","8");
		$pdf->SetX(16);
		$pdf->Cell(0,45,$id, 0,0);

		$pdf->SetX(42.5);
		$pdf->Cell(0,45,$name,0,0);

		$pdf->SetX(120);
		$pdf->Cell(0,45,$batchNumber, 0, 0);

		$pdf->SetX(141);
		$pdf->Cell(0,45,$strand,0,0);

		//second line
		$pdf->SetFont("arial","","8");
		$pdf->SetX(16);
		$pdf->Cell(0,72,$school, 0,0);

		$pdf->SetX(137);
		$pdf->Cell(0,72,$department,0,0);


		//SECOND COPY

		//date line
		$pdf->SetFont("arial","","8");
		$pdf->SetX(175);
		$pdf->Cell(0,217,$date, 0,0);
		$pdf->Image($target_file, 170.82,121.50,24); 
		//FIRST LINE
		$pdf->SetFont("arial","","8");
		$pdf->SetX(16);
		$pdf->Cell(0,237,$id, 0,0);

		$pdf->SetX(42.5);
		$pdf->Cell(0,237,$name,0,0);

		$pdf->SetX(120);
		$pdf->Cell(0,237,$batchNumber, 0, 0);

		$pdf->SetX(141);
		$pdf->Cell(0,237,$strand,0,0);

		//second line
		$pdf->SetFont("arial","","8");
		$pdf->SetX(16);
		$pdf->Cell(0,264,$school, 0,0);

		$pdf->SetX(137);
		$pdf->Cell(0,264,$department,0,0);

		//REMINDERS
		$pdf->SetX(50);
		$pdf->SetY(155);
		$pdf->SetLeftMargin(15);
		$pdf->Write(0, 'insert reminders');

		//third copy
		$pdf->SetX(100);
		$pdf->SetY(196.5);
		$pdf->Cell(177,0, $date,0,0, 'R');
		$pdf->Image($target_file, 170.82,199.3,24); 
		$pdf->SetY(200);
		$pdf->Cell(0,0,'',0,0);

		$pdf->SetX(50);
		$pdf->SetY(206.5);
		$pdf->SetLeftMargin(16);
		$pdf->Cell(0,28, $school,0,0);
		$pdf->SetX(138);
		$pdf->Cell(0,28, $department,0,0);

		$pdf->SetX(75);
		$pdf->SetY(206.5);
		$pdf->SetLeftMargin(16);
		$pdf->Cell(0,0, $id,0,0);
		$pdf->SetX(43);
		$pdf->Cell(0,0, $name,0,0);
		$pdf->SetX(120);
		$pdf->Cell(0,0, $batchNumber,0,0);
		$pdf->SetX(142);
		$pdf->Cell(0,0, $strand,0,0);

		//REMINDERS
		$pdf->SetX(50);
		$pdf->SetY(233);
		$pdf->SetLeftMargin(15);
		$pdf->Write(0, 'insert facilitators');

		$pdf->Output();
	}
// Colored table
	function Footer()
	{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
	}

function FancyTable($data,$school,$data2,$center)
{
    // Colors, line width and bold font
    $this->SetFillColor(1,10,100);
    $this->SetDrawColor(2,15,141);
    $this->SetLineWidth(.3);
    $this->SetFont('arial','','10');
    // Header
    $this->Image("/xampp/htdocs/creotec/images/masterlist.jpg", 75,5,60); 
    $headertitle=array($school);
	$header = array('No.', 'Trainee ID', 'Name', 'Gender','Target Course');
	$headerTable1 = array('Batch No.', 'Strand', 'Total No.');
	$this->SetY(9.5);
	$this->Cell(0,35, $center,0,0,'C');
    $this->SetTextColor(255);
    $wt = array(190);
    $wTable1 = array(25, 25, 25);
    $counter = 1;
    $this->SetY(40);
    for($i=0;$i<count($headerTable1);$i++)
        $this->Cell($wTable1[$i],7,$headerTable1[$i],1,0,'C',true);
    $this->Ln();
    $this->SetTextColor(0);
    foreach ($data2 as $row) {
    	$this->Cell($wTable1[$counter-1],6,$row,'LR',0,'L',false);
    }
    $this->Ln();
    $this->Cell(array_sum($wTable1),0,'','T');
    $this->SetY(54);
    $this->SetTextColor(255);
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


// 	$pdf = new PDF();
// // Column headings

// 	$pdf->SetFont('Arial','',14);

// 	$headertitle=array("Lyceum of the Philippines");
// 	$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
// 	$data[]=array("Austria","Vienna","83859","8075");
// 	$pdf->AddPage();
// 	//$pdf->BasicTable($header,$data);
// 	//$pdf->AddPage();
// 	//$pdf->ImprovedTable($header,$data);
// 	//$pdf->AddPage();
// 	$pdf->FancyTable($headertitle,$header,$data);
// 	$pdf->Output();



	// public function masterList($batchNumber,$strand,$totalNumber,$school,$rowPerSchool,$center,$traineeNo){
	// 	$pdf=new FPDF();
	// 	$counterPage = 1;
	// 	$counterNumber =1;
	// 	$counterTotalPage = sizeof($school);
	// 	$result = array();
	// 	for($rowPerSchoolCounter=0;$rowPerSchoolCounter<sizeof($rowPerSchool);$rowPerSchoolCounter++){
	// 		$result[$rowPerSchoolCounter] = $rowPerSchool[$rowPerSchoolCounter]/37;
	// 		if($result[$rowPerSchoolCounter]<1)
	// 			$result[$rowPerSchoolCounter] = 1;
	// 		else
	// 			$counterTotalPage++;
	// 	}
	// 	for($schoolCounter=0;$schoolCounter<sizeof($school);$schoolCounter++){
	// 		for($counter = 0;$counter<$result[$schoolCounter]; $counter++){
	// 			$pdf->AddPage();
	// 			//------------------------
	// 			//FIRST COPY
	// 			$pdf->Image("/xampp/htdocs/creotec/images/Masterlist.jpg", 0,0,210); 
	// 			//batch number
	// 			$pdf->SetFont('arial','',8.5);
	// 			$pdf->SetX(17);
	// 			$pdf->Cell(0,70,$batchNumber);

	// 			//strand
	// 			$pdf->SetFont('arial','',8.5);
	// 			$pdf->SetX(33);
	// 			$pdf->Cell(0,70,$strand);

	// 			//total number
	// 			$pdf->SetFont('arial','',8.5);
	// 			$pdf->SetX(48);
	// 			$pdf->Cell(0,70,$rowPerSchool[$schoolCounter]);

	// 			//center
	// 			$pdf->SetFont('arial','B',10);
	// 			$pdf->SetX(10);
	// 			$pdf->Cell(0,30,$center,0,0,'C');

	// 			//page number
	// 			$pdf->SetFont('arial','',15);
	// 			$pdf->SetX(184);
	// 			$pdf->Cell(0,38.5,$counterPage);

	// 			//total number
	// 			$pdf->SetFont('arial','',15);
	// 			$pdf->SetX(192);
	// 			$pdf->Cell(0,38.5,$counterTotalPage);

	// 			//school
	// 			$pdf->SetFont('arial','',8.5);
	// 			$pdf->SetTextColor(255,255,255);
	// 			$pdf->SetX(0);
	// 			$pdf->Cell(0,87,$school[$schoolCounter],0,0,'C');

	// 			//37 rows
	// 			//column no.
				
	// 			$arrs= array("1","2","3","4","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5");
				
				
	// 			$pdf->SetTextColor(0,0,0);
	// 			$count = 0;
	// 			for($i=0;$i<sizeof($traineeNo);$i++){
	// 				$pdf->SetFont('arial','',10);
	// 				$pdf->SetXY(14,63+$count);
	// 				$pdf->Cell(0,0,$traineeNo[$i]);
	// 				$count = $count+5;
	// 			}
				
	// 			//column trainee no.
	// 			$arrs= array("LAG-0000001","LAG-0000002","LAG-0000003","LAG-0000004","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005");
	// 			$count = 0;
				
	// 			foreach($arrs as $arr){
	// 				$pdf->SetFont('arial','',10);
	// 				$pdf->SetXY(25,63+$count);
	// 				$pdf->Cell(0,0,$arr);
	// 				$count = $count+5;

	// 			}
	// 			//column name
	// 			$arrs= array("Cuevas, Mark Dherrick P.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.");
	// 			$count = 0;
	// 			foreach($arrs as $arr){
	// 				$pdf->SetFont('arial','',10);
	// 				$pdf->SetXY(62,63+$count);
	// 				$pdf->Cell(0,0,$arr);
	// 				$count = $count+5;
	// 			}
	// 			//column gender
	// 			$arrs= array("M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M");
	// 			$count = 0;
	// 			foreach($arrs as $arr){
	// 				$pdf->SetFont('arial','',10);
	// 				$pdf->SetXY(111.5,63+$count);
	// 				$pdf->Cell(0,0,$arr);
	// 				$count = $count+5;
	// 			}
	// 			//target course
	// 			$position = 50;
	// 			$arrs= array("Bachelor of Science in Business Administration Major in Human Resource Development Management","Bachelor of Science in Business Administration Major in Human Resource Development Management","Bachelor of Science in Business Administration Major in Human Resource Development Management","Bachelor of Science in Business Administration Major in Human Resource Development Management","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor");
	// 			$count = 0;
	// 			foreach($arrs as $arr){
	// 				$pdf->SetFont('arial','',10);
	// 				$pdf->SetXY(125,63+$count);
	// 				$pdf->Cell(0,0,$arr);
	// 				$count = $count+5;
	// 			}
	// 			$counterPage++;
	// 		}
	// 		$counterNumber =1;
	// 	}
	// 	$pdf->Output();
	// }
	public function attendance($batchNumber,$department,$totalNumber,$date,$numberPresent,$numberAbsent,$numberLate,$names,$ids,$timeIn,$timeOut,$remarks){
		$pdf=new FPDF();
		//var_dump(get_class_methods($pdf));
		$pdf->AddPage();
		//------------------------
		//FIRST COPY
		$pdf->Image("/xampp/htdocs/creotec1/images/attendance.jpg", 0,0,210); 

		//batch number
		$pdf->SetFont('arial','B',10);
		$pdf->SetX(45);
		$pdf->Cell(0,143,$batchNumber);

		//department
		$pdf->SetFont('arial','B',10);
		$pdf->SetX(45);
		$pdf->Cell(0,157,$department);

		//total number
		$pdf->SetFont('arial','B',10);
		$pdf->SetX(45);
		$pdf->Cell(0,172,$totalNumber);

		//date
		$pdf->SetFont('arial','B',10);
		$pdf->SetX(162);
		$pdf->Cell(0,155,$date);

		//present
		$pdf->SetFont('arial','B',10);
		$pdf->SetX(162);
		$pdf->Cell(0,167,$numberPresent);

		//late
		$pdf->SetFont('arial','B',10);
		$pdf->SetX(162);
		$pdf->Cell(0,180,$numberLate);

		//absent
		$pdf->SetFont('arial','B',10);
		$pdf->SetX(162);
		$pdf->Cell(0,192,$numberAbsent);

		//id
		$arrsId = array("LAG-0000000001","LAG-0000000002","LAG-0000000003","LAG-0000000004","LAG-0000000005","LAG-0000000005","LAG-0000000005","LAG-0000000005","LAG-0000000005","LAG-0000000005","LAG-0000000005","LAG-0000000005");
		$count = 0;
		$i = 0;
		$counter = 0;
		$setter = 1.5;
		foreach ($arrsId as $id) {
			$pdf->SetFont('arial','',10);
			$pdf->SetXY(6, 131.5+($count-$counter));
			$pdf->Cell(0,0,"LAG-0000000001");
			$count = $count+10;
			if($i == 3){
				$setter = $setter +1;
				$i=0;
			}
			else{
				$counter = $setter;
				$i++;
			}
		}
		
		
		$pdf->Output();
	}
}

?>