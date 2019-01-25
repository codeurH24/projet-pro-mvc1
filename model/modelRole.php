<?php

function getRoles()
{
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

			$requete = $bdd->prepare('SELECT * FROM role');
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
			$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
			$requete = $bdd->prepare('SELECT * FROM role WHERE id = :id');
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
			$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
			$requete = $bdd->prepare('INSERT INTO role (`nom`) VALUES (:name)');
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
			$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
			$requete = $bdd->prepare('DELETE FROM role WHERE id = :id');
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
			$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
			$requete = $bdd->prepare('UPDATE role SET nom = :name WHERE id = :id');
			$isSuccess = $requete->execute([':id' => $id,':name' => $name]);
			return $isSuccess;
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
}



 ?>
