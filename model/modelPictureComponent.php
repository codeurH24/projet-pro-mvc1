<?php
function getPictureComponent($id){
  try
  {
      $db = dbConnect();

      $sql = 'SELECT * FROM `picture_component` WHERE id_component = :id';
      $result = $db->prepare($sql);
      $result->execute(['id' => $id]);
      $pictureComposant = $result->fetch(PDO::FETCH_OBJ);
      return $pictureComposant;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
?>
