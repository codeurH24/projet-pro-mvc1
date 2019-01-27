<?php

function getAccess(){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql = '  SELECT access.*, role.nom FROM `access`
                INNER JOIN role ON role.id = access.role_id
      ';

      $result = $bdd->prepare($sql);
      $result->execute();
      $access = $result->fetchAll(PDO::FETCH_OBJ);
      return $access;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

function getAccessByID($id){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql = '  SELECT access.*, role.nom FROM `access`
                INNER JOIN role ON role.id = access.role_id
                WHERE access.id = :id
      ';

      $result = $bdd->prepare($sql);
      $result->execute([':id' => $id]);
      $access = $result->fetch(PDO::FETCH_OBJ);
      return $access;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}


function createAccess($url, $id_role, $pass_right){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql = 'INSERT INTO `access`
              (`url`,`role_id`,`pass_right`)
              VALUES
              (:url, :role_id, :pass_right)
      ';

      $result = $bdd->prepare($sql);
      return $result->execute([':url' => $url, ':role_id' => $id_role, ':pass_right' => $pass_right]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

function updateAccess($id, $url, $id_role, $pass_right){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql = 'UPDATE `access`
              SET
              url = :url, role_id = :role_id, pass_right = :pass_right
              WHERE
              id = :id
      ';

      $result = $bdd->prepare($sql);
      return $result->execute([':id' => $id,':url' => $url, ':role_id' => $id_role, ':pass_right' => $pass_right]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

 ?>
