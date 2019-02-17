<?php
//SELECT * FROM `creation` WHERE `id_user` = $UID ORDER BY `creation`.`enable` DESC

function createCreation($name, $enable, $description, $id_user, $date_creation){
	try
	{
		$db = dbConnect();

		$sql = 'INSERT INTO creation (name, enable, description, id_user, date_creation)
		VALUES (:name, :enable, :description, :id_user, :date_creation);';
		$requete = $db->prepare($sql);
		$requete->execute([
			':name' => $name,
			':enable' => $enable,
			':description' => $description,
			':id_user' => $id_user,
			':date_creation' => $date_creation,
		]);

	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
}

function getCreationUser()
{
	try
	{
		if(UID()){
			$db = dbConnect();
			$sql = 'SELECT * FROM `creation` WHERE `id_user` = '.UID().' ORDER BY `creation`.`enable` DESC';
			$result = $db->query($sql);
			$creationList = $result->fetchAll(PDO::FETCH_OBJ);
			return $creationList;
		}else{
			exit('User no connect');
		}
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

}

function getCreationByID($id)
{
	try
	{
		$db = dbConnect();
		$sql = 'SELECT * FROM `creation` WHERE `id` = '.$id;
		$result = $db->query($sql);
		$creation = $result->fetchAll(PDO::FETCH_OBJ);
		return ( count($creation) > 0) ?  $creation[0] : false;
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

}

function getComponentOfCreationUser($idCreation=''){

	try
	{
		$db = dbConnect();

		if ( $idCreation != '' ){
			$sql =
			' SELECT creation.id, creation_conception.id AS `creationConceptionId`,composant.model, composant.id_cat FROM `creation_conception`
			RIGHT JOIN creation ON creation.id = creation_conception.id_creation
			RIGHT JOIN composant ON composant.id = creation_conception.id_composant
			WHERE creation.id_user = '.UID().' AND creation.id = '.$idCreation;
		}else{
			$sql =
			' SELECT creation.id, composant.id AS `id_composant`,composant.model, composant.id_cat FROM `creation_conception`
			RIGHT JOIN creation ON creation.id = creation_conception.id_creation
			RIGHT JOIN composant ON composant.id = creation_conception.id_composant
			WHERE creation.id_user = '.UID();
		}
		$result = $db->query($sql);
		$componentList = $result->fetchAll(PDO::FETCH_OBJ);
		return $componentList;

	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
}



function updateCreation($id, $name, $description){
	try
	{
		$db = dbConnect();

		$sql =
		' UPDATE creation
		SET name = :name, description= :description
		WHERE id = :id';

		$requete = $db->prepare($sql);
		$requete->execute([':id' => $id, ':name' => $name, ':description' => $description]);
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

}

function deleteCreation($id){

	try
	{
		$db = dbConnect();

		$sql = 'DELETE FROM creation WHERE id = '.$id;
		$result = $db->query($sql);

	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
}

function enableCreation($id, $enable=''){
	try
	{
		if ($enable !== '') {
			setEnableCreation($id, $enable);
		}else{
			return getEnableCreation($id);
		}
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

}
function setEnableCreation($id, $enable){
	try
	{

		$db = dbConnect();

		$sql =
		' UPDATE creation
		SET enable = :enable
		WHERE id = :id';

		$requete = $db->prepare($sql);
		$requete->execute([':id' => $id, ':enable' => $enable]);
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

}
function getEnableCreation($id){
	try
	{
		$db = dbConnect();

		$sql =
		' SELECT enable FROM creation
		WHERE id = :id';

		$requete = $db->prepare($sql);
		$requete->execute([':id' => $id]);
		$creation = $requete->fetchAll(PDO::FETCH_OBJ);
		return ( count($creation) > 0) ?  (bool)$creation[0]->enable : false;
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

}

function whoIsEnableInMyCreation(){
	try
	{
		$db = dbConnect();
		$sql = 'SELECT * FROM creation WHERE enable = \'1\' AND id_user = '.UID();
		$result = $db->query($sql);
		if($result === false){
			return false;
		}
		$creation= $result->fetch(PDO::FETCH_OBJ);
		if( $creation !== false ){
			return $creation->id;
		}else{
			return false;
		}

	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}
}


class Creation extends Database {

	protected $id;
	protected $name;
	protected $enable;
	protected $description;
	protected $id_user;
	protected $date_creation;

	function getCreation($where = NULL)
	{

		try
		{
			$sqlWhere = '';
			if(! is_null($where) ) {
				$sqlWhere = $this->generateWhere($where);
				$sqlBindWhere = $this->generateBindWhere($where);
			}

			$bd = $this->db;
			$requete = $bd->prepare('SELECT * FROM `creation` '.$sqlWhere.' ORDER BY `creation`.`enable` DESC');

			$attributs = $this->getNominativeMarker();

			if( isset($sqlBindWhere) && count($sqlBindWhere) > 0){
				// debug($sqlBindWhere);
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

	public function createCreation(){
		try
		{
			// connection à la database
			$bd = $this->db;

			// genere la chaine de colonne valeur au format Set
			// ne prend en compte que les attributs non null modifié par les setters
			$sqlSet = $this->getSqlSet();
			$requete = $bd->prepare('INSERT INTO `creation` SET '.$sqlSet);

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

	function deleteCreation($where = NULL)
	{

		try
		{
			$sqlWhere = '';
			if(! is_null($where) ) {
				$sqlWhere = $this->generateWhere($where);
				$sqlBindWhere = $this->generateBindWhere($where);
			}

			$bd = $this->db;

			$requete = $bd->prepare('DELETE FROM `creation` '.$sqlWhere);

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

	public function updateCreation($where = NULL){
		try
		{
			$sqlWhere = '';
			$sqlBindWhere = [];
			if(! is_null($where) ) {
				$sqlWhere = $this->generateWhere($where);
				$sqlBindWhere = $this->generateBindWhere($where);
			}


			// connection à la database
			$bd = $this->db;

			// genere la chaine de colonne valeur au format Set
			// ne prend en compte que les attributs non null modifié par les setters
			$sqlSet = $this->getSqlSet();
			$requete = $bd->prepare('UPDATE `creation` SET '.$sqlSet.' '.$sqlWhere);

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
     * Get the value of Name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of Name
     *
     * @param mixed name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of Enable
     *
     * @return mixed
     */
    public function getEnable()
    {
        return $this->enable;
    }

    /**
     * Set the value of Enable
     *
     * @param mixed enable
     *
     * @return self
     */
    public function setEnable($enable)
    {
        $this->enable = $enable;

        return $this;
    }

    /**
     * Get the value of Description
     *
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of Description
     *
     * @param mixed description
     *
     * @return self
     */
    public function setDescription($description)
    {
        $this->description = $description;

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
     * Get the value of Date Creation
     *
     * @return mixed
     */
    public function getDateCreation()
    {
        return $this->date_creation;
    }

    /**
     * Set the value of Date Creation
     *
     * @param mixed date_creation
     *
     * @return self
     */
    public function setDateCreation($date_creation)
    {
        $this->date_creation = $date_creation;

        return $this;
    }

}





?>
