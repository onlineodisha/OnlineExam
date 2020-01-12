<?php
require '../config.php';
//require 'util/Auth.php';
//require 'util/Roles.php';

// Also spl_autoload_register (Take a look at it if you like)
spl_autoload_register(function($class){
	require LIBS . $class .".php";
});
$app = new Bootstrap();
?>