<?php
function creationConceptionDelete($id){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
      $sql = 'DELETE FROM `creation_conception` WHERE `creation_conception`.`id` = '.$id;
      $result = $bdd->query($sql);
      return true;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}







class CreationConception extends Database{


  protected $id;
  protected $id_composant;
  protected $id_creation;
  protected $id_user;
  protected $date_create;

  public function getCreationConception($where = NULL){
    try
    {

        $sqlWhere = '';
        if(! is_null($where) ) {
          $sqlWhere = $this->generateWhere($where);
          $sqlBindWhere = $this->generateBindWhere($where);
        }
        // print_r($sqlBindWhere);
        // exit();

        $bd = $this->db;
        $requete = $bd->prepare(' SELECT creation.id, creation_conception.id AS `creationConceptionId`,composant.model, composant.id_cat FROM `creation_conception`
                                  RIGHT JOIN creation ON creation.id = creation_conception.id_creation
                                  RIGHT JOIN composant ON composant.id = creation_conception.id_composant
                                '.$sqlWhere);
        // $sql =
        // ' SELECT creation.id, creation_conception.id AS `creationConceptionId`,composant.model, composant.id_cat FROM `creation_conception`
        //   RIGHT JOIN creation ON creation.id = creation_conception.id_creation
        //   RIGHT JOIN composant ON composant.id = creation_conception.id_composant
        //   WHERE creation.id_user = '.UID().' AND creation.id = '.$idCreation;

        $attributs = $this->getNominativeMarker();

         if( isset($sqlBindWhere) && count($sqlBindWhere) > 0){
           $attributs = array_merge($attributs, $sqlBindWhere);
         }

        $requete->execute($attributs);

        $this->setResultQuery($requete);

        return $this;

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

  }

  function deleteCreationConception($where = NULL)
  {

    try
    {
      $sqlWhere = '';
      if(! is_null($where) ) {
        $sqlWhere = $this->generateWhere($where);
        $sqlBindWhere = $this->generateBindWhere($where);
      }

      $bd = $this->db;

      $requete = $bd->prepare('DELETE FROM `creation_conception` '.$sqlWhere);

      $attributs = $this->getNominativeMarker();

      if( isset($sqlBindWhere) && count($sqlBindWhere) > 0){
        $attributs = array_merge($attributs, $sqlBindWhere);
      }

      return $requete->execute($attributs);

    }
    catch(Exception $e)
    {
      die('Erreur : '.$e->getMessage());
    }


  }

    /**
     * Get the value of Id
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of Id
     *
     * @param mixed id
     *
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of Id Composant
     *
     * @return mixed
     */
    public function getIdComposant()
    {
        return $this->id_composant;
    }

    /**
     * Set the value of Id Composant
     *
     * @param mixed id_composant
     *
     * @return self
     */
    public function setIdComposant($id_composant)
    {
        $this->id_composant = $id_composant;

        return $this;
    }

    /**
     * Get the value of Id Creation
     *
     * @return mixed
     */
    public function getIdCreation()
    {
        return $this->id_creation;
    }

    /**
     * Set the value of Id Creation
     *
     * @param mixed id_creation
     *
     * @return self
     */
    public function setIdCreation($id_creation)
    {
        $this->id_creation = $id_creation;

        return $this;
    }

    /**
     * Get the value of Id User
     *
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Set the value of Id User
     *
     * @param mixed id_user
     *
     * @return self
     */
    public function setIdUser($id_user)
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of Date Create
     *
     * @return mixed
     */
    public function getDateCreate()
    {
        return $this->date_create;
    }

    /**
     * Set the value of Date Create
     *
     * @param mixed date_create
     *
     * @return self
     */
    public function setDateCreate($date_create)
    {
        $this->date_create = $date_create;

        return $this;
    }

}




?>
