<?php
function getCompatibilities(){

  try
  {
    $db = dbConnect();

    $sql = 'SELECT
              compatibilite.id,
              composant1.id AS id1,
              composant1.model as model1,
              composant2.id AS id2,
              composant2.model as model2
            FROM `compatibilite`
            INNER JOIN composant AS composant1 ON composant1.id = compatibilite.id_composant1
            INNER JOIN composant AS composant2 ON composant2.id = compatibilite.id_composant2';

    $requete = $db->prepare($sql);
    $requete->execute();
    $compatibilities = $requete->fetchAll(PDO::FETCH_OBJ);
    return $compatibilities;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
function getCompatibilitie($id){

  try
  {
    $db = dbConnect();

    $sql = 'SELECT
              compatibilite.id,
              composant1.id AS id1,
              composant1.model as model1,
              composant2.id AS id2,
              composant2.model as model2
            FROM `compatibilite`
            INNER JOIN composant AS composant1 ON composant1.id = compatibilite.id_composant1
            INNER JOIN composant AS composant2 ON composant2.id = compatibilite.id_composant2
            WHERE compatibilite.id = :id';

    $requete = $db->prepare($sql);
    $requete->execute([':id' => $id]);
    $compatibilities = $requete->fetchAll(PDO::FETCH_OBJ);
    return $compatibilities;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
function createCompatibility($auteur, $id_composant1, $id_composant2){
  try
  {
    $db = dbConnect();

    $sql = 'INSERT INTO `compatibilite`
            (degrer, auteur, id_composant1, id_composant2, date_at)
            VALUES
            (:degrer, :auteur, :id_composant1, :id_composant2, :date_at)';

    $requete = $db->prepare($sql);
    $requete->execute([
      ':degrer' => 0,
      ':auteur' => $auteur,
      ':id_composant1' => $id_composant1,
      ':id_composant2' => $id_composant2,
      ':date_at' => dbDate()
    ]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
function updateCompatibility($id, $auteur, $id_composant1, $id_composant2){
  try
  {
    $db = dbConnect();

    $sql = 'UPDATE `compatibilite`
            SET
              degrer = 0,
              auteur = :auteur,
              id_composant1 = :id_composant1,
              id_composant2 = :id_composant2,
              date_at = :date_at
            WHERE id = :id';


    $requete = $db->prepare($sql);
    $requete->execute([
      ':id' => $id,
      ':auteur' => $auteur,
      ':id_composant1' => $id_composant1,
      ':id_composant2' => $id_composant2,
      ':date_at' => dbDate()
    ]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

function deleteCompatibility($id){
  try
  {
    $db = dbConnect();

    $sql = 'DELETE FROM `compatibilite` WHERE id = :id';

    $requete = $db->prepare($sql);
    $requete->execute([':id' => $id]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
 ?>
