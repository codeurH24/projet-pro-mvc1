<?php
class Db{

  private $db;

  private function __construct(){
    $this->$db = new PDO('mysql:host=localhost;dbname=pc-config;charset=utf8', 'codeurh24', base64_decode('QGxhbWFudTEyMzQ=') );
  }

  private function __destruct(){
    $this->$db = NULL;
  }
}

 ?>
