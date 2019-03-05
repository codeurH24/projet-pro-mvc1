<?php
// cette classe permet de gerer les modelles
// elle simplifie le developpement de chaque modele de table
class Database  implements Countable {

  // mémorise le resultat d'une requete pour ensuite avoir la possibilité
  // de recuperer un ou plusieurs resultat de recherche.
  private $resultQuery;
  // compte le nombre de resultats retourné par mysql
  private $resultCount;

  // creer la connection pour communiquer en entre  php et la base de données
  // dbName en mysql
  function __construct() {
    $this->db = new PDO('mysql:host='.dbHost.';dbname='.dbName.';charset=utf8', dbUser, dbPass );
  }

  // génere une partie de la requete.
  // créer automatiquement la partie set d'un select mysql ou update mysql
  protected function getSqlSet() {

    // recupere tout les attributs non nule de la classe enfant.
    $attributs = $this->getAttributeNotNull();

    // initialise la chaine returné par la fonction getSqlSet()
    $sqlSet = '';
    // pour chaque attributs de la classe, je concatène
    // les noms d'attributs (non nule)
    foreach ($attributs as $key => $value) {
      $sqlSet .= "`$key` = :$key ,";
    }
    // j'élimite le caratère à virgule a la fin de la chaine car cela n'est
    // pas comforme au sql. un champ sql dans SET ou le dernier écrit,
    //  n'a aucne raison d'etre séparer par une vigule.
    // Trim() return a la function getSqlSet() la chaine sans la virgule
    //  a la fin.
    return trim($sqlSet,',');
  }

  // recupere tout les attributs non nule de la classe enfant.
  protected function getAttributeNotNull() {

    // fonction qui returne tout les attributs non nule de la classe.
    // C'est a dire tout les attribut qui ont été volontairement modifier
    // dans la classe
    // par le developpeur pour en modifier le contenu.
    $attributs = array_filter(get_object_vars($this), function ($var){
      // chaque valeurs non nules copie le nouveau tableau dans la variable
      // $attributs seulement si c'est vrai que la valeur
      // du tableur est non nule
      // et que ce n'est pas l'objet database qui est deja un attribut utilisé
      //  pour la connexion.
      return(!is_null($var) && !is_object($var));
    });

    return $attributs;
  }

  // affecte le nombre de resultats d'un requete
  // dans la proprieté de la classe
  protected function setResultCount(){
    $this->resultCount = $this->resultQuery->rowCount();
  }
  // recupère le nombre de résultat d'une requete.
  protected function getResultCount(){
    return $this->resultCount;
  }

  // recupere dans la proprite de la classe l'objet PDO de requete.
  // pour par la suite pouvoir par exemple recuperer
  // le resultat demander sous la forme que l'on désire
  // ou pour d'autre possibilités...
  protected function setResultQuery($requete){
    $this->resultQuery = $requete;
    return ($this->resultQuery == $requete) ? $this->resultQuery: false;
  }

  // php 7 demande de creer un function count pour rendre la classe
  // comptable avec la fonction count()
  public function count()
  {
      return $this->getResultCount();
  }

  // getteur de la classe pour retourne proprement
  //  la proprietée $resultQuery de la classe
  // Cette fonction n'est pas utilisé pour le moment.
  // (mise en place trop longue pour respecter le livrable)
  protected function getResultQuery(){
    return $this->resultQuery;
  }

  // returne la premiere ligne du tableau de résultat.
  // Nule besoin de preciser la ligne car cela returne deja la ligne.
  // Avec ce retour, reste juste a preciser le colonne désiré.
  public function get($fetch_style = PDO::FETCH_OBJ){
    $result = $this->resultQuery->fetch($fetch_style);
    $this->setResultCount();
    return $result;
  }

  // retourne tout un tableau de résultats
  public function gets($fetch_style = PDO::FETCH_OBJ){
    $result = $this->resultQuery->fetchAll($fetch_style);
    $this->setResultCount();
    return $result;
  }

  // génére la chaine WHERE SQL dans une requete
  // Utile pour l'argument de la fonction membre de l'objet enfant.
  protected function generateWhere($arr){
    if(is_array($arr)){
      $sqlWhere = ' WHERE ';
      // $attributs = $this->getAttributeNotNull();
      // recupere tout les wheres et les split en 2 sous forme
      //  de nom de colonne et comparateur (operateur)
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

  // fonction qui va de paire avec la fonction getSqlSet()
  // En PDO le Bind sécurise les données envoyé par l'utilisateur du site.
  // Chaque valeurs crée ou modifié est associé à des marqueurs nominatifs
  // Ces marqueurs sont lier bien souvent aux post ou get
  // des url ou formulaires
  protected function generateBindWhere($arr){
    if(is_array($arr)){
      $sqlBind = [];
      // $attributs = $this->getAttributeNotNull();
      // recupere tout les wheres et les split en 2 sous forme
      // de nom de colonne et comparateur (operateur)
      foreach ($arr as  $sqlArr) {
        list($colName, $operator, $value) = $sqlArr;
        // echo strpos($colName, '.');
        if( strpos($colName, '.') !== false ){
          $tableColonneName = explode ( '.' , $colName);
          $tableName = $tableColonneName[0];
          $colName = $tableColonneName[1];
        }


        if (isset($tableName)) {
          $colNameValue = $tableName.ucfirst($colName);
          $sqlBind[":$colNameValue"] = $value;
        }else{
          $sqlBind[":$colName"] = $value;
        }

      }
      //$sqlWhere = trim($sqlWhere,' ,');

      return  $sqlBind;
    }
    return false;
  }

  // cette fonction simplifie le developpement de la classe
  // Cela permet d'obtenir automatique des marqueurs nominatifs PDO
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

  // cette fonction execute du script une fois le script php terminé
  function __destruct() {
      // éfface le connexion a la base de données
      $this->db = NULL;
  }
}
