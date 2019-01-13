<?php
function createCategory($name){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql = 'INSERT INTO categorie (`nom`) VALUES (:name)';

      $result = $bdd->prepare($sql);
      $result->execute([':name' => $name]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

function getCategories(){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql = 'SELECT * FROM categorie ORDER BY `nom` DESC';

      $result = $bdd->prepare($sql);
      $result->execute();
      $categories = $result->fetchAll(PDO::FETCH_OBJ);
      return $categories;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
function getCategory($id){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql = 'SELECT * FROM categorie WHERE id = :id';

      $result = $bdd->prepare($sql);
      $result->execute(['id' => $id]);
      $category = $result->fetch(PDO::FETCH_OBJ);
      return $category;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
function deleteCategory($id){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql = 'DELETE FROM categorie WHERE id = :id';
      $result = $bdd->prepare($sql);
      $result->execute(['id' => $id]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
function updateCategory($id, $nom){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql = 'UPDATE categorie SET nom = :nom WHERE id = :id';
      $result = $bdd->prepare($sql);
      $result->execute(['id' => $id, 'nom' => $nom]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

?>
