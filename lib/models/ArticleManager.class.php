<?php
namespace lib\models;
 
abstract class ArticleManager extends \lib\app\Manager
{
  /**
   * M�thode retournant une liste de news demand�e
   * @param $debut int La premi�re news � s�lectionner
   * @param $limite int Le nombre de news � s�lectionner
   * @return array La liste des news. Chaque entr�e est une instance de News.
   */
  abstract public function getList($debut = -1, $limite = -1);
}