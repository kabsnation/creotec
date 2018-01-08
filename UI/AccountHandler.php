<?php
class AccountHandler{
	public function getAccount($employeeid,$password){
		$con = new Connect();
		$query = "SELECT * FROM employeeAccounts WHERE userName='".$employeeid."' AND password ='" .$password."'";
		$result = $con->select($query);
		return $result;
	}
	public function getAccountById($id){
		$con = new Connect();
		$query = "SELECT * FROM employeeAccounts WHERE idEmployeeAccounts=".$id;
		$result = $con->select($query);
		return $result;
	}
}
?>