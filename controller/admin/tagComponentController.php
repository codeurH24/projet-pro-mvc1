<?php
require 'model/modelCreation.php';
require 'model/modelComponent.php';
require 'model/modelTagComponent.php';
function index(){



  if( isset($_POST['tagsComposant']) and !empty($_POST['tagWord']) and !empty($_SESSION['sqlTagComponentCreate'])  ){
    $queryTag = str_replace("%%tag%%", $_POST['tagWord'], $_SESSION['sqlTagComponentCreate']);

    if (createTagsComponent($queryTag)) {
      echo 'Requete de création de tag reussi<br />';
      $_SESSION['sqlTagComponentCreate'] = [];
    }else{
      echo 'ECHEC: Requete de création de tag<br />';
    }
  }

  if ( isset($_POST['searchForTagComposant']) and isset($_POST['keyWord']) and empty($_POST['keyWord']) ) {

    // $query = "SELECT * FROM `composant` ";
    // $listOfComponent = bddQuery($mysqli, $query);
    $listOfComponent = getComponents();

  }else if (isset($_POST['searchForTagComposant']) and isset($_POST['keyWord']) and !empty($_POST['keyWord']) ) {

    // $query = 'SELECT * FROM `composant` WHERE `model` LIKE \'%'.$_POST['keyWord'].'%\' ';
    // $listOfComponent = bddQuery($mysqli, $query);
    $listOfComponent = getComponentsLike($_POST['keyWord']);
    $_SESSION['sqlTagComponentCreate'] = [];

  }else{
    $listOfComponent = [];
  }

  view('admin/tagComponent/indexTagComponent.view.php',[    
    'listOfComponent' => $listOfComponent
  ]);
}
 ?>
