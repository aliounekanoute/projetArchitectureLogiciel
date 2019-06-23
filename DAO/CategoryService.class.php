<?php

include_once("Database.class.php");
include_once("./Model/Category.class.php");

/**
 *
 */
class CategoryService extends Database
{

  public function createCategory(Category $category)
  {
    $query = $this->_pdo->prepare('INSERT INTO category (nom) VALUES (:nom)');
    return $query->execute(array(
      'nom' => $category->getNom()
    ));
  }

  public function getAllCategory()
  {
    $query = $this->_pdo->query('SELECT * FROM category');
    return $query->fetchAll();
  }

  public function getCategoryById($id){
    $query = $this->_pdo->prepare('SELECT * FROM category WHERE id =:id');
    $query->execute(array(
      'id' => $id
    ));
    return $query->fetchAll();
  }

}
