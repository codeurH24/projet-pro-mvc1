<?php
function createCategory($name){
  try
  {
      $db = dbConnect();

      $sql = 'INSERT INTO category (`name`) VALUES (:name)';

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

      $sql = 'SELECT * FROM category ORDER BY `name` DESC';

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

      $sql = 'SELECT * FROM category WHERE id = :id';

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

      $sql = 'DELETE FROM category WHERE id = :id';
      $result = $db->prepare($sql);
      $result->execute(['id' => $id]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
function updateCategory($id, $name){
  try
  {
      $db = dbConnect();

      $sql = 'UPDATE category SET name = :name WHERE id = :id';
      $result = $db->prepare($sql);
      $result->execute(['id' => $id, 'name' => $name]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

?>
