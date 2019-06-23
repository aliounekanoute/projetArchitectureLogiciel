<?php

include_once("./Model/Article.class.php");
include_once("Database.class.php");

/**
 *
 */
class ArticleService extends Database
{

  public function createArtilce(Article $article)
  {
    $query = $this->_pdo->prepare('INSERT INTO article (titre,contenu,date_de_creation,id_category) VALUES (:titre,:contenu,NOW(),:id_category)');
    return $query->execute(array(
      'titre' => $article->getTitre(),
      'contenu' => $article->getContenu(),
      'id_category' => $article->getIdCategory()
    ));
  }

  public function getAllArticle()
  {
    $query = $this->_pdo->query('SELECT * FROM article');
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getArticleByCategoryId($id)
  {
    $query = $this->_pdo->prepare('SELECT * FROM article WHERE id_category =:id');
    $query->execute(array(
      'id' => $id
    ));
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getLastArticle(){
    $query = $this->_pdo->query('SELECT * FROM article ORDER BY id DESC LIMIT 10');
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

  public function getArticleById($id)
  {
    $query = $this->_pdo->prepare('SELECT * FROM article WHERE id =:id');
    $query->execute(array(
      'id' => $id
    ));
    return $query->fetchAll(PDO::FETCH_ASSOC);
  }

}
