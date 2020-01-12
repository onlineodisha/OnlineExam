<?php

class Bootstrap {

	function __construct() {

		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/');
		$url = filter_var($url, FILTER_SANITIZE_URL);
		$url = explode('/', $url);
		echo "<pre>"; print_r($url);
		require 'controller/login.php';
		$login_controller = new Login();
		$login_controller->loadModel('login');

		if (empty($url[0])) {
			//require 'controller/login.php';
			//$controller = new Login();
			
			$login_controller->login();
			return false;
		}

	}

	
	function error() {
//		require 'controllers/error.php';
		$controller = new Error();
		$controller->loadModel('index');
		$controller->index();
		return false;
	}

}