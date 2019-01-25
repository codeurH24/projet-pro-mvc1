<?php
// require '/app/class/db.php';
function getUsers(){
	$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

	$requete = $bdd->prepare('SELECT * FROM `user`');

	$requete->execute();
	$users = $requete->fetchAll(PDO::FETCH_OBJ);
	return $users;
}

function getUserByID($id)
{
	try
	{
	    $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

			$requete = $bdd->prepare('SELECT * FROM `user` WHERE id = :id');

			$requete->bindValue(':id', $id);
			$requete->execute();
      $user = $requete->fetch(PDO::FETCH_OBJ);
      return $user;

	}
	catch(Exception $e)
	{
	    die('Erreur : '.$e->getMessage());
	}

}
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

function changePasswordUser($newPassword, $id=''){
	try
	{
			$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
			$sql =
			'	UPDATE user
				SET password = :password
				WHERE id = :id';
			$requete = $bdd->prepare('UPDATE `user`  SET password = :password WHERE id = :id');
			if( $id == ''){
				$requete->execute(['id' => UID(), ':password' => md5($newPassword)]);
			}else{
				$requete->execute(['id' => $id, ':password' => md5($newPassword)]);
			}


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

function createUser($nom, $prenom, $pseudo, $email, $age, $password, $date_registration, $date_last_login, $id_role){
	try
	{
			$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
			$sql = 'INSERT INTO user
			(
				`nom`,
				`prenom`,
				`pseudo`,
				`email`,
				`age`,
				`password`,
				`date_registration`,
				`date_last_login`,
				`id_role`
			) VALUES (
				:nom,
				:prenom,
				:pseudo,
				:email,
				:age,
				:password,
				:date_registration,
				:date_last_login,
				:id_role
			)';
			$requete = $bdd->prepare($sql);
			$isSuccess = $requete->execute([
				':nom' => $nom,
				':prenom' => $prenom,
				':pseudo' => $pseudo,
				':email' => $email,
				':age' => $age,
				':password' => $password,
				':date_registration' => $date_registration,
				':date_last_login' => $date_last_login,
				':id_role' => $id_role
			]);
			return $isSuccess;
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
}


function updateUser($id, $nom, $prenom, $pseudo, $email, $age, $id_role){
	try
	{
			$bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

			$sql = 'UPDATE `user`
			SET
			`nom` = :nom,
			`prenom` = :prenom,
			`pseudo` = :pseudo,
			`email` = :email,
			`age` = :age,
			`id_role` = :id_role
			WHERE
			id = :id';

			$requete = $bdd->prepare($sql);
			$isSuccess = $requete->execute([
				':id' => $id,
				':nom' => $nom,
				':prenom' => $prenom,
				':pseudo' => $pseudo,
				':email' => $email,
				':age' => $age,
				':id_role' => $id_role
			]);

			return $isSuccess;
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
}
