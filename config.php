<?php
error_reporting(E_ALL); 
define('DB_TYPE', 'mysql');
define('DB_HOST', 'localhost');
define('DB_NAME', 'online_exam');
define('DB_USER', 'root');
define('DB_PASS', '');

if($_SERVER['HTTP_HOST']!="http://localhost"){
 	if(isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], 'admin') == true)
 	{
 		define('URL', 'http://localhost/OnlineExam/admin/'); 
	 	define('LIBS', 'libs/');	
 	}
	else
	{
		
		define('URL', 'http://localhost/OnlineExam'); 
 		define('LIBS', 'libs/');	
	}
 }
