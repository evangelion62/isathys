<?php
namespace app\front\modules\article;
 
class ArticleController extends \lib\app\BackController
{
  public function executeIndex(\lib\app\HTTPRequest $request)
  {
    $nombreNews = $this->app->config()->get('nombre_news');
    $nombreCaracteres = $this->app->config()->get('nombre_caracteres');
     
    // On ajoute une d�finition pour le titre.
    $this->page->addVar('title', 'Liste des '.$nombreNews.' derni�res news');
     
    // On r�cup�re le manager des news.
    $manager = $this->managers->getManagerOf('Article');
     
    // Cette ligne, vous ne pouviez pas la deviner sachant qu'on n'a pas encore touch� au mod�le.
    // Contentez-vous donc d'�crire cette instruction, nous impl�menterons la m�thode ensuite.
    $listeNews = $manager->getList(0, $nombreNews);
     
    foreach ($listeNews as $news)
    {
      if (strlen($news->contenu()) > $nombreCaracteres)
      {
        $debut = substr($news->contenu(), 0, $nombreCaracteres);
        $debut = substr($debut, 0, strrpos($debut, ' ')) . '...';
         
        $news->setContenu($debut);
      }
    }
     
    // On ajoute la variable $listeNews � la vue.
    $this->page->addVar('listeNews', $listeNews);
  }
}