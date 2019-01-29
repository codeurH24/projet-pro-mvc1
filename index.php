<?php session_start();
require('config.php');
require('app/functions/global.php');
require('app/class/Route.php');



$Route = new Route();


      /*
      Partie front appeler vitrine qui permet aux utilisateurs
      de choisir des composants
       */

      $Route->get('^/$')
      ->controller('homeController.php', 'index')

      ->get('^/composants/memoire-vive-([0-9]*)\.php$', ['pagination'])
      ->controller('vitrineController.php', 'livelyMemory')

      ->get('^/composants/processeur-([0-9]*)\.php$', ['pagination'])
      ->controller('vitrineController.php', 'processor')

      ->get('^/composants/carte-graphique-([0-9]*)\.php$', ['pagination'])
      ->controller('vitrineController.php', 'graphicCard')

      ->get('^/composants/carte-mere-([0-9]*)\.php$', ['pagination'])
      ->controller('vitrineController.php', 'mainBoard')

      /*
      Partie front appeler account (compte) qui permet aux utilisateurs
      d'accèder à leurs compte ou d'en creer un'
       */

      ->get('^/mon-compte/inscription/$')
      ->controller('accountController.php', 'registration')
      //
      ->get('^/mon-compte/connexion/$')
      ->controller('accountController.php', 'login')

      ->get('^/mon-compte/logout/$')
      ->controller('accountController.php', 'logout')


      ->get('^/mon-compte/connexion/submit/$')
      ->controller('accountController.php', 'submitLogin')

      /*
      Partie  utilisateur
       */
       // accueil utilisateur
       ->get('^/mes-creations/$')
       ->controller('accountController.php', 'myAccount')

       // changer le mot de passe utilisateur (par l'utilisateur)
       ->get('^/mon-compte/changer-mon-mot-de-passe/$')
       ->controller('accountController.php', 'changePassword')

       ->get('^/mon-compte/changer-mon-mot-de-passe/update/$')
       ->controller('accountController.php', 'updatePassword')

       // Mes Creations
       ->get('^/mes-creations/activer-une-creation-([0-9]+)\.php$', ['id'])
       ->controller('myCreationController.php', 'enableMyCreation')

       ->get('^/mes-creations/creer-une-creation.php$')
       ->controller('myCreationController.php', 'createMyCreation')

       ->get('^/mes-creations/store/$')
       ->controller('myCreationController.php', 'storeMyCreation')

       ->get('^/mes-creations/detail/(?!-)([a-z+-]+)?([0-9]{1,9})\.php$', ['creationName', 'id'])
       ->controller('myCreationController.php', 'showMyCreation')

       ->get('^/mes-creations/deleteItemCreation/$')
       ->controller('myCreationController.php', 'deleteItemCreation')

       ->get('^/mes-creations/modifier-une-creation-([0-9]+)\.php$', ['id'])
       ->controller('myCreationController.php', 'editMyCreation')

       ->get('^/mes-creations/update.php$')
       ->controller('myCreationController.php', 'updateMyCreation')

       ->get('^/mes-creations/supprimer-une-creation-([0-9]+)\.php$', ['id'])
       ->controller('myCreationController.php', 'deleteMyCreation')

  /*
  partie admin
   */
   ->get('^/admin/$')
   ->controller('adminController.php', 'index')

   // CATEGORIES
   ->get('^/admin/categorie/$')
   ->controller('admin/categoryContoller.php', 'index')

   ->get('^/admin/categorie/creer-categorie.php$')
   ->controller('admin/categoryContoller.php', 'create')

   ->get('^/admin/categorie/store/$')
   ->controller('admin/categoryContoller.php', 'store')

   ->get('^/admin/categorie/supprimer-categorie-([0-9]+)\.php$',['id'])
   ->controller('admin/categoryContoller.php', 'delete')

   ->get('^/admin/categorie/modifier-categorie-([0-9]+)\.php$',['id'])
   ->controller('admin/categoryContoller.php', 'edit')

   ->get('^/admin/categorie/update/$')
   ->controller('admin/categoryContoller.php', 'update')

   // COMPOSANTS

   ->get('^/admin/composant/$')
   ->controller('admin/componentController.php', 'index')

   ->get('^/admin/composant/creer-composant.php$')
   ->controller('admin/componentController.php', 'create')

   ->get('^/admin/composant/store/$')
   ->controller('admin/componentController.php', 'store')

   ->get('^/admin/composant/supprimer-composant-([0-9]+)\.php$', ['id'])
   ->controller('admin/componentController.php', 'delete')

   ->get('^/admin/composant/modifier-composant-([0-9]+)\.php$', ['id'])
   ->controller('admin/componentController.php', 'edit')

   ->get('^/admin/composant/update/$')
   ->controller('admin/componentController.php', 'update')

   /*
   revendeur
    */
   ->get('^/admin/revendeur/$')
   ->controller('admin/resellerController.php', 'index')

   ->get('^/admin/revendeur/creer-revendeur.php$')
   ->controller('admin/resellerController.php', 'create')

   ->get('^/admin/revendeur/store/$')
   ->controller('admin/resellerController.php', 'store')

   ->get('^/admin/revendeur/modifier-revendeur-([0-9]+)\.php$', ['id'])
   ->controller('admin/resellerController.php', 'edit')

   ->get('^/admin/revendeur/update/$')
   ->controller('admin/resellerController.php', 'update')

   ->get('^/admin/revendeur/supprimer-revendeur-([0-9]+)\.php$', ['id'])
   ->controller('admin/resellerController.php', 'delete')
/**
 * compatibilité
 */

   ->get('^/admin/composant/compatibilite/$')
   ->controller('admin/compatibilityController.php', 'index')

   ->get('^/admin/composant/compatibilite/creer-compatibilite.php$')
   ->controller('admin/compatibilityController.php', 'create')

   ->get('^/admin/composant/compatibilite/store/$')
   ->controller('admin/compatibilityController.php', 'store')

   ->get('^/admin/composant/compatibilite/modifier-compatibilite-([0-9]+)\.php$', ['id'])
   ->controller('admin/compatibilityController.php', 'edit')

   ->get('^/admin/composant/compatibilite/update/$')
   ->controller('admin/compatibilityController.php', 'update')


   ->get('^/admin/composant/compatibilite/supprimer-compatibilite-([0-9]+)\.php$', ['id'])
   ->controller('admin/compatibilityController.php', 'delete')

   /**
    * Lien du revendeur
    */
   ->get('^/admin/composant/lien-du-revendeur/$')
   ->controller('admin/resellerLinkController.php', 'index')

   ->get('^/admin/composant/lien-du-revendeur/creer-lien-de-revente.php$')
   ->controller('admin/resellerLinkController.php', 'create')

   ->get('^/admin/composant/lien-du-revendeur/store/$')
   ->controller('admin/resellerLinkController.php', 'store')

   ->get('^/admin/composant/lien-du-revendeur/modifier-lien-de-revente-([0-9]+)\.php$', ['id'])
   ->controller('admin/resellerLinkController.php', 'edit')

   ->get('^/admin/composant/lien-du-revendeur/update/$')
   ->controller('admin/resellerLinkController.php', 'update')

   ->get('^/admin/composant/lien-du-revendeur/supprimer-lien-de-revente-([0-9]+)\.php$', ['id'])
   ->controller('admin/resellerLinkController.php', 'delete')
   /**
    * taguer les composants
    */
   ->get('^/admin/tagComponent/$')
   ->controller('admin/tagComponentController.php', 'index')

/*
  admin utilisateur
*/
   ->get('^/admin/utilisateurs/$')
   ->controller('admin/userController.php', 'index')

   ->get('^/admin/utilisateurs/creer-un-utilisateur.php$')
   ->controller('admin/userController.php', 'create')

   ->get('^/admin/utilisateurs/store/$')
   ->controller('admin/userController.php', 'store')

   ->get('^/admin/utilisateurs/modifier-un-utilisateur-([0-9]+)\.php$', ['id'])
   ->controller('admin/userController.php', 'edit')

   ->get('^/admin/utilisateurs/update/$')
   ->controller('admin/userController.php', 'update')

   ->get('^/admin/utilisateurs/demande-de-nouveau-mot-de-passe-([0-9]+)\.php$', ['id'])
   ->controller('admin/userController.php', 'passwordRequest')

   ->get('^/admin/utilisateurs/sendEmailPasswordChange/$')
   ->controller('admin/userController.php', 'sendEmailPasswordChange')

   ->get('^/change-mot-de-passse/([0-9]+)/token-([0-9a-f]+)\.php$', ['id-user','token'])
   ->controller('admin/userController.php', 'passwordChange')

   ->get('^/change-mot-de-passse-succes.php$')
   ->controller('admin/userController.php', 'passwordChangeSuccess')


   ->get('^/admin/utilisateurs/supprimer-un-utilisateur-([0-9]+)\.php$', ['id'])
   ->controller('admin/userController.php', 'deleteRequest')

   ->get('^/admin/utilisateurs/delete/$')
   ->controller('admin/userController.php', 'delete')

   ->get('^/admin/utilisateurs/montrer-un-utilisateur-([0-9]+)\.php$', ['id'])
   ->controller('admin/userController.php', 'show')

   // admin roles

   ->get('^/admin/roles/$')
   ->controller('admin/roleController.php', 'index')

   ->get('^/admin/roles/montrer-role-([0-9]+)\.php$', ['id'])
   ->controller('admin/roleController.php', 'show')

   ->get('^/admin/roles/creer-role.php$')
   ->controller('admin/roleController.php', 'create')

   ->get('^/admin/roles/store/$')
   ->controller('admin/roleController.php', 'store')

   ->get('^/admin/roles/modifier-role-([0-9]+)\.php$', ['id'])
   ->controller('admin/roleController.php', 'edit')

   ->get('^/admin/roles/update/$')
   ->controller('admin/roleController.php', 'update')

   ->get('^/admin/roles/supprimer-role-([0-9]+)\.php$', ['id'])
   ->controller('admin/roleController.php', 'deleteRequest')

   ->get('^/admin/roles/delete/$', ['id'])
   ->controller('admin/roleController.php', 'delete')

// admin log
   ->get('^/admin/log/([0-9]+)$', ['pagination'])
   ->controller('admin/logController.php', 'index')

   ->get('^/admin/log/$')
   ->controller('admin/logController.php', 'index')


// admin $access
  ->get('^/admin/acces/$')
  ->controller('admin/accessController.php', 'index')

  ->get('^/admin/acces/montrer-un-acces-([0-9]+)\.php$', ['id'])
  ->controller('admin/accessController.php', 'show')

  ->get('^/admin/acces/creer-un-acces.php$')
  ->controller('admin/accessController.php', 'create')

  ->get('^/admin/acces/store/$')
  ->controller('admin/accessController.php', 'store')

  ->get('^/admin/acces/modifier-un-acces-([0-9]+)\.php$', ['id'])
  ->controller('admin/accessController.php', 'edit')

  ->get('^/admin/acces/update/$')
  ->controller('admin/accessController.php', 'update')

  ->get('^/admin/acces/supprimer-un-acces-([0-9]+)\.php$', ['id'])
  ->controller('admin/accessController.php', 'deleteRequest')

  ->get('^/admin/acces/delete/$')
  ->controller('admin/accessController.php', 'delete')










?>
