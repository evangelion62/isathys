<?php
/*
 * objet représentant la requéte http du client
 * elle permet
 *   -Obtenir une variable POST.
 *
 *   -Obtenir une variable GET.
 *
 *   -Obtenir un cookie.
 *
 *   -Obtenir la méthode employée pour envoyer la requête (méthode GET ou POST).
 *
 *   -Obtenir l'URL entrée (utile pour que le routeur connaisse la page souhaitée). 
 */
namespace lib\app;

class HTTPRequest
{
	public function cookieData($key)
	{
		return isset($_COOKIE[$key]) ? $_COOKIE[$key] : null;
	}
	 
	public function cookieExists($key)
	{
		return isset($_COOKIE[$key]);
	}
	 
	public function getData($key)
	{
		return isset($_GET[$key]) ? $_GET[$key] : null;
	}
	 
	public function getExists($key)
	{
		return isset($_GET[$key]);
	}
	 
	public function method()
	{
		return $_SERVER['REQUEST_METHOD'];
	}
	 
	public function postData($key)
	{
		return isset($_POST[$key]) ? $_POST[$key] : null;
	}
	 
	public function postExists($key)
	{
		return isset($_POST[$key]);
	}
	 
	public function requestURI()
	{
		return $_SERVER['REQUEST_URI'];
	}
}