<?php
require("../fpdf181/fpdf.php");
class pdfMaker{
	public function registrationForm($name,$batchNumber,$strand,$school,$target_file){
		$pdf=new FPDF();
		//var_dump(get_class_methods($pdf));
		$pdf->AddPage();
		//------------------------
		//FIRST COPY
		$pdf->Image("/xampp/htdocs/creotec1/images/registration_form.jpg", 0,0,210); 
		$pdf->Image($target_file, 170.82,25,24); 
		//date line
		$pdf->SetFont("arial","","8");
		$pdf->SetX(180);
		$pdf->Cell(0,23,'12/19/2017', 0,0);

		//FIRST LINE
		$pdf->SetFont("arial","","8");
		$pdf->SetX(16);
		$pdf->Cell(0,45,'LAG-0000001', 0,0);

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
		$pdf->Cell(0,72,'OJT',0,0);


		//SECOND COPY

		//date line
		$pdf->SetFont("arial","","8");
		$pdf->SetX(175);
		$pdf->Cell(0,217,'12/19/2017', 0,0);
		$pdf->Image($target_file, 170.82,121.50,24); 
		//FIRST LINE
		$pdf->SetFont("arial","","8");
		$pdf->SetX(16);
		$pdf->Cell(0,237,'LAG-0000001', 0,0);

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
		$pdf->Cell(0,264,'OJT',0,0);

		//REMINDERS
		$pdf->SetX(50);
		$pdf->SetY(155);
		$pdf->SetLeftMargin(15);
		$pdf->Write(0, 'insert reminders');

		//third copy
		$pdf->SetX(100);
		$pdf->SetY(196.5);
		$pdf->Cell(177,0, '12/19/2017',0,0, 'R');
		$pdf->Image($target_file, 170.82,199.3,24); 
		$pdf->SetY(200);
		$pdf->Cell(0,0,'',0,0);

		$pdf->SetX(50);
		$pdf->SetY(206.5);
		$pdf->SetLeftMargin(16);
		$pdf->Cell(0,28, $name,0,0);
		$pdf->SetX(138);
		$pdf->Cell(0,28, 'OJT',0,0);

		$pdf->SetX(75);
		$pdf->SetY(206.5);
		$pdf->SetLeftMargin(16);
		$pdf->Cell(0,0, 'LAG-0000001',0,0);
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

	public function masterList($schoolName,$schoolCode,$batchNumber,$strand,$totalNumber){
		$pdf=new FPDF();
		//var_dump(get_class_methods($pdf));
		$pdf->AddPage();
		//------------------------
		//FIRST COPY
		$pdf->Image("/xampp/htdocs/creotec1/images/Masterlist.jpg", 0,0,210); 
		//school name
		$pdf->SetFont('arial','',8.5);
		$pdf->SetX(12.9);
		$pdf->Cell(0,70,'Asiatech Technological School of Science and Arts');

		//school code
		$pdf->SetFont('arial','',8.5);
		$pdf->SetX(86);
		$pdf->Cell(0,70,'ABC1234325');

		//batch number
		$pdf->SetFont('arial','',8.5);
		$pdf->SetX(126);
		$pdf->Cell(0,70,'0001');

		//strand
		$pdf->SetFont('arial','',8.5);
		$pdf->SetX(157);
		$pdf->Cell(0,70,'STEM');

		//total number
		$pdf->SetFont('arial','',8.5);
		$pdf->SetX(179);
		$pdf->Cell(0,70,'1');

		//column no.
		$arrs= array("1","2","3","4","5");
		$count = 0;
		foreach($arrs as $arr){
			$pdf->SetFont('arial','',10);
			$pdf->SetX(16);
			$pdf->Cell(0,108+$count,$arr);
			$count = $count+10;
		}
		//column trainee no.
		$arrs= array("LAG-0000001","LAG-0000002","LAG-0000003","LAG-0000004","LAG-0000005");
		$count = 0;
		foreach($arrs as $arr){
			$pdf->SetFont('arial','',10);
			$pdf->SetX(25);
			$pdf->Cell(0,108+$count,$arr);
			$count = $count+10;
		}
		//column name
		$arrs= array("Cuevas, Mark Dherrick P.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.");
		$count = 0;
		foreach($arrs as $arr){
			$pdf->SetFont('arial','',8);
			$pdf->SetX(62);
			$pdf->Cell(0,108+$count,$arr);
			$count = $count+10;
		}
		//column gender
		$arrs= array("M","M","M","M","M");
		$count = 0;
		foreach($arrs as $arr){
			$pdf->SetFont('arial','',8);
			$pdf->SetX(111.5);
			$pdf->Cell(0,108+$count,$arr);
			$count = $count+10;
		}
		//target course
		$position = 50;
		$arrs= array("Bachelor of Science in Business Administration Major in Human Resource Development Management","Bachelor of Science in Business Administration Major in Human Resource Development Management","Bachelor of Science in Business Administration Major in Human Resource Development Management","Bachelor of Science in Business Administration Major in Human Resource Development Management","Bachelor");
		$count = 0;
		foreach($arrs as $arr){
			if(strlen($arr)>50){
				$pdf->SetFont('arial','',8);
				$pdf->SetX(125);
				$pdf->Cell(0,108+$count,$arr);
				$count = $count+10;	
			}
			else{
				$pdf->SetFont('arial','',8);
				$pdf->SetX(125);
				$pdf->Cell(0,108+$count,$arr);
				$count = $count+10;
			}
		}
		$pdf->Output();
	}
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


		$pdf->SetFont('arial','B',10);
		$pdf->SetX(10);
		$pdf->Cell(0,240,"testing");
		//id
		// foreach($ids as $id ){
		// 	$pdf->SetFont('arial','B',10);
		// 	$pdf->SetX(45);
		// 	$pdf->Cell(0,143,$id);
		// }		
		$pdf->Output();
	}
}

?>