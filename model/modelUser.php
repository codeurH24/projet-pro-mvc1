<?php
// require '/app/class/db.php';
function getUser($userEmail, $userPassword='')
{
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

			if(empty($userPassword)){
				$requete = $bdd->prepare('SELECT * FROM `user` WHERE email LIKE :userEmail');
			}else{
				$requete = $bdd->prepare('SELECT * FROM `user` WHERE email LIKE :userEmail AND password LIKE :userPassword');
			}

			$requete->bindValue(':userEmail', $userEmail);
			$requete->bindValue(':userPassword', $userPassword);
			$requete->execute();
      $user = $requete->fetchAll(PDO::FETCH_OBJ);
      return ( count($user) > 0) ?  $user[0] : false;

	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

}

function changePasswordUser($newPassword){
	try
	{
			$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
			$sql =
			'	UPDATE user
				SET password = :password
				WHERE id = :id';
			$requete = $bdd->prepare('UPDATE `user`  SET password = :password WHERE id = :id');
			$requete->execute(['id' => UID(), ':password' => md5($newPassword)]);

	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
}
function getPasswordUser(){
	try
	{
			$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
			$sql = 'SELECT password FROM user WHERE id = :id';
			$requete = $bdd->prepare($sql);
			$requete->execute(['id' => UID()]);
			$password = $requete->fetchAll(PDO::FETCH_OBJ);
      return ( count($password) > 0) ?  $password[0]->password : false;

	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
}

function countAllUser(){
	try
	{
			$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
			$sql = 'SELECT COUNT(id) AS `count` FROM user';
			$requete = $bdd->query($sql);
			$AllUser = $requete->fetch(PDO::FETCH_OBJ);
			return $AllUser->count;
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
}
