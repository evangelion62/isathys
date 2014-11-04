<?php
/*
 * auto chargement de classe utilisant les namespace 
 */
function autoload($class)
{
	$classFile = str_replace('\\', '/', $class).'.php';
	if (is_file($classFile)){
		require $classFile;
	}
}

spl_autoload_register('autoload');

/*
 * conection à la bdd
 */

/*
 * demarrage des session
 */
 
/*
 * definition des varriable $controller et $action
 */
$Controller = (empty($_GET['controller'])) ? '\controller\Index' : '\controller\\'.ucfirst($_GET['controller']);
$action = (empty($_GET['action'])) ? 'defaultAction' : $_GET['action'];