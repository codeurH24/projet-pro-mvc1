<?php

  function view($viewFile, $vars = []){
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
?>
