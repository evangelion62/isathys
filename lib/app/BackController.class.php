<?php
namespace lib\app;
 
abstract class BackController extends ApplicationComponent
{
  protected $action = '';
  protected $module = '';
  protected $page = null;
  protected $view = '';
  protected $managers = null;
   
  public function __construct(Application $app, $module, $action)
  {
    parent::__construct($app);
     
	$this->managers = new Managers('PDO',PDOFactory::getMysqlConnexion());
    $this->page = new Page($app);
     
    $this->setModule($module);
    $this->setAction($action);
    $this->setView($action);
  }
   
  public function execute()
  {
    $method = 'execute'.ucfirst($this->action);
     
    if (!is_callable(array($this, $method)))
    {
      throw new \RuntimeException('L\'action "'.$this->action.'" n\'est pas d�finie sur ce module');
    }
     
    $this->$method($this->app->httpRequest());
  }
   
  public function page()
  {
    return $this->page;
  }
   
  public function setModule($module)
  {
    if (!is_string($module) || empty($module))
    {
      throw new \InvalidArgumentException('Le module doit �tre une chaine de caract�res valide');
    }
     
    $this->module = $module;
  }
   
  public function setAction($action)
  {
    if (!is_string($action) || empty($action))
    {
      throw new \InvalidArgumentException('L\'action doit �tre une chaine de caract�res valide');
    }
     
    $this->action = $action;
  }
   
  public function setView($view)
  {
    if (!is_string($view) || empty($view))
    {
      throw new \InvalidArgumentException('La vue doit �tre une chaine de caract�res valide');
    }
     
    $this->view = $view;
	
	$this->page->setContentFile('app/'.$this->app->name().'/modules/'.$this->module.'/views/'.$this->view.'.php' );
  }
}