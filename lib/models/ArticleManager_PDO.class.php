<?php
namespace lib\models;
 
use \Library\Entities\Article;
 
class ArticleManager_PDO extends ArticleManager
{
  public function getList($debut = -1, $limite = -1)
  {
    $sql = 'SELECT id, auteur, titre, contenu, dateAjout, dateModif FROM article ORDER BY id DESC';
     
    if ($debut != -1 || $limite != -1)
    {
      $sql .= ' LIMIT '.(int) $limite.' OFFSET '.(int) $debut;
    }
     
    $requete = $this->dao->query($sql);
    $requete->setFetchMode(\PDO::FETCH_CLASS | \PDO::FETCH_PROPS_LATE, '\lib\entities\Article');
     
    $listeNews = $requete->fetchAll();
     
    foreach ($listeNews as $news)
    {
      $news->setDateAjout(new \DateTime($news->dateAjout()));
      $news->setDateModif(new \DateTime($news->dateModif()));
    }
     
    $requete->closeCursor();
     
    return $listeNews;
  }
}