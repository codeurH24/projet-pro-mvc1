<?php
function createTagsComponent($sql){
  try
  {
      $db = dbConnect();

      $result = $db->prepare($sql);
      return $result->execute();
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
 ?>
