<?php


/**
 *Class article
 */
class Article
{

  private $_titre;
  private $_contenu;
  private $_idCategory;

  public function __construct($_titre,$_contenu,$_idCategory)
  {
    $this->_titre = $_titre;
    $this->_contenu = $_contenu;
    $this->_idCategory = $_idCategory;
  }

    /**
     * Get the value of Titre
     *
     * @return mixed
     */
    public function getTitre()
    {
        return $this->_titre;
    }

    /**
     * Get the value of Contenu
     *
     * @return mixed
     */
    public function getContenu()
    {
        return $this->_contenu;
    }


    /**
     * Get the value of Id Category
     *
     * @return mixed
     */
    public function getIdCategory()
    {
        return $this->_idCategory;
    }

}
