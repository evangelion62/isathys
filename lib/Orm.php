<?php
namespace lib;

final class Orm {
	/**********************************construction****************************************************************************/
	protected $_db;
	
	public function __construct(PDO $db) {
		$this->setDb($db);
	}
	
	public function setDb(PDO $db)
	{
		$this->_db = $db;
	}
	
	/*********************************méthode sur les tables*******************************************************************/
	public function tableCreat(Entity $entity){
		
	}
	
	public function tableTruncate(Entity $entity){
		
	}
	
	public function tableDrop(Entity $entity){
		
	}
	
	public function tableSave(Entity $entity){
		
	}
	
	/*********************************méthode sur les entity*******************************************************************/
	public function add(Entity $entity) {
		;
	}
	
	public function get() {
		;
	}
	
	public function update(Entity $entity) {
		;
	}
	
	public function delete(){
		
	}
}