<?php

function getRoles()
{
	try
	{
	    $db = dbConnect();

			$requete = $db->prepare('SELECT * FROM role');
			$requete->execute();
      $users = $requete->fetchAll(PDO::FETCH_OBJ);
      return $users;

	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

}

function getRoleByID($id){
	try
	{
			$db = dbConnect();
			$requete = $db->prepare('SELECT * FROM role WHERE id = :id');
			$requete->execute([':id' => $id]);
			$user = $requete->fetch(PDO::FETCH_OBJ);
			return $user;

	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
}

function createRole($name){
	try
	{
			$db = dbConnect();
			$requete = $db->prepare('INSERT INTO role (`nom`) VALUES (:name)');
			$isSuccess = $requete->execute([':name' => $name]);
			return $isSuccess;

	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
}

function deleteRole($id){
	try
	{
			$db = dbConnect();
			$requete = $db->prepare('DELETE FROM role WHERE id = :id');
			$isSuccess = $requete->execute([':id' => $id]);
			return $isSuccess;
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
}

function updateRole($id, $name){
	try
	{
			$db = dbConnect();
			$requete = $db->prepare('UPDATE role SET nom = :name WHERE id = :id');
			$isSuccess = $requete->execute([':id' => $id,':name' => $name]);
			return $isSuccess;
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
}

class Role extends Database{

	protected $id;
	protected $nom;

	public function update($where = NULL){
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
			$requete = $bd->prepare('UPDATE `role` SET '.$sqlSet.' '.$sqlWhere);

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
     * Get the value of Nom
     *
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of Nom
     *
     * @param mixed nom
     *
     * @return self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

}

 ?>
