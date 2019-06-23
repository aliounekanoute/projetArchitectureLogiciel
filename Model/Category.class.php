<?php




/**
 *Class category
 */
class Category
{

  private $_nom;

  public function __construct($_nom)
  {
    $this->_nom = $_nom;
  }

    /**
     * Get the value of Nom
     *
     * @return mixed
     */
    public function getNom()
    {
        return $this->_nom;
    }

}
