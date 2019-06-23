<?php


/**
 *Class de connection à la base de données
 */
class Database
{

  protected $_pdo;

  public function __construct()
  {
    $this->_pdo = new PDO("mysql:host=localhost;dbname=news", "root", "",array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
}
