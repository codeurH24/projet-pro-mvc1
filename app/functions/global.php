<?php

  function view($viewFile, $vars = []){
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
    print_r($value);
    exit;
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


function errorsForm($nameInput){
  global $errorsForm;
  if (isset($errorsForm[$nameInput]) && count($errorsForm[$nameInput]) > 0):
    foreach ($errorsForm[$nameInput] as $value):
      ?><p class="error"><?= $value  ?></p><?php
    endforeach;
  endif;
}


?>
