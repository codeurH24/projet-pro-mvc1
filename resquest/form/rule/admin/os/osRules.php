<?php

if(empty($_POST['name'])){
  errorsForm('name', 'Un nom de systeme dois être entré');
}else
// vérifie si le nom du systeme n'est pas trop compliqué
if (!preg_match('/^([a-zA-Z0-9-_ âêîôûàèìòùáéíóúäëïöüãõñç]+)$/', $_POST['name'])) {
  errorsForm('name', 'Seul les caractères alphabétique est numerique ainsi que les espaces blanc et [- _] sont autorisés');
}

if( !empty($_FILES['picture']['name']) ) {

  // recupere le nom complet de l'image sans l'url
  $nameIMG = basename($_FILES['picture']['name']);
  // recupere les 3 derniers caractère du nom qui represente le type de l'image
  $extension = substr($nameIMG , -3);
  $acceptTypeIMG = array('jpg', 'png');
  if (!in_array($extension, $acceptTypeIMG)) {
      errorsForm('picture', 'Images acceptés: jpg, png');
  }


  // vérifie si l'image uploader n'est pas trop lourde
  $sizeOctet = $_FILES['picture']['size'];
  $sizeKO = (int) ($sizeOctet / 1024);
  if( $sizeKO > 100 ){
    errorsForm('picture', 'Seul les images inférieurs à 100Ko sont acceptés');
  }
}

 ?>
