<?php

class View {

	function __construct() {
		//echo 'this is the view';
	}
	public function render($name, $noInclude = false)
	{
		//echo "<pre>";print_r($this->sliderData);die;
		global $header_menus;
		global $newsDataDetails;
		global $pageTitles;
		//echo "<pre>";print_r($header_menus);die;
		/*$subname = explode("/",$name);
		if ($noInclude == true) {
			require 'views/' . $name . '.php';	
		}
		else {*/
			
			require 'views/header.php';
			require 'views/' . $name . '.php';
			require 'views/footer.php';
			//}
			
		
	}

}

