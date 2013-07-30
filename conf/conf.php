<?php
/*
 * activation des session
 */
session_start();
/*
 * configuration de la bdd du site
 */
$bddConf=array(	'host'			=>	'localhost',
								'user'			=>	'root',
								'password'	=>	'',
								'dbName'		=>	'isathys');

/*
 * configuration de l'autoload de class
 */
function myAutoloader($class) {
	if (is_file('lib/class/'.$class.'.class.php')){
		require_once 'lib/class/'.$class.'.class.php';
		return true;
	}elseif (is_file('lib/controler/'.$class.'.controler.php')){
		require_once 'lib/controler/'.$class.'.controler.php';
		return true;
	}elseif (is_file('lib/entity/'.$class.'.entity.php')) {
		require_once 'lib/entity/'.$class.'.entity.php';
		return true;
	}elseif (is_file('lib/manager/'.$class.'.manager.php')) {
		require_once 'lib/manager/'.$class.'.manager.php';
		return true;
	}else{
		return false;
	}
}
spl_autoload_register('myAutoloader');