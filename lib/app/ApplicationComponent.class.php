<?php
/*
 * model d'un composant de l'app
 */
namespace lib\app;
 
abstract class ApplicationComponent
{
  protected $app;
   
  public function __construct(Application $app)
  {
    $this->app = $app;
  }
   
  public function app()
  {
    return $this->app;
  }
}