<?php
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
	public function getStrand(){
		$connect = new Connect();
		$query ="SELECT * FROM Strand";
		$result = $connect->select($query);
		return $result;
	}
	public function generateRandomString($length = 6) {
	    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	    $charactersLength = strlen($characters);
	    $randomString = '';
	    for ($i = 0; $i < $length; $i++) {
	        $randomString .= $characters[rand(0, $charactersLength - 1)];
	    }
	    return $randomString;
	}
}

?>