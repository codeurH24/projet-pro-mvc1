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

?>
