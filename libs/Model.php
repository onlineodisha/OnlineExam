<?php

class Model {

	function __construct() {
		$this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
		//$configuration=$this->db->select('SELECT * FROM `configuration`');
		//foreach($configuration as $key => $value) { 
		//define($value['Ctitle'],$value['Cvalue']);
		//}
	}

}