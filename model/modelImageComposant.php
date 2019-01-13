<?php
function getImageComposant($id){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql = 'SELECT * FROM `image_composant` WHERE id_composant = :id';
      $result = $bdd->prepare($sql);
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
