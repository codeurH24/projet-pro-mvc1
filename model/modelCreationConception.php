<?php
function creationConceptionDelete($id){
  try
  {
      $db = dbConnect();
      $sql = 'DELETE FROM `creation_conception` WHERE `creation_conception`.`id` = '.$id;
      $result = $db->query($sql);
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
        // exit('function qui montre la creation');
        $sqlWhere = '';
        if(! is_null($where) ) {
          $sqlWhere = $this->generateWhere($where);
          $sqlBindWhere = $this->generateBindWhere($where);
        }
        // print_r($sqlWhere);
        // exit();

        $bd = $this->db;
        $requete = $bd->prepare(' SELECT creation_conception.*, composant.model, composant.id_cat, categorie.nom FROM `creation_conception`
                                  LEFT JOIN composant ON composant.id = creation_conception.id_composant
                                  LEFT JOIN categorie ON categorie.id = composant.id_cat
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
        // echo '<pre>';
        // $requete->debugDumpParams();
        // exit;

        $this->setResultQuery($requete);

        return $this;

    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

  }

  public function createCreationConception(){
		try
		{
			// connection à la database
			$bd = $this->db;

			// genere la chaine de colonne valeur au format Set
			// ne prend en compte que les attributs non null modifié par les setters
			$sqlSet = $this->getSqlSet();
      // echo($sqlSet.'<br />');
			$requete = $bd->prepare('INSERT INTO `creation_conception` SET '.$sqlSet);

			// ne prend en compte que les attributs non null modifié par les setters
			$attributs = $this->getNominativeMarker();
      // print_r($attributs);
      // exit();

			$isSuccess = $requete->execute($attributs);
      if($isSuccess === false){
        echo '<pre>';
        $requete->debugDumpParams();
        exit;
      }

			return $isSuccess;
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
