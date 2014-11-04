<?php
require_once 'conf/conf.php';

if (class_exists($Controller) && method_exists($Controller, $action)){
	$controller = new $Controller();
	$controller->$action();
}else
{
	$error = new \controller\Error();
	$error->error404();
}