<?php
/*
 * classe représentant la résponce envoyé au client
 * elle permet
 *   D'assigner une page à la réponse.
 *
 *   D'envoyer la réponse en générant la page.
 *
 *   De rediriger l'utilisateur.
 *
 *   De le rediriger vers une erreur 404.
 *
 *   D'ajouter un cookie.
 *
 *   D'ajouter un header spécifique.
 */
namespace lib\app;

class HTTPResponse
{
	protected $page;
	 
	public function addHeader($header)
	{
		header($header);
	}
	 
	public function redirect($location)
	{
		header('Location: '.$location);
		exit;
	}
	 
	public function redirect404()
	{
	}
	 
	public function send()
	{
		// Actuellement, cette ligne a peu de sens dans votre esprit.
		// Promis, vous saurez vraiment ce qu'elle fait d'ici la fin du chapitre
		// (bien que je suis sûr que les noms choisis sont assez explicites !).
		exit($this->page->getGeneratedPage());
	}
	 
	public function setPage(Page $page)
	{
		$this->page = $page;
	}
	 
	// Changement par rapport à la fonction setcookie() : le dernier argument est par défaut à true.
	public function setCookie($name, $value = '', $expire = 0, $path = null, $domain = null, $secure = false, $httpOnly = true)
	{
		setcookie($name, $value, $expire, $path, $domain, $secure, $httpOnly);
	}
}