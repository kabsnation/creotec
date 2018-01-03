<?php
require("../config/config.php");
class AccountHandler{

	public function getAccount($employeeid,$password){
		$con = new Connect();
		$query = "SELECT * FROM employeeAccounts WHERE userName='".$employee_id."' AND password ='" .$password."'";
		$result = $con->select($query);
		return $result;
	}
}
?>