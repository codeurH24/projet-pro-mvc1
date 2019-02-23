<?php
// require '/app/class/db.php';
function getUsers(){
	$db = dbConnect();

	$requete = $db->prepare('SELECT * FROM `user`');

	$requete->execute();
	$users = $requete->fetchAll(PDO::FETCH_OBJ);
	return $users;
}

function getUserByID($id)
{
	try
	{
	    $db = dbConnect();

			$requete = $db->prepare('SELECT * FROM `user` WHERE id = :id');

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
	    $db = dbConnect();

			if(empty($userPassword)){
				$requete = $db->prepare('SELECT * FROM `user` WHERE email LIKE :userEmail');
			}else{
				$requete = $db->prepare('SELECT * FROM `user` WHERE email LIKE :userEmail AND password LIKE :userPassword');
			}

			$requete->bindValue(':userEmail', $userEmail);
			if($userPassword != ''){
				$requete->bindValue(':userPassword', $userPassword);
			}

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
			$db = dbConnect();
			$sql =
			'	UPDATE user
				SET password = :password
				WHERE id = :id';
			$requete = $db->prepare('UPDATE `user`  SET password = :password WHERE id = :id');

			$newPassword = password_hash ( $newPassword , PASSWORD_BCRYPT ) ;
			if( $id == ''){
				$requete->execute(['id' => UID(), ':password' => $newPassword]);
			}else{
				$requete->execute(['id' => $id, ':password' => $newPassword]);
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
			$db = dbConnect();
			$sql = 'SELECT password FROM user WHERE id = :id';
			$requete = $db->prepare($sql);
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
			$db = dbConnect();
			$sql = 'SELECT COUNT(id) AS `count` FROM user';
			$requete = $db->query($sql);
			$AllUser = $requete->fetch(PDO::FETCH_OBJ);
			return $AllUser->count;
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
}

function createUser($pseudo, $email,$password, $date_registration, $date_last_login, $id_role){
	try
	{
			$db = dbConnect();
			$sql = 'INSERT INTO user
			(
				`pseudo`,
				`email`,
				`password`,
				`date_registration`,
				`date_last_login`,
				`id_role`
			) VALUES (
				:pseudo,
				:email,
				:password,
				:date_registration,
				:date_last_login,
				:id_role
			)';
			$requete = $db->prepare($sql);
			$isSuccess = $requete->execute([
				':pseudo' => $pseudo,
				':email' => $email,
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


function updateUser($id, $pseudo, $email, $id_role){
	try
	{
			$db = dbConnect();

			$sql = 'UPDATE `user`
			SET
			`pseudo` = :pseudo,
			`email` = :email,
			`id_role` = :id_role
			WHERE
			id = :id';

			$requete = $db->prepare($sql);
			$isSuccess = $requete->execute([
				':id' => $id,
				':pseudo' => $pseudo,
				':email' => $email,
				':id_role' => $id_role
			]);

			return $isSuccess;
	}
	catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
}

function deleteUser($id){
	try
	{
			$db = dbConnect();

			$sql = 'DELETE FROM `user` WHERE id = :id';

			$requete = $db->prepare($sql);
			$isSuccess = $requete->execute([
				':id' => $id
			]);

			return $isSuccess;
	}catch(Exception $e)
	{
			die('Erreur : '.$e->getMessage());
	}
}



class User extends Database{
	protected $id;
	protected $pseudo;
	protected $email;
	protected $password;
	protected $date_registration;
	protected $date_last_login;
	protected $id_role;


	public function getUser($where = NULL)
	{
		try
		{
				$sqlWhere = '';
				if(! is_null($where) ) {
					$sqlWhere = $this->generateWhere($where);
					$sqlBindWhere = $this->generateBindWhere($where);
				}

		    $bd = $this->db;
				$requete = $bd->prepare('SELECT * FROM `user` '.$sqlWhere);

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

	public function createUser(){
		try
		{
			// connection à la database
			$bd = $this->db;

			// genere la chaine de colonne valeur au format Set
			// ne prend en compte que les attributs non null modifié par les setters
			$sqlSet = $this->getSqlSet();
			$requete = $bd->prepare('INSERT INTO `user` SET '.$sqlSet);

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

	public function updateUser($where = NULL){
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
			$requete = $bd->prepare('UPDATE `user` SET '.$sqlSet.' '.$sqlWhere);

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
	public function deleteUser($where = NULL){
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
			$requete = $bd->prepare('DELETE FROM `user` '.$sqlWhere);

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
   * Get the value of Pseudo
   *
   * @return mixed
   */
  public function getPseudo()
  {
      return $this->pseudo;
  }

  /**
   * Set the value of Pseudo
   *
   * @param mixed pseudo
   *
   * @return self
   */
  public function setPseudo($pseudo)
  {
      $this->pseudo = $pseudo;

      return $this;
  }

  /**
   * Get the value of Email
   *
   * @return mixed
   */
  public function getEmail()
  {
      return $this->email;
  }

  /**
   * Set the value of Email
   *
   * @param mixed email
   *
   * @return self
   */
  public function setEmail($email)
  {
      $this->email = $email;

      return $this;
  }

  /**
   * Set the value of Age
   *
   * @param mixed age
   *
   * @return self
   */
  public function setAge($age)
  {
      $this->age = $age;

      return $this;
  }

  /**
   * Get the value of Password
   *
   * @return mixed
   */
  public function getPassword()
  {
      return $this->password;
  }

  /**
   * Set the value of Password
   *
   * @param mixed password
   *
   * @return self
   */
  public function setPassword($password)
  {
      $this->password = $password;

      return $this;
  }

  /**
   * Get the value of Date Registration
   *
   * @return mixed
   */
  public function getDateRegistration()
  {
      return $this->date_registration;
  }

  /**
   * Set the value of Date Registration
   *
   * @param mixed date_registration
   *
   * @return self
   */
  public function setDateRegistration($date_registration)
  {
      $this->date_registration = $date_registration;

      return $this;
  }

  /**
   * Get the value of Date Last Login
   *
   * @return mixed
   */
  public function getDateLastLogin()
  {
      return $this->date_last_login;
  }

  /**
   * Set the value of Date Last Login
   *
   * @param mixed date_last_login
   *
   * @return self
   */
  public function setDateLastLogin($date_last_login)
  {
      $this->date_last_login = $date_last_login;

      return $this;
  }

  /**
   * Get the value of Id Role
   *
   * @return mixed
   */
  public function getIdRole()
  {
      return $this->id_role;
  }

  /**
   * Set the value of Id Role
   *
   * @param mixed id_role
   *
   * @return self
   */
  public function setIdRole($id_role)
  {
      $this->id_role = $id_role;

      return $this;
  }

}
