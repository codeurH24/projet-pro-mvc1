<?php
function getResellers(){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql = 'SELECT * FROM revendeur';
      $result = $bdd->prepare($sql);
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
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql = 'SELECT * FROM revendeur WHERE id = :id';
      $result = $bdd->prepare($sql);
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
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql =
      'INSERT INTO revendeur
      (`nom`)
      VALUES
      (:name)';
      $result = $bdd->prepare($sql);
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
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql = 'UPDATE revendeur SET nom = :name WHERE id = :id';
      $result = $bdd->prepare($sql);
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
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql =
      'DELETE FROM revendeur WHERE id = :id';
      $result = $bdd->prepare($sql);
      $result->execute([':id' => $id]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

 ?>
