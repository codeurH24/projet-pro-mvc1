<?php
function createTagsComponent($sql){
  try
  {
      $db = dbConnect();

      $result = $db->prepare($sql);
      return $result->execute();
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}


class Tag extends Database{

	protected $id;
	protected $id_component;
	protected $tag;


	public function select($where = NULL)
	{
		try
		{
				$sqlWhere = '';
				if(! is_null($where) ) {
					$sqlWhere = $this->generateWhere($where);
					$sqlBindWhere = $this->generateBindWhere($where);
				}

		    $bd = $this->db;
				$requete = $bd->prepare('SELECT * FROM `compatibility_tag` '.$sqlWhere);

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

	public function createTag(){
		try
		{
			// connection à la database
			$bd = $this->db;

			// genere la chaine de colonne valeur au format Set
			// ne prend en compte que les attributs non null modifié par les setters
			$sqlSet = $this->getSqlSet();
			$requete = $bd->prepare('INSERT INTO `compatibility_tag` SET '.$sqlSet);

			// ne prend en compte que les attributs non null modifié par les setters
			$attributs = $this->getNominativeMarker();

			$isSuccess = $requete->execute($attributs);
			return $isSuccess;
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
	}

	public function updateTag($where = NULL){
		try
		{
			// connection à la database
			$bd = $this->db;

			$sqlWhere = '';
			if(! is_null($where) ) {
				$sqlWhere = $this->generateWhere($where);
				$sqlBindWhere = $this->generateBindWhere($where);
			}

			// genere la chaine de colonne valeur au format Set
			// ne prend en compte que les attributs non null modifié par les setters
			$sqlSet = $this->getSqlSet();
			$requete = $bd->prepare('UPDATE `compatibility_tag` SET '.$sqlSet.' '.$sqlWhere);

			// ne prend en compte que les attributs non null modifié par les setters
			$attributs = $this->getNominativeMarker();

			if( isset($sqlBindWhere) && count($sqlBindWhere) > 0){
				$attributs = array_merge($attributs, $sqlBindWhere);
			}

			$isSuccess = $requete->execute($attributs);
			return $isSuccess;
		}
		catch(Exception $e)
		{
				die('Erreur : '.$e->getMessage());
		}
	}
	public function deleteTag($where = NULL){
		try
		{
			// connection à la database
			$bd = $this->db;

			$sqlWhere = '';
			if(! is_null($where) ) {
				$sqlWhere = $this->generateWhere($where);
				$sqlBindWhere = $this->generateBindWhere($where);
			}

			// genere la chaine de colonne valeur au format Set
			// ne prend en compte que les attributs non null modifié par les setters
			$sqlSet = $this->getSqlSet();
			$requete = $bd->prepare('DELETE FROM `compatibility_tag` '.$sqlWhere);

			// ne prend en compte que les attributs non null modifié par les setters
			$attributs = $this->getNominativeMarker();

			if( isset($sqlBindWhere) && count($sqlBindWhere) > 0){
				$attributs = array_merge($attributs, $sqlBindWhere);
			}

			$isSuccess = $requete->execute($attributs);
			return $isSuccess;
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
        return $this->id_component;
    }

    /**
     * Set the value of Id Composant
     *
     * @param mixed id_component
     *
     * @return self
     */
    public function setIdComposant($id_component)
    {
        $this->id_component = $id_component;

        return $this;
    }

    /**
     * Get the value of Tag
     *
     * @return mixed
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set the value of Tag
     *
     * @param mixed tag
     *
     * @return self
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

}
 ?>
