<?php
function creationConceptionDelete($id){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
      $sql = 'DELETE FROM `creation_conception` WHERE `creation_conception`.`id` = '.$id;
      $result = $bdd->query($sql);
      return true;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
?>
