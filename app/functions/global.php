<?php

  function view($viewFile, $vars = []){
    // genenrate CSRF token
    global $errorsForm;
    foreach ($vars as $key => $value) {
      $$key = $value;
    }
    ob_start();
    require 'view/'.$viewFile;
    $content = ob_get_clean();
    require('view/template.php');
  }

  function UID(){
    if (isset($_SESSION['user'])) {
      return $_SESSION['user']['id'];
    }else{
      return false;
    }
  }

  function dbDate(){
    return date('Y-m-d H:i:s');
  }


  function redirect_post($url, array $data, array $headers = null) {
    $params = array(
        'http' => array(
            'method' => 'POST',
            'content' => http_build_query($data)
        )
    );
    if (!is_null($headers)) {
        $params['http']['header'] = '';
        foreach ($headers as $k => $v) {
            $params['http']['header'] .= "$k: $v\n";
        }
    }
    $ctx = stream_context_create($params);
    $fp = @fopen($url, 'rb', false, $ctx);
    if ($fp) {
        // echo @stream_get_contents($fp);
        // die();
        return true;
    } else {
        // Error
        throw new Exception("Error loading '$url', $php_errormsg");
    }
}

function debug($value){
    echo '<pre>';
    var_dump($value);
    echo '\n<br >';
    print_r($value);
    exit;
}

function dbConnect(){
  return new PDO('mysql:host='.dbHost.';dbname='.dbName.';charset=utf8', dbUser, dbPass );
}

function access(){
  require_once('model/modelAccess.php');
  if( !isset($_SESSION['user']) ){
    // 5 correspond au role 'aucun'
    $accessList = getAccessByID_role(5);
  }else{
    $accessList = getAccessByID_role($_SESSION['user']['roleID']);
  }
  if( $accessList !== false and count((array)$accessList) > 0 ){

    foreach ($accessList as $access) {
      $access->url = str_replace('/', '\/', $access->url);
      $access->url = trim($access->url);

      if (preg_match('/'.$access->url.'/m', $_SERVER['REQUEST_URI'])) {

          if( isset($access->pass_right) and $access->pass_right == 1){
            return true;
          }else{
            return false;
          }
      }
    }
  }else{
    return true;
  }
  return true;

  $mysqli->close();
}

function accessElement($url){
  require_once('model/modelAccess.php');
  if( !isset($_SESSION['user']) ){
    // 5 correspond au role 'aucun'
    $accessList = getAccessByID_role(5);
  }else{
    $accessList = getAccessByID_role($_SESSION['user']['roleID']);
  }
  if( $accessList !== false and count((array)$accessList) > 0 ){

    foreach ($accessList as $access) {
      $access->url = str_replace('/', '\/', $access->url);
      $access->url = trim($access->url);

      if (preg_match('/'.$access->url.'/m', $url)) {

          if( isset($access->pass_right) and $access->pass_right == 1){
            return true;
          }else{
            return false;
          }
      }
    }
  }else{
    return true;
  }
  return true;

  $mysqli->close();
}


function errorsForm($nameInput = NULL, $value = NULL){
  global $errorsForm;



  // returne entierement le tableau d'erreurs si aucun argument n'est renseigner
  if (is_null($nameInput)) {
    if (is_null($errorsForm)) {
      return [];
    }else{
      return $errorsForm;
    }
  }

  // si $nameInput est renseigner et $value aussi alors c'est
  // que la function n'est plus un getter mais un setter du tableau d'erreurs
  if (!is_null($value)) {
    $errorsForm[$nameInput][] = $value;
    return true;
  }

  // dans tout les autre cas c'est que l'on souhaite juste afficher les erreurs d'un imput
  if (isset($errorsForm[$nameInput]) && count($errorsForm[$nameInput]) > 0):
    foreach ($errorsForm[$nameInput] as $value):
      ?><p class="error"><?= $value  ?></p><?php
    endforeach;
  endif;
}


function checkPassword($string){
  //  permet de tester la présence de lettre (minuscule ou majuscule).
  $letters = regexLetters($string);
  //  permet de tester la présence de chiffres.
  $digits = regexDigits($string);

  if (!$digits || !$letters) {
    return false;
  }else{
    return true;
  }
}
function historyURL(){
    if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] != '/favicon.ico'){
      $_SESSION['historyURL'][] = $_SERVER['HTTP_REFERER'];
    }
    if( count($_SESSION['historyURL']) > 10){
      $_SESSION['historyURL'] = array_splice($_SESSION['historyURL'], 1, count($_SESSION['historyURL']));
    }
}
function back(){
  // return array_slice($_SESSION['historyURL'],0, 1)[0];
  return $_SERVER['HTTP_REFERER'];
}

?>
