<?php
require_once('../config/config.php');
class StrandHandler{

	public function getStrandByBatchCode($batchCode){
		$slots = array();
		$connect = new Connect();
		$con = $connect-> connectDB();
		$batchCode = mysqli_real_escape_string($con,stripcslashes(trim($batchCode)));
		$query = "SELECT batchcode, capacity, (select count(*) as count from applicants as a WHERE a.idbatch = batch.idbatch AND a.idstrand = strand.idstrand) as counter, strand, strand.idStrand FROM slots JOIN strand ON strand.idstrand = slots.idstrand JOIN batch ON batch.idbatch = slots.idbatch WHERE batch.batchcode = BINARY '".$batchCode."'";

		$result = $connect->select($query);
		return $result;
	}
}

?>