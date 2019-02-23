<?php
function getCompatibilities(){

  try
  {
    $db = dbConnect();

    $sql = 'SELECT
              compatibility.id,
              component1.id AS id1,
              component1.model as model1,
              component2.id AS id2,
              component2.model as model2
            FROM `compatibility`
            INNER JOIN composant AS component1 ON component1.id = compatibility.id_component1
            INNER JOIN composant AS component2 ON component2.id = compatibility.id_component2';

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
              compatibility.id,
              component1.id AS id1,
              component1.model as model1,
              component2.id AS id2,
              component2.model as model2
            FROM `compatibility`
            INNER JOIN composant AS component1 ON component1.id = compatibility.id_component1
            INNER JOIN composant AS component2 ON component2.id = compatibility.id_component2
            WHERE compatibility.id = :id';

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
function createCompatibility($autor, $id_component1, $id_component2){
  try
  {
    $db = dbConnect();

    $sql = 'INSERT INTO `compatibility`
            (degrer, autor, id_component1, id_component2, date_at)
            VALUES
            (:degrer, :autor, :id_component1, :id_component2, :date_at)';

    $requete = $db->prepare($sql);
    $requete->execute([
      ':degrer' => 0,
      ':autor' => $autor,
      ':id_component1' => $id_component1,
      ':id_component2' => $id_component2,
      ':date_at' => dbDate()
    ]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
function updateCompatibility($id, $autor, $id_component1, $id_component2){
  try
  {
    $db = dbConnect();

    $sql = 'UPDATE `compatibility`
            SET
              degrer = 0,
              autor = :autor,
              id_component1 = :id_component1,
              id_component2 = :id_component2,
              date_at = :date_at
            WHERE id = :id';


    $requete = $db->prepare($sql);
    $requete->execute([
      ':id' => $id,
      ':autor' => $autor,
      ':id_component1' => $id_component1,
      ':id_component2' => $id_component2,
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

    $sql = 'DELETE FROM `compatibility` WHERE id = :id';

    $requete = $db->prepare($sql);
    $requete->execute([':id' => $id]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
 ?>
