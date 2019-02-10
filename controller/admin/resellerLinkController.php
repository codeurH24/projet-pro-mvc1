<?php
require 'model/modelResellerLink.php';
require 'model/modelCreation.php';
require 'model/modelReseller.php';
require 'model/modelComponent.php';
  function index(){
    view('admin/resellerLink/indexResellerLink.view.php',[
      'resellerLinks' => getResellerLinks()
    ]);
  }
  function create(){
    view('admin/resellerLink/createResellerLink.view.php',[
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
    if( $resellerLink === false){
      view('errors/404.view.php');
      exit;
    }

    view('admin/resellerLink/updateResellerLink.view.php',[
      'resellerLink' => $resellerLink,
      'resellers' => getResellers(),
      'components' => getComponents()
    ]);
  }

  function update(){
    $resellerLink = getResellerLink($_POST['id']);
    if( $resellerLink === false){
      view('errors/404.view.php');
      exit;
    }
    updateResellerLink($_POST['id'], $_POST['prix'], $_POST['lien'], $_POST['revendeur'], $_POST['composant']);
    header('Location: /admin/composant/lien-du-revendeur/modifier-lien-de-revente-'.$_POST['id'].'.php');
  }
  function delete(){
    $resellerLink = getResellerLink($_GET['id']);
    if( $resellerLink === false){
      view('errors/404.view.php');
      exit;
    }
    deleteResellerLink($_GET['id']);
    header('Location: /admin/composant/lien-du-revendeur/');
  }
?>
