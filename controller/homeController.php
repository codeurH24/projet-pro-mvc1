<?php
require 'model/modelCreation.php';
function index(){
  view('index.view.php',[
    'title' => 'Projet MVC'
  ]);
}
 ?>
