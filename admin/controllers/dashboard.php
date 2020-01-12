<?php
	
	class Dashboard extends Controller {
		
		function __construct() {
		parent::__construct();
		Session::init();

	}

	function index(){
		
		//$this->view->header_menus = $this->model->getHeaderMenus();
		$this->view->render('dashboard/index');
		}
}