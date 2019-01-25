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

 ?>
