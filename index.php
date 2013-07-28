<?php
/*
 * @author seb
 * front controler
 */

//inclusion de tous les fichier et config
require_once 'conf/main.conf.php';

//kernel
ob_start();

	if (is_file($controller)){
		require_once $controller ;
	}
	else {
		require_once CONTROLLER_PATH."home".CONTROLLER_EXT;
	}

$content = ob_get_contents();
ob_clean();

//layout
if (!is_file(VIEW_PATH.$layout.'/'.$layout.VIEW_EXT)){
	$layout = "layout";
}
require_once VIEW_PATH.$layout.'/'.$layout.VIEW_EXT;

//test de modification avec eclipse