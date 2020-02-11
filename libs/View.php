<?php

class View {

	function __construct() {
		//echo 'this is the view';
	}
	public function render($name, $noInclude = false)
	{
		if($name == 'index/index')
		{
			require 'view/'.$name.'.php';
		}
		else
		{
			require 'view/header.php';
			require 'view/'.$name.'.php';
			require 'view/footer.php';
		}
		
		//}
			
		
	}

}

