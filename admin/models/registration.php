<?php
class Registration_Model extends Model {

	function __construct() {
		parent::__construct();
		Session::init();
		
	}

}