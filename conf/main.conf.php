<?php
//inclusion des fichier nesecaire � l'application
require_once 'conf/path.conf.php';
require_once 'conf/bdd.conf.php';

//definition des varriable indispensable au fonctionnement du front controller et des back controller

$controller	=	!empty($_GET['controller'])	?	$_GET['controller'] :	"home"	;
$controller	=	CONTROLLER_PATH.$controller.CONTROLLER_EXT;

$action		= 	!empty($_GET['action'])		?	$_GET['action']		:	"index"	;

$layout		=	"layout";