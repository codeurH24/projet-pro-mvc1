<?php
function createCategory($name){
  try
  {
      $db = dbConnect();

      $sql = 'INSERT INTO categorie (`nom`) VALUES (:name)';

      $result = $db->prepare($sql);
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
      $db = dbConnect();

      $sql = 'SELECT * FROM categorie ORDER BY `nom` DESC';

      $result = $db->prepare($sql);
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
      $db = dbConnect();

      $sql = 'SELECT * FROM categorie WHERE id = :id';

      $result = $db->prepare($sql);
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
      $db = dbConnect();

      $sql = 'DELETE FROM categorie WHERE id = :id';
      $result = $db->prepare($sql);
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
      $db = dbConnect();

      $sql = 'UPDATE categorie SET nom = :nom WHERE id = :id';
      $result = $db->prepare($sql);
      $result->execute(['id' => $id, 'nom' => $nom]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

?>
