<?php
	if(! defined('ENVIRONMENT') )
	{
		$domain = strtolower($_SERVER['HTTP_HOST']);
		switch($domain) {
			case 'raghukul.co.in' : 						define('ENVIRONMENT', 'production'); 	break;
			case 'raghukul.co.in' : 						define('ENVIRONMENT', 'production'); 	break;
			case '': 		define('ENVIRONMENT', 'staging'); 		break;
			default : 									define('ENVIRONMENT', 'development'); 	break;
		}
	}
?>