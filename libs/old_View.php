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
			require 'views/' . $name . '.php';	
		}
		else {
			
			require 'views/header.php';?>
			<div class="container">
				<div class="row mt-5 content">
					<div class="col-md-8 col-sm-12 col-xs-12 pl-0 image-slider">
						<?php require 'views/' . $name . '.php';	?>
					</div>
					<div class="col-md-4">
						<?php require 'views/right_side_bar.php';	?>
					</div>	
				</div>
			</div>
			<?php 
			require 'views/footer.php';
			}
			
		
	}

}

