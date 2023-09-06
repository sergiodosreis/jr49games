<?php

	//Dar loading em qualquer classe que eu criar
	
	$autoload = function($class){
		if($class == 'Email'){
			require_once('classes/phpmailer/PHPMailerAutoload.php'); 
		}
		
		include('classes/'.$class.'.php');
	};

	spl_autoload_register($autoload);



	//define('INCLUDE_PATH', 'https://jr49games.com/');
	
?>