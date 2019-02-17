<?php
class Database  implements Countable {

  private $resultQuery;
  private $resultCount;

  function __construct() {
    $this->db = new PDO('mysql:host='.dbHost.';dbname='.dbName.';charset=utf8', dbUser, dbPass );
  }

  protected function getSqlSet() {

    $attributs = $this->getAttributeNotNull();

    $sqlSet = '';
    foreach ($attributs as $key => $value) {
      $sqlSet .= "`$key` = :$key ,";
    }
    return trim($sqlSet,',');
  }

  protected function getAttributeNotNull() {

    $attributs = array_filter(get_object_vars($this), function ($var){
      return(!is_null($var) && !is_object($var));
    });

    return $attributs;
  }

  protected function setResultCount(){
    $this->resultCount = $this->resultQuery->rowCount();
  }

  protected function getResultCount(){
    return $this->resultCount;
  }

  protected function setResultQuery($requete){
    $this->resultQuery = $requete;
    return ($this->resultQuery == $requete) ? $this->resultQuery: false;
  }
  public function count()
  {
      return $this->getResultCount();
  }

  protected function getResultQuery(){
    return $this->resultQuery;
  }

  public function get($fetch_style = PDO::FETCH_OBJ){
    $result = $this->resultQuery->fetch($fetch_style);
    $this->setResultCount();
    return $result;
  }

  public function gets($fetch_style = PDO::FETCH_OBJ){
    $result = $this->resultQuery->fetchAll($fetch_style);
    $this->setResultCount();
    return $result;
  }

  protected function generateWhere($arr){
    if(is_array($arr)){
      $sqlWhere = ' WHERE ';
      // $attributs = $this->getAttributeNotNull();
      // recupere tout les wheres et les split en 2 sous forme de nom de colonne et comparateur (operateur)
      foreach ($arr as  $sqlArr) {
        list($colName, $operator, $value) = $sqlArr;
        // echo strpos($colName, '.');
        if( strpos($colName, '.') !== false ){
          $tableColonneName = explode ( '.' , $colName);
          $tableName = $tableColonneName[0];
          $colName = $tableColonneName[1];
        }

        // if( array_key_exists ( $colName , $attributs )){
          if (isset($tableName)) {
            $colNameValue = $tableName.ucfirst($colName);
            $sqlWhere .= "`$tableName`.`$colName` $operator :$colNameValue and ";
          }else{
            $sqlWhere .= "`$colName` $operator :$colName and ";
          }
        // }
      }
      // echo substr($sqlWhere, 0,strlen($sqlWhere)-4);
      // echo($sqlWhere);
      $sqlWhere = substr($sqlWhere, 0,strlen($sqlWhere)-4);
      return  $sqlWhere;
    }
    return false;
  }

  protected function generateBindWhere($arr){
    if(is_array($arr)){
      $sqlBind = [];
      // $attributs = $this->getAttributeNotNull();
      // recupere tout les wheres et les split en 2 sous forme de nom de colonne et comparateur (operateur)
      foreach ($arr as  $sqlArr) {
        list($colName, $operator, $value) = $sqlArr;
        // echo strpos($colName, '.');
        if( strpos($colName, '.') !== false ){
          $tableColonneName = explode ( '.' , $colName);
          $tableName = $tableColonneName[0];
          $colName = $tableColonneName[1];
        }

        // if( array_key_exists ( $colName , $attributs )){
          if (isset($tableName)) {
            $colNameValue = $tableName.ucfirst($colName);
            //$sqlWhere .= "`$tableName`.`$colName` $operator :$colNameValue , ";
            $sqlBind[":$colNameValue"] = $value;
          }else{
            //$sqlWhere .= "`$colName` $operator :$colName , ";
            $sqlBind[":$colName"] = $value;
          }
        // }
      }
      //$sqlWhere = trim($sqlWhere,' ,');

      return  $sqlBind;
    }
    return false;
  }

  protected function getNominativeMarker(){
    // ne prend en compte que les attributs non null modifié par les setters
    $attributs = $this->getAttributeNotNull();

    // fabrique des marqueurs nominatif
    $attributsTemp = [];
    foreach ($attributs as $key => $value) {
      $attributsTemp[':'.$key] = $value;
    }
    return $attributsTemp;
  }

  function __destruct() {
      $this->db = NULL;
  }
}
