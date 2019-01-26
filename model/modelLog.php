<?php

function getLogs($limit=''){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      if ($limit != '') {
        $sql = 'SELECT * FROM log ORDER BY `date` DESC LIMIT '.$limit;
      }else{
        $sql = 'SELECT * FROM log ORDER BY `date` DESC';
      }
      $result = $bdd->prepare($sql);
      $result->execute();
      $logs = $result->fetchAll(PDO::FETCH_OBJ);
      return $logs;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}

function countLogs(){
  try
  {
      $bdd = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );

      $sql = 'SELECT COUNT(*) AS `rowCount` FROM log';
      $result = $bdd->prepare($sql);
      $result->execute();
      $countLogs = $result->fetch(PDO::FETCH_OBJ);
      return $countLogs->rowCount;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
