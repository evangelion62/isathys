<?php
/*
 * activation des session
 */
session_start();

/*
 * configuration de la bdd du site
 */

	try {
		
		$bdd = new PDO('mysql:host=localhost;dbname=isathys','root','',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
	
	} catch (PDOException $e) {

		print "Erreur !: " . $e->getMessage() . "<br/>";
		die();
	
	}

/*
 * configuration de l'autoload de class
 */
function myAutoloader($class) {
	if (is_file('lib/class/'.$class.'.class.php')){
		require_once 'lib/class/'.$class.'.class.php';
		return true;
	}elseif (is_file('lib/controler/'.$class.'.php')){
		require_once 'lib/controler/'.$class.'.php';
		return true;
	}elseif (is_file('lib/entity/'.$class.'.php')) {
		require_once 'lib/entity/'.$class.'.php';
		return true;
	}elseif (is_file('lib/manager/'.$class.'.php')) {
		require_once 'lib/manager/'.$class.'.php';
		return true;
	}else{
		return false;
	}
}
spl_autoload_register('myAutoloader');
