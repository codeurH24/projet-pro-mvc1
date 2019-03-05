<?php
require 'model/modelOS.php';

function index(){

  $OS = new OS();
  $os = $OS->getOS()->gets();

  view('admin/os/indexOs.view.php',[
    'oss' => $os
  ]);
}

function create(){
  view('admin/os/createOs.view.php');
}

function store(){
  $OS = new OS();
  $OS->setName($_POST['name']);

  if( !empty($_FILES["picture"]['name']) ) {
    $target_dir = "./public/picture/OS/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $resultUpload = move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
    if( $resultUpload ){
        $OS->setPicture($_FILES["picture"]['name']);
    }else{
      exit('Problème d\'upload Attention au chmod sous linux');
    }
  }

  $os = $OS->createOS();
  header('location: /admin/os/');
}

function delete(){
  $OS = new OS();
  $os = $OS->deleteOS([
    ['id', '=', $_GET['id']]
  ]);
  header('location: /admin/os/');
}

function edit(){
  $OS = new OS();
  $os = $OS->getOS([
    ['id', '=', $_GET['id']]
    ])->get();

  view('admin/os/updateOs.view.php',[
    'os' => $os
  ]);
}

function update(){
  $OS = new OS();
  $OS->setName($_POST['name']);


  if( !empty($_FILES["picture"]['name']) ) {
    $target_dir = "./public/picture/OS/";
    $target_file = $target_dir . basename($_FILES["picture"]["name"]);
    $resultUpload = move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file);
    if( $resultUpload ){
        $OS->setPicture($_FILES["picture"]['name']);
    }else{
      exit('Problème d\'upload Attention au chmod sous linux');
    }
  }


  $os = $OS->updateOS([
    ['id', '=', $_POST['id']]
  ]);
  header('location: /admin/os/');
}
