<?php
class Post{

	function insertNews($title,$body,$connect,$company,$picture = null){
		$connect = new Connect();
		$con = $connect-> connectDB();
		if($picture != null){
		$query = "INSERT INTO information(title,body,picture,`datetime`,type,iduser_information) VALUES('".$title."','".$body."','".$picture."','".date("Y-m-d H:i:s")."','1',1)";
		}
		else{
			$query = "INSERT INTO information(title,body,`datetime`,type,iduser_information) VALUES('".$title."','".$body."','".date("Y-m-d H:i:s")."','1',1)";
		}
		$lastId = $connect->insertWithLastId($query);
		if($lastId !=null){
			$query ="INSERT INTO news(idinformation,idCompany) VALUES(".$lastId.",".$company.")";
			$result = $connect->insert($query);
			return $result;
	}
	function insertAnnouncement($title,$body,$connect,$picture = null){
		if($picture != null){
		$query = "INSERT INTO information(title,body,picture,`datetime`,type,iduser_information) VALUES('".$title."','".$body."','".$picture."','".date("Y-m-d H:i:s")."','1',1)";
		}
		else{
			$query = "INSERT INTO information(title,body,`datetime`,type,iduser_information) VALUES('".$title."','".$body."','".date("Y-m-d H:i:s")."','1',1)";
		}
		$lastId = $connect->insertWithLastId($query);
		if($lastId !=null){
			$query ="INSERT INTO announcement(idinformation) VALUES(".$lastId.")";
			$result = $connect->insert($query);
			return $result;
		}
	}
}
?>