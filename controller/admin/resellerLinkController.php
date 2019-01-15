<?php
// INSERT INTO `revendeur_composant` (`id`, `prix`, `lien`, `auteur`, `id_revendeur`, `id_composant`, `date_at`)
// VALUES (NULL, '699.58', 'http://www.ldlc.com/5451248', 'codeurh24', '2', '32', '2019-01-05 00:00:00');
require 'model/modelCreation.php';
  function index(){
    view('admin/resellerLink/indexResellerLink.view.php',[
      'title' => 'PC-CONFIG'
    ]);
  }
?>
