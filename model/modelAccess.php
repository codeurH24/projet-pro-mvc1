<?php

function getAccess(){
  try
  {

      $db = dbConnect();

      $sql = '  SELECT access.*, role.id as `id_role`, role.nom FROM `access`
                INNER JOIN role ON role.id = access.role_id
      ';

      $result = $db->prepare($sql);
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
      $db = dbConnect();

      $sql = '  SELECT access.*, role.nom FROM `access`
                INNER JOIN role ON role.id = access.role_id
                WHERE access.id = :id
      ';

      $result = $db->prepare($sql);
      $result->execute([':id' => $id]);
      $access = $result->fetch(PDO::FETCH_OBJ);
      return $access;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

function getAccessByID_role($id){
  try
  {
      $db = dbConnect();

      $sql = '  SELECT access.*, role.nom FROM `access`
                INNER JOIN role ON role.id = access.role_id
                WHERE role.id = :id
      ';

      $result = $db->prepare($sql);
      $result->execute([':id' => $id]);
      $access = $result->fetchAll(PDO::FETCH_OBJ);
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
      $db = dbConnect();

      $sql = 'INSERT INTO `access`
              (`url`,`role_id`,`pass_right`)
              VALUES
              (:url, :role_id, :pass_right)
      ';

      $result = $db->prepare($sql);
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
      $db = dbConnect();

      $sql = 'UPDATE `access`
              SET
              url = :url, role_id = :role_id, pass_right = :pass_right
              WHERE
              id = :id
      ';

      $result = $db->prepare($sql);
      return $result->execute([':id' => $id,':url' => $url, ':role_id' => $id_role, ':pass_right' => $pass_right]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

function deleteAccess($id){
  try
  {
      $db = dbConnect();

      $sql = 'DELETE FROM `access` WHERE id = :id';

      $result = $db->prepare($sql);
      return $result->execute([':id' => $id]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

 ?>
