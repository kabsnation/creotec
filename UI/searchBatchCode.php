 <?php
require_once("../config/config.php");
$connect = new Connect();
$slots = array();
$result = "";
if(!empty($_POST["batchcode"]))
{
	$id = $_POST["batchcode"];
	$query = "SELECT batchcode, capacity, (select count(*) as count from applicants as a WHERE a.idbatch = batch.idbatch AND a.idstrand = strand.idstrand) as counter, strand, strand.idStrand FROM slots JOIN strand ON strand.idstrand = slots.idstrand JOIN batch ON batch.idbatch = slots.idbatch WHERE batch.batchcode = BINARY '".$id."'";
	$r =array();
	$result = $connect->select($query);
	$count = 0;
	if(mysqli_num_rows($result)>0){
		foreach ($result as $row) {
			$slots[$row["idStrand"]] = (int)$row["capacity"] - (int)$row["counter"];
			$r[$count]= "<h5 style='color:green'>".$row["strand"]." slot left: ". $slots[$row["idStrand"]] . "</h5>";
			$count++;
		}
		$r[2]=1;
		echo json_encode($r);
		$count =0;
	}
	else{
		$r[0]= '<h5 style="color:red">Invalid Batch Code</h5>';
		$r[1]=0;
		$r[2]=0;
		echo json_encode($r);
	}
}
 ?>