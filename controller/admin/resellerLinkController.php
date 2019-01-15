<?php
require 'model/modelResellerLink.php';
require 'model/modelCreation.php';
require 'model/modelReseller.php';
require 'model/modelComponent.php';
  function index(){
    view('admin/resellerLink/indexResellerLink.view.php',[
      'title' => 'PC-CONFIG',
      'resellerLinks' => getResellerLinks()
    ]);
  }
  function create(){
    view('admin/resellerLink/createResellerLink.view.php',[
      'title' => 'PC-CONFIG',
      'resellers' => getResellers(),
      'components' => getComponents()
    ]);
  }

  function store(){
    createResellerLink($_POST['prix'], $_POST['lien'], $_POST['revendeur'], $_POST['composant']);
    header('Location: /admin/composant/lien-du-revendeur/');
  }

  function edit(){
    $resellerLink = getResellerLink($_GET['id']);

    view('admin/resellerLink/updateResellerLink.view.php',[
      'title' => 'PC-CONFIG',
      'resellerLink' => $resellerLink,
      'resellers' => getResellers(),
      'components' => getComponents()
    ]);
  }

  function update(){
    updateResellerLink($_POST['id'], $_POST['prix'], $_POST['lien'], $_POST['revendeur'], $_POST['composant']);
    header('Location: /admin/composant/lien-du-revendeur/modifier-lien-de-revente-'.$_POST['id'].'.php');
  }
  function delete(){
    deleteResellerLink($_GET['id']);
    header('Location: /admin/composant/lien-du-revendeur/');
  }
?>
