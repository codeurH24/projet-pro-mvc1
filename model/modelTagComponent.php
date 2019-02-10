<?php
function createTagsComponent($sql){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $result = $bdd->prepare($sql);
      return $result->execute();
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
 ?>
