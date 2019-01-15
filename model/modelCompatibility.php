<?php
function getCompatibilities(){

  try
  {
    $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

    $sql = 'SELECT
              compatibilite.id,
              composant1.id AS id1,
              composant1.model as model1,
              composant2.id AS id2,
              composant2.model as model2
            FROM `compatibilite`
            INNER JOIN composant AS composant1 ON composant1.id = compatibilite.id_composant1
            INNER JOIN composant AS composant2 ON composant2.id = compatibilite.id_composant2';

    $requete = $bdd->prepare($sql);
    $requete->execute();
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
    $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

    $sql = 'INSERT INTO `compatibilite`
            (degrer, auteur, id_composant1, id_composant2, date_at)
            VALUES
            (:degrer, :auteur, :id_composant1, :id_composant2, :date_at)';

    $requete = $bdd->prepare($sql);
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
    $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

    $sql = 'UPDATE `compatibilite`
            SET
              degrer = 0,
              auteur = :auteur,
              id_composant1 = :id_composant1,
              id_composant2 = :id_composant2,
              date_at = :date_at
            WHERE id = :id';


    $requete = $bdd->prepare($sql);
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
    $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

    $sql = 'DELETE FROM `compatibilite` WHERE id = :id';

    $requete = $bdd->prepare($sql);
    $requete->execute([':id' => $id]);
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
 ?>
