<?php
namespace app\front;

class FrontApplication extends \lib\app\Application{
	public function __construct(){
		$this->name = 'Front' ;
		parent::__construct();
	}
	
	public function run(){
		$controller = $this->getController();
		$controller->execute();
		
		$this->httpResponse->setPage($controller->page());
		$this->httpResponse->send();
	}
}