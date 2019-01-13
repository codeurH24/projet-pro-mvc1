<?php
//SELECT * FROM `creation` WHERE `id_user` = $UID ORDER BY `creation`.`enable` DESC

function createCreation($name, $enable, $description, $id_user, $date_creation){
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

		$sql = 'INSERT INTO creation (name, enable, description, id_user, date_creation)
						VALUES (:name, :enable, :description, :id_user, :date_creation);';
		$requete = $bdd->prepare($sql);
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
        $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
        $sql = 'SELECT * FROM `creation` WHERE `id_user` = '.UID().' ORDER BY `creation`.`enable` DESC';
        $result = $bdd->query($sql);
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
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
      $sql = 'SELECT * FROM `creation` WHERE `id` = '.$id;
      $result = $bdd->query($sql);
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
        $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

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
        $result = $bdd->query($sql);
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
		$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

		$sql =
		' UPDATE creation
			SET name = :name, description= :description
			WHERE id = :id';

		$requete = $bdd->prepare($sql);
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
        $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

        $sql = 'DELETE FROM creation WHERE id = '.$id;
        $result = $bdd->query($sql);

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

		$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

		$sql =
		' UPDATE creation
			SET enable = :enable
			WHERE id = :id';

		$requete = $bdd->prepare($sql);
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
		$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

		$sql =
		' SELECT enable FROM creation
			WHERE id = :id';

		$requete = $bdd->prepare($sql);
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
			$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
			$sql = 'SELECT * FROM creation WHERE enable = \'1\' AND id_user = '.UID();
			$result = $bdd->query($sql);
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

 ?>
