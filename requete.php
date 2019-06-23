<?php

include_once("Model/Article.class.php");
include_once("Model/Category.class.php");
include_once("DAO/ArticleService.class.php");
include_once("DAO/CategoryService.class.php");

/*$requete = $_POST['requete'];

if($requete == 'getArticleById')
{*/
  $id = $_POST['id'];
  $service = new ArticleService();
  $response = $service->getArticleById($id);
  $my_obj = $response[0]['titre'].','.$response[0]['contenu'];
  //$my_json = json_encode($my_obj);
  echo $my_obj;
/*  return;
}

elseif($requete == 'getArticleByCategoryId'){
  $id = $_POST['id'];
  $service = new ArticleService();
  $response = $service->getArticleByCategoryId($id);
  $size = sizeof($response);
  //$array =;
  for($i = 0; $i < $size ; $i++)
  {
    $array .= $response[$i]['id'].',';
    $array .= $response[$i]['titre'].',';
    $array .= $response[$i]['contenu'].';';
  }
  echo $array;
}
*/
