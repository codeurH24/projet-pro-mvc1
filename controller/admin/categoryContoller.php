<?php
require 'model/modelCategory.php';
require 'model/modelCreation.php';
function index(){
  view('admin/category/indexCategory.view.php',[
    'categories' => getCategories()
  ]);
}
function create(){
  view('admin/category/createCategory.view.php');
}
function store(){

  createCategory($_POST['name']);
  header('Location: /admin/categorie/');
}

function delete(){
  if(getCategory($_GET['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  deleteCategory($_GET['id']);
  header('Location: /admin/categorie/');
}
function edit(){
  if(($category = getCategory($_GET['id'])) === false){
    view('errors/404.view.php');
    exit;
  }
  view('admin/category/updateCategory.view.php',[
    'category' => $category
  ]);
}

function update(){
  if(getCategory($_POST['id']) === false){
    view('errors/404.view.php');
    exit;
  }
  updateCategory($_POST['id'], $_POST['name']);
  header('Location: /admin/categorie/modifier-categorie-'.$_POST['id'].'.php');
}
?>
