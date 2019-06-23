<?php

include_once("../Model/Article.class.php");
include_once("../Model/Category.class.php");
include_once("../DAO/ArticleService.class.php");
include_once("../DAO/CategoryService.class.php");

$requete = $_POST['requete'];

if($requete == 'addArticle')
{
  $titre = $_POST['titre'];
  $contenu = $_POST['contenu'];
  $idCategory = $_POST['id_category'];
  $article = new Article($titre,$contenu,$idCategory);
  $service = new ArticleService();
  if($service->createArtilce($article))
  {
    echo 'Article '.$titre.' a ete ajoute avec succes';
  }
  else
  {
    echo 'Erreur lors de l\'ajout veuillez reessayer';
  }
}
elseif($requete == 'addCategory')
{
  $nom = $_POST['nom'];
  $category = new Category($nom);
  $service = new CategoryService();
  if($service->createCategory($category))
  {
    echo 'Categorie '.$nom.' a ete ajoute avec succes';
  }
  else
  {
    echo 'Erreur lors de l\'ajout veuillez reessayer';
  }
}
else
{
  echo 'Erreur de requete';
}
