<?php
namespace controller;

final class Error extends \lib\Controller{
	//action 404
	public function error404(){
		header("HTTP/1.0 404 Not Found");
		require_once 'view/error/404.php';
	}
}