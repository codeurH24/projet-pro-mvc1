<?php
require 'model/modelComponent.php';
require 'model/modelCreation.php';
function livelyMemory(){

  $numbersPerPage = 5;
  $categorie = 'mémoire vive';
  $numberOfProcessors =  countComponents($categorie);
  $numberSplits = intval(ceil ( ($numberOfProcessors / $numbersPerPage) ));

  $limit = (($_GET['pagination']*$numbersPerPage)-$numbersPerPage).','.$numbersPerPage;

  view('vitrine/components.view.php',[
    'title' => 'Projet MVC',
    'components' => getComponentsLimit($categorie, $limit),
    'numberSplits' => $numberSplits,
    'page' => 'composants/memoire-vive-',
    'class' => 'pageBackgroundDDR'
  ]);
}

function mainBoard(){

  $numbersPerPage = 5;
  $numberOfProcessors =  countComponents('carte mère');
  $numberSplits = intval(ceil ( ($numberOfProcessors / $numbersPerPage) ));

  $limit = (($_GET['pagination']*$numbersPerPage)-$numbersPerPage).','.$numbersPerPage;

  view('vitrine/components.view.php',[
    'title' => 'Projet MVC',
    'components' => getComponentsLimit('carte mère', $limit),
    'numberSplits' => $numberSplits,
    'page' => 'composants/carte-mere-',
    'class' => 'pageBackgroundMotherboard'
  ]);
}

function processor(){
  $numbersPerPage = 5;
  $numberOfProcessors =  countComponents('processeur');
  $numberSplits = intval(ceil ( ($numberOfProcessors / $numbersPerPage) ));

  $limit = (($_GET['pagination']*$numbersPerPage)-$numbersPerPage).','.$numbersPerPage;

  view('vitrine/components.view.php',[
    'title' => 'Projet MVC',
    'components' => getComponentsLimit('processeur', $limit),
    'numberSplits' => $numberSplits,
    'page' => 'composants/processeur-',
    'class' => 'pageBackgroundProcessor'
  ]);
}

function graphicCard(){
  $numbersPerPage = 5;
  $numberOfProcessors =  countComponents('carte graphique');
  $numberSplits = intval(ceil ( ($numberOfProcessors / $numbersPerPage) ));

  $limit = (($_GET['pagination']*$numbersPerPage)-$numbersPerPage).','.$numbersPerPage;

  view('vitrine/components.view.php',[
    'title' => 'Projet MVC',
    'components' => getComponentsLimit('carte graphique', $limit),
    'numberSplits' => $numberSplits,
    'page' => 'composants/carte-graphique-',
    'class' => 'pageBackgroundGraphicCard'
  ]);
}
?>
