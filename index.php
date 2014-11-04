<?php
//inclusion du fichier de configuration
require_once 'conf/conf.php';

//appel du controler et l'action demandé par l'url
if (class_exists($Controller) && method_exists($Controller, $action)){
	$controller = new $Controller();
	$controller->$action();
}else
{
	$error = new \controller\Error();
	$error->error404();
}