<?php
function getResellers(){
  try
  {
      $db = dbConnect();

      $sql = 'SELECT * FROM reseller';
      $result = $db->prepare($sql);
      $result->execute();
      $resellers = $result->fetchAll(PDO::FETCH_OBJ);
      return $resellers;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

function getReseller($id){
  try
  {
      $db = dbConnect();

      $sql = 'SELECT * FROM reseller WHERE id = :id';
      $result = $db->prepare($sql);
      $result->execute(['id' => $id]);
      $reseller = $result->fetch(PDO::FETCH_OBJ);
      return $reseller;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

function createReseller($name){
  try
  {
      $db = dbConnect();

      $sql =
      'INSERT INTO reseller
      (`name`)
      VALUES
      (:name)';
      $result = $db->prepare($sql);
      $result->execute([':name' => $name]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

function updateReseller($id, $name){
  try
  {
      $db = dbConnect();

      $sql = 'UPDATE reseller SET name = :name WHERE id = :id';
      $result = $db->prepare($sql);
      $result->execute([':id' => $id, ':name' => $name]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

function deleteReseller($id){
  try
  {
      $db = dbConnect();

      $sql =
      'DELETE FROM reseller WHERE id = :id';
      $result = $db->prepare($sql);
      $result->execute([':id' => $id]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

 ?>
