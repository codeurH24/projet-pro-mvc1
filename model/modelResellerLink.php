<?php
function getResellerLinks(){
  try
  {
      $db = dbConnect();

      $sql = 'SELECT * FROM revendeur_composant';
      $result = $db->prepare($sql);
      $result->execute();
      $links = $result->fetchAll(PDO::FETCH_OBJ);
      return $links;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
function getResellerLink($id){
  try
  {
      $db = dbConnect();

      // $sql = 'SELECT * FROM revendeur_composant WHERE id = :id';
      $sql = 'SELECT revendeur_composant.*, composant.model, revendeur.nom   FROM `revendeur_composant`
              INNER JOIN composant ON composant.id = revendeur_composant.id_component
              INNER JOIN revendeur ON revendeur.id = revendeur_composant.id_revendeur
              WHERE revendeur_composant.id = :id';
      $result = $db->prepare($sql);
      $result->execute([':id' => $id]);
      $link = $result->fetch(PDO::FETCH_OBJ);
      return $link;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
function createResellerLink($price, $link, $id_revendeur, $id_component){
  try
  {
    $db = dbConnect();

    $sql = 'INSERT INTO revendeur_composant
            (prix, lien, autor, id_revendeur, id_component, date_at)
            VALUES
            (:prix, :lien, :autor, :id_revendeur, :id_component, :date_at)';
    $result = $db->prepare($sql);
    $result->execute([
      ':prix' => $price,
      ':lien' => $link,
      ':autor' => $_SESSION['user']['pseudo'],
      ':id_revendeur' => $id_revendeur,
      ':id_component' => $id_component,
      ':date_at' => dbDate()
    ]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

function updateResellerLink($id, $price, $link, $id_revendeur, $id_component){
  try
  {
    $db = dbConnect();

    $sql = 'UPDATE revendeur_composant
            SET
            prix = :prix,
            lien = :lien,
            autor = :autor,
            id_revendeur = :id_revendeur,
            id_component = :id_component,
            date_at = :date_at
            WHERE id = :id';
    $result = $db->prepare($sql);
    $result->execute([
      ':id' => $id,
      ':prix' => $price,
      ':lien' => $link,
      ':autor' => $_SESSION['user']['pseudo'],
      ':id_revendeur' => $id_revendeur,
      ':id_component' => $id_component,
      ':date_at' => dbDate()
    ]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
function deleteResellerLink($id){
  try
  {
    $db = dbConnect();

    $sql = 'DELETE FROM revendeur_composant WHERE id = :id';
    $result = $db->prepare($sql);
    $result->execute([':id' => $id]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}


 ?>
