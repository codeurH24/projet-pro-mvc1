<?php session_start();
require('config.php');
require('app/functions/regex.php');
require('app/functions/global.php');
require('app/class/Route.php');
require('model/modelDatabase.php');


// enregistre les urls de navigation sur le site
// historique limité au 10 derniers enregistrements
historyURL();


// si le role de l'utilisateur n'est pas autorisé a passer avec l'url en cours
// alors ont le redirige
  if ( access() === false ) {
    ob_start();
    header('Location: http://'.$_SERVER['HTTP_HOST']);
    exit();
  }





$Route = new Route();

      $Route->get('^/$')
      ->controller('homeController.php', 'index')

      ->get('^/mentions-legales.php$')
      ->controller('homeController.php', 'legalNotice')

      /*
      Partie front appeler vitrine qui permet aux utilisateurs
      de choisir des composants
       */

       // page  mémoires vives
      ->get('^/composants/memoire-vive-([0-9]*)\.php$', ['pagination'])
      ->controller('vitrineController.php', 'livelyMemory')
      //page processeurs
      ->get('^/composants/processeur-([0-9]*)\.php$', ['pagination'])
      ->controller('vitrineController.php', 'processor')
      // page carte graphique
      ->get('^/composants/carte-graphique-([0-9]*)\.php$', ['pagination'])
      ->controller('vitrineController.php', 'graphicCard')
      // page des cartes meres
      ->get('^/composants/carte-mere-([0-9]*)\.php$', ['pagination'])
      ->controller('vitrineController.php', 'mainBoard')

      // Ajout composant a la creation
      ->get('^/composants/ajout-a-la-creation/$')
      ->controller('vitrineController.php', 'addComponent')

      /*
      Partie front appeler account (compte) qui permet aux utilisateurs
      d'accèder à leurs compte ou d'en creer un'
       */

      ->get('^/mon-compte/inscription/$')
      ->controller('accountController.php', 'registration')

      ->get('^/mon-compte/create-inscription/$')
      ->controller('accountController.php', 'createRegistration')
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

       // supprimer le compte utilisateur (par l'utilisateur)
       ->get('^/mon-compte/supprimer-mon-compte/$')
       ->controller('accountController.php', 'confirmDeleteAccount')

       // suppression du compte utilisateur
       ->get('^/mon-compte/supprimer-mon-compte/delete/$')
       ->controller('accountController.php', 'deleteAccount')

       // suppression du compte utilisateur (confirmation de déconnection de l'utilisateur)
       ->get('^/mon-compte/supprimer-mon-compte/logout/$')
       ->controller('accountController.php', 'deleteAccountLogout')

       // changer le mot de passe utilisateur (par l'utilisateur)
       ->get('^/mon-compte/changer-mon-mot-de-passe/$')
       ->controller('accountController.php', 'changePassword')

       ->get('^/mon-compte/changer-mon-mot-de-passe/update/$')
       ->controller('accountController.php', 'updatePassword')

       // changer mon email (form de modification)
       ->get('^/mon-compte/changer-mon-adresse-e-mail/$')
       ->controller('accountController.php', 'editEmail')

       // changer mon email (envoi de l'email de confirmation)
       ->get('^/mon-compte/changer-mon-adresse-e-mail/send/$')
       ->controller('accountController.php', 'confirmEmail')

       // changer mon email (informe l'utilisateur, qu'il doit confirmer ou annuler)
       ->get('^/change-email/envoi-email-succes/$')
       ->controller('accountController.php', 'sendEmailSuccess')

       // changer mon email (déconnect l'utilisateur pour qu'il se connect avec ça nouvelle adresse email)
       ->get('/mon-compte/changer-mon-adresse-e-mail/logout/$')
       ->controller('accountController.php', 'logoutUpdateEmail')

       // changer mon email (informe l'utilisateur que son email est bien valider sur le site)
       ->get('^/change-email/emailValidateSuccessfully$')
       ->controller('accountController.php', 'emailValidateSuccessfully')

       // changer mon email (annulation de l'action de modification)
       ->get('/mon-compte/changer-mon-adresse-e-mail/cancelUpdateEmail/$')
       ->controller('accountController.php', 'cancelUpdateEmail')

       // changer mon email (page de validation de l'email et mise a jour par le nouvel email)
       ->get('^/change-email/([0-9]+)/((?:[A-Za-z0-9+/]{4})*(?:[A-Za-z0-9+/]{2}==|[A-Za-z0-9+/]{3}=)?)/token-(.*)\.php$', ['id','emailBase64', 'token'])
       ->controller('accountController.php', 'updateEmail')

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

   ->get('^/admin/composant/montrer-composant-([0-9]+)\.php$', ['id'])
   ->controller('admin/componentController.php', 'show')

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
   /**
    * taguer un composant
    */
   ->get('^/admin/tagComponent/creer-un-tag-([0-9]+)\.php$', ['id'])
   ->controller('admin/tagComponentController.php', 'create')

   ->get('^/admin/tagComponent/store/$')
   ->controller('admin/tagComponentController.php', 'store')

   ->get('^/admin/tagComponent/modifier-un-tag-([0-9]+)\.php$', ['id'])
   ->controller('admin/tagComponentController.php', 'edit')

   ->get('^/admin/tagComponent/update/$')
   ->controller('admin/tagComponentController.php', 'update')

   ->get('^/admin/tagComponent/supprimer-tag-([0-9]+)\.php$', ['id'])
   ->controller('admin/tagComponentController.php', 'deleteRequest')

   ->get('^/admin/tagComponent/delete/$')
   ->controller('admin/tagComponentController.php', 'delete')

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

   ->get('^/admin/utilisateurs/ajaxupdaterole/$')
   ->controller('admin/userController.php', 'AJAX_updateRole')

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

   ->get('^/admin/roles/delete/$')
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


// partie footer
->get('^/contact/$')
->controller('footerController.php', 'contact')

->get('^/contact/submitFormContact/$')
->controller('footerController.php', 'submitFormContact')

->get('^/contact/submitFormSuccessContact/$')
->controller('footerController.php', 'submitFormSuccessContact')

->get('^/FAQ/$')
->controller('footerController.php', 'FAQ')

->get('^/plan/$')
->controller('footerController.php', 'plan');


view('errors/404.view.php');



?>
