<?php
require 'model/modelCreation.php';
function index(){
  view('index.view.php',[
    'class' => 'pageBackground'
  ]);
}

function legalNotice(){
  view('legalNotice.view.php');
}
 ?>
