<?php

class SMC extends Base
{
	// Send SMS Alerts
	public function getAllRegisteredUsers() {
		
	}
	
	public function sendContent() {
		
	}
	
	public function registerUser($min, $name, $gender) {
		
		// Date + 30
		$startDate = time();
		$date_valid = date('Y-m-d H:i:s', strtotime('+30 day', $startDate));

		// Insert SMC Users
		$fields = array( "min" 			=> $min,
						 "name" 		=> $name,
						 "gender" 		=> $gender,
						 "date_validity" => $date_valid);
		$result = $this->mysql->insert('tbl_smc_users', $fields, '','str');
		
		if ($result) {
			return true;
		}
		return false;
	}
}
?>