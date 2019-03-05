<?php
require 'model/modelComponent.php';
require 'model/modelCreation.php';
require 'model/modelCreationConception.php';
require 'model/modelTagComponent.php';
function livelyMemory(){
  $category = 'mémoire vive';
  $whereIN = [];

  if(UID() !== false){
    $whereIN = infoConfig();

    // filtre l'affichage.
    // Les barrettes seront affichées selont le type de ram déjà present dans la config
    $cfgTypeRAM = infoConfig_typeOfRAM();
    if ($cfgTypeRAM !== false) {
      $whereIN[] = $cfgTypeRAM;
    }

    // empèche l'utilisateur d'accèder a la page pour avoir le choix d'ajouter une barrette de ram alors qu'il
    // n'as plus de place sur ça carte mère
    if (infoConfig_numberOfRAM() >= infoConfig_numberOfSlotsRAM()) {
      $_SESSION['notification'] = 'Il n\'y a plus de place sur la carte mère pour accueillir une nouvelle barrette de ram';
      header('Location: /mes-creations/detail/'.infoConfig_ID().'.php');
      exit;
    }
  }

  $numbersPerPage = 5;
  $numberOfProcessors =  count(getComponents($category, $whereIN));
  $numberSplits = intval(ceil ( ($numberOfProcessors / $numbersPerPage) ));

  $limit = (($_GET['pagination']*$numbersPerPage)-$numbersPerPage).','.$numbersPerPage;

  if((bool)getComponentsLimit($category, $limit) === false){
    view('errors/404.view.php');
    exit;
  }
  view('vitrine/components.view.php',[
    'components' => getComponentsLimit($category, $limit, $whereIN),
    'numberSplits' => $numberSplits,
    'page' => 'composants/memoire-vive-',
    'class' => 'pageBackgroundDDR'
  ]);
}

function mainBoard(){
  $category = 'carte mère';
  $whereIN = [];
  // ont regarde la config seulement si l'utilisateur est connecté
  if(UID() !== false) {
      // if (infoConfig_hasMainboard() === true) {
      //   $_SESSION['notification'] = 'Aucune carte mère de disponible tant que vous aurez une carte mère dans votre création';
      //   header('Location: /mes-creations/detail/'.infoConfig_ID().'.php');
      //   exit;
      // }
      if (infoConfig_hasMainboard() === false){
        // limite les cartes mères affichées en fonction des barrettes mémoire déjà dans la config
        $numberOfRAM = infoConfig_numberOfRAM(); // recupere le nombre de barrette mémoire depuis la config
        // genère les filtres d'affichage qui determinent les CM a affichées.
        // Seul les CM ayant au minimum le nombre de barrettes déjà présent dans la config seront selectionnées
        if ($numberOfRAM > 2) {
          for ($i=$numberOfRAM; $i < 10; $i++) {
            if($i == 1){
              $whereIN[] = $i.' fente RAM';
            }else{
              $whereIN[] = $i.' fentes RAM';
            }
          }
        }
        // si la config possède un processeur alors on n'affiche que les carte mère avec kes tags du processeur
        if (infoConfig_hasProcessor() !== false) {
          $whereIN = array_merge($whereIN, getTagsProcesseur());
        }

        // filtre l'affichage.
        // si la ram dans la config est de type X
        // alors ont affiche seuelement les carte mere qui accepte la mémoire vive de type X
        $cfgTypeRAM = infoConfig_typeOfRAM();
        if ($cfgTypeRAM !== false) {
          $arr[] = $cfgTypeRAM;
          $whereIN = array_merge($whereIN, $arr);
        }



      } // hasMainboard()
  }// UID


  $numbersPerPage = 5;
  $numberOfProcessors =  countComponents($category);
  $numberSplits = intval(ceil ( ($numberOfProcessors / $numbersPerPage) ));

  $limit = (($_GET['pagination']*$numbersPerPage)-$numbersPerPage).','.$numbersPerPage;

  if((bool)getComponentsLimit($category, $limit, $whereIN) === false){
    view('errors/404.view.php');
    exit;
  }

  view('vitrine/components.view.php',[
    'components' => getComponentsLimit($category, $limit, $whereIN),
    'numberSplits' => $numberSplits,
    'page' => 'composants/carte-mere-',
    'class' => 'pageBackgroundMotherboard'
  ]);
}

function processor(){
  // INFO SURL LA CONFIG ACTUEL
  $category = 'processeur';

  $whereIN = [];
  if(UID() !== false) {
     $whereIN = infoConfig();
  }





  // selon les tags de la carte mere, nous pouvons filtrer l'affichage
  // des processeurs
  // AFFICHAGE DES COMPOSANTS SUR LA PAGE

  $numbersPerPage = 5;
  $numberOfProcessors =  count(getComponents($category, $whereIN));
  $numberSplits = intval(ceil ( ($numberOfProcessors / $numbersPerPage) ));

  $limit = (($_GET['pagination']*$numbersPerPage)-$numbersPerPage).','.$numbersPerPage;

  if((bool)$numberOfProcessors  === false){
    view('errors/404.view.php');
    exit;
  }

  view('vitrine/components.view.php',[
    'components' => getComponentsLimit($category, $limit, $whereIN),
    'numberSplits' => $numberSplits,
    'page' => 'composants/processeur-',
    'class' => 'pageBackgroundProcessor'
  ]);
}

function graphicCard(){
  $category = 'carte graphique';
  $whereIN = [];


  $numbersPerPage = 5;
  $numberOfProcessors =  countComponents($category);
  $numberSplits = intval(ceil ( ($numberOfProcessors / $numbersPerPage) ));

  $limit = (($_GET['pagination']*$numbersPerPage)-$numbersPerPage).','.$numbersPerPage;

  if((bool)getComponentsLimit($category, $limit) === false){
    view('errors/404.view.php');
    exit;
  }
  view('vitrine/components.view.php',[
    'components' => getComponentsLimit($category, $limit),
    'numberSplits' => $numberSplits,
    'page' => 'composants/carte-graphique-',
    'class' => 'pageBackgroundGraphicCard'
  ]);
}


function addComponent(){
  if(UID() === false) {
    exit('Vous devez être connecté');
  }



  if(infoConfig_hasMainboard() !== false && isMainboard()){
    $_SESSION['notification'] = 'Une seule carte mère par création est autorisé';
    header('Location: '.back());
    exit;
  }

  if(infoConfig_hasProcessor() !== false && isProcessor()){
    $_SESSION['notification'] = 'Un seul processeur par création est autorisé';
    header('Location: '.back());
    exit;
  }

  if (isRAM()) {
    if (infoConfig_numberOfRAM()) {
      $cfgTypeRAM = infoConfig_typeOfRAM();

      if (getTag($cfgTypeRAM) === false ) {
        $_SESSION['notification'] = 'Vous ne pouvez pas mélanger les types de mémoires vives';
        header('Location: /mes-creations/detail/'.infoConfig_ID().'.php');
        exit;
      }
    }
  }

  if(isMainboard()){
    $numberOfRAM = infoConfig_numberOfRAM();

    if( $numberOfRAM > numberOfSlotsRAM($_POST['id']) ){
      $_SESSION['notification'] = 'Votre création a trop de RAM pour accepter cette carte mère';
      header('Location: '.back());
      exit;
    }
  }else{
    $infoConfig_numberOfSlotsRAM = infoConfig_numberOfSlotsRAM();
    $numberOfRAM = infoConfig_numberOfRAM();

    if( $numberOfRAM >= $infoConfig_numberOfSlotsRAM){
      $_SESSION['notification'] = 'Votre carte mère n\'a plus assez d\'emplacements pour ajouter encore une barrette de RAM';
      header('Location: '.back());
      exit;
    }
  }



  $id = whoIsEnableInMyCreation();
  // si aucun confguration est detecté alors on creer la config NO NAME par defaut
  if( $id === false){
    $Creation = new Creation();
    $Creation->setName('No Name');
    $Creation->setEnable(1);
    $Creation->setDescription('Creation crée par défaut');
    $Creation->setIdOs(1);
    $Creation->setIdUser(UID());
    $Creation->setDateCreation(dbDate());
    $isSuccess = $Creation->createCreation();
    $id = whoIsEnableInMyCreation();
  }

  $CreationConception = new CreationConception();
  $CreationConception->setIdComponent($_POST['id']);
  $CreationConception->setIdCreation($id);
  $CreationConception->setIdUser(UID());
  $CreationConception->setDateCreate(dbDate());
  $CreationConception->createCreationConception();
  // $_SESSION['notification'] = '';
  header('Location: /mes-creations/detail/'.infoConfig_ID().'.php');
  return true;
}





?>
