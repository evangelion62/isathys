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
	require str_replace('\\', '/', $class).'.class.php';
}
spl_autoload_register('myAutoloader');
