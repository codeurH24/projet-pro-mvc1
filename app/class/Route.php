<?php

class Route{

  protected $status;
  protected $urlRegex;

  public function __construct(){
    $this->status = true;
  }

  public function get($urlRegex,$keysGetArray=[]){


    if (isset($_SERVER['REDIRECT_URL']) && preg_match('#'.$urlRegex.'#isU', $_SERVER['REDIRECT_URL'], $match)) {

    	header("Status: 200 OK", false, 200);

      foreach ($keysGetArray as $key => $value) {
        $_GET[$value] = $match[$key+1];
      }
      $this->status = true;
      return $this;
    }
    else {

      $this->urlRegex = $urlRegex;
      $this->status = false;
    	return $this;
    }
  }
  public function controller($controllerName, $function){
    if($this->status === true){
      require 'controller/'.$controllerName;
      $function();
      exit;
    }else{
      if ((!isset($_SERVER['REDIRECT_URL'])) && $this->urlRegex == '^/$'){
        require 'controller/'.$controllerName;
        $function();
        exit;
      }
      return $this;
    }
  }

}//class

 ?>
