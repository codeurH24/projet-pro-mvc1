<?php

function getLogs($limit=''){
  try
  {
      $db = dbConnect();

      if ($limit != '') {
        $sql = 'SELECT * FROM log ORDER BY `date` DESC LIMIT '.$limit;
      }else{
        $sql = 'SELECT * FROM log ORDER BY `date` DESC';
      }
      $result = $db->prepare($sql);
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
      $db = dbConnect();

      $sql = 'SELECT COUNT(*) AS `rowCount` FROM log';
      $result = $db->prepare($sql);
      $result->execute();
      $countLogs = $result->fetch(PDO::FETCH_OBJ);
      return $countLogs->rowCount;
  }
  catch(Exception $e)
  {
      die('Erreur : '.$e->getMessage());
  }
}
