<?php

global $errorsForm;
$errorsForm = [];

if(empty($_POST['name'])){
  $errorsForm['name'][] = 'Un nom de création est requis';
}
if(!empty($_POST['name'])){
  // enlève d'eventuelles balises html php
  $_POST['name'] = strip_tags($_POST['name']);;
}

if(!empty($_POST['description'])){
  // empeche l'interpretation des balises html par le navigateur
  $_POST['description'] = htmlspecialchars($_POST['description']);
}

 ?>
