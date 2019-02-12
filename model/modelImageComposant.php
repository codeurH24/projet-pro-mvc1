<?php
function getImageComposant($id){
  try
  {
      $db = dbConnect();

      $sql = 'SELECT * FROM `image_composant` WHERE id_composant = :id';
      $result = $db->prepare($sql);
      $result->execute(['id' => $id]);
      $imageComposant = $result->fetch(PDO::FETCH_OBJ);
      return $imageComposant;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
?>
