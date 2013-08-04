<?php
/*
 * 
 */
namespace lib\app;
 
abstract class Application
{
  protected $httpRequest;
  protected $httpResponse;
  protected $name;
  protected $user;
  protected $config;
   
  public function __construct()
  {
	$this->httpRequest = new HTTPRequest($this);
    $this->httpResponse = new HTTPResponse($this);
	$this->user = new User($this);
	$this->config = new Config($this);
  }
  
  public function getController()
  {
    $router = new Router;
     
    $xml = new \DOMDocument;
    $xml->load('../app/'.$this->name.'/Config/routes.xml');
     
    $routes = $xml->getElementsByTagName('route');
     
    // On parcourt les routes du fichier XML.
    foreach ($routes as $route)
    {
      $vars = array();
       
      // On regarde si des variables sont pr�sentes dans l'URL.
      if ($route->hasAttribute('vars'))
      {
        $vars = explode(',', $route->getAttribute('vars'));
      }
       
      // On ajoute la route au routeur.
      $router->addRoute(new Route($route->getAttribute('url'), $route->getAttribute('module'), $route->getAttribute('action'), $vars));
    }
     
    try
    {
      // On r�cup�re la route correspondante � l'URL.
      $matchedRoute = $router->getRoute($this->httpRequest->requestURI());
    }
    catch (\RuntimeException $e)
    {
      if ($e->getCode() == \lib\app\Router::NO_ROUTE)
      {
        // Si aucune route ne correspond, c'est que la page demand�e n'existe pas.
        $this->httpResponse->redirect404();
      }
    }
     
    // On ajoute les variables de l'URL au tableau $_GET.
    $_GET = array_merge($_GET, $matchedRoute->vars());
     
    // On instancie le contr�leur.
    $controllerClass = 'app\\'.$this->name.'\\modules\\'.$matchedRoute->module().'\\'.$matchedRoute->module().'Controller';
    return new $controllerClass($this, $matchedRoute->module(), $matchedRoute->action());
  }
  
  abstract public function run();
   
  public function httpRequest()
  {
    return $this->httpRequest;
  }
   
  public function httpResponse()
  {
    return $this->httpResponse;
  }
   
  public function name()
  {
    return $this->name;
  }
  
  public function user()
  {
  	return $this->user;
  }
   public function config(){
   	return $this->config;
   }
}