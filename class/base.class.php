<?php

class Base
{
	var $mysql;
	
	function __construct(){
		$this->mysql = new MySQL( DB_NAME,DB_USERNAME,DB_PASSWORD,DB_HOSTNAME );
	}
	
	public function insertNotification($fields) {
		$this->mysql->insert('tbl_notifications', $fields, '','str');
	}
	
}
?>