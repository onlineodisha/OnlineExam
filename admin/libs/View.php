<?php

class View {

	function __construct() {
		//echo 'this is the view';
	}
	public function render($name, $noInclude = false)
	{
		global $header_menus;
		$subname = explode("/",$name);
		if ($noInclude == true) {
			require 'view/' . $name . '.php';	
		}
		else {
			
			require 'view/header.php';
			require 'view/' . $name . '.php';
			require 'view/footer.php';
			
		
	}
}

}

