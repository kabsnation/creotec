<?php
require("../fpdf181/fpdf.php");
class pdfMaker{
	public function registrationForm($id,$name,$batchNumber,$strand,$school,$target_file){
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
		$pdf->Cell(0,72,'OJT',0,0);


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
		$pdf->Cell(0,264,'OJT',0,0);

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
		$pdf->Cell(0,28, 'OJT',0,0);

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

	public function masterList($schoolName,$schoolCode,$batchNumber,$strand,$totalNumber){
		$pdf=new FPDF();
		//var_dump(get_class_methods($pdf));
		$pdf->AddPage();
		//------------------------
		//FIRST COPY
		$pdf->Image("/xampp/htdocs/creotec/images/Masterlist.jpg", 0,0,210); 
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

		//20 rows
		//column no.
		$arrs= array("1","2","3","4","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5","5");
		$count = 0;
		
		foreach($arrs as $arr){
			$pdf->SetFont('arial','',10);
			$pdf->SetXY(14,63+$count);
			$pdf->Cell(0,0,$arr);
			$count = $count+5;
		}
		
		//column trainee no.
		$arrs= array("LAG-0000001","LAG-0000002","LAG-0000003","LAG-0000004","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005","LAG-0000005");
		$count = 0;
		
		foreach($arrs as $arr){
			$pdf->SetFont('arial','',10);
			$pdf->SetXY(25,63+$count);
			$pdf->Cell(0,0,$arr);
			$count = $count+5;

		}
		//column name
		$arrs= array("Cuevas, Mark Dherrick P.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.","Polidan, Christian Philip M.");
		$count = 0;
		foreach($arrs as $arr){
			$pdf->SetFont('arial','',10);
			$pdf->SetXY(62,63+$count);
			$pdf->Cell(0,0,$arr);
			$count = $count+5;
		}
		//column gender
		$arrs= array("M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M","M");
		$count = 0;
		foreach($arrs as $arr){
			$pdf->SetFont('arial','',10);
			$pdf->SetXY(111.5,63+$count);
			$pdf->Cell(0,0,$arr);
			$count = $count+5;
		}
		//target course
		$position = 50;
		$arrs= array("Bachelor of Science in Business Administration Major in Human Resource Development Management","Bachelor of Science in Business Administration Major in Human Resource Development Management","Bachelor of Science in Business Administration Major in Human Resource Development Management","Bachelor of Science in Business Administration Major in Human Resource Development Management","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor","Bachelor");
		$count = 0;
		foreach($arrs as $arr){
			$pdf->SetFont('arial','',10);
			$pdf->SetXY(125,63+$count);
			$pdf->Cell(0,0,$arr);
			$count = $count+5;
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