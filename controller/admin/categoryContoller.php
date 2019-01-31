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

  deleteCategory($_GET['id']);
  header('Location: /admin/categorie/');
}
function edit(){
  view('admin/category/updateCategory.view.php',[
    'category' => getCategory($_GET['id'])
  ]);
}

function update(){
  updateCategory($_POST['id'], $_POST['name']);
  header('Location: /admin/categorie/modifier-categorie-'.$_POST['id'].'.php');
}
?>
