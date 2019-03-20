<?php

// LIMITE LE NOMBRES D'ESSAIS DE CONNEXIONS
$trial = 3;
$timeTryAgain = 60;
// mise en place ou comptage de nombre d'essais
if(!isset($_SESSION['nbrTrialLogin'])){
    $_SESSION['nbrTrialLogin'] = 1;
}else{
    $_SESSION['nbrTrialLogin']++;
}

// si le nombre d'essais n'est pas atteint
if($_SESSION['nbrTrialLogin'] < $trial){
    // alors on actualisé le temps actuel
    $_SESSION['tmpTrialLogin'] = time();
}else{
    // sinon si le nombre d'essais est atteint alors

    // si le nombre d'essais viens d'ateindre la limite d'essais alors ont
    // actualise le tenmps actuel juste pour cet essais
    if ( $_SESSION['nbrTrialLogin'] == $trial) {
        $_SESSION['tmpTrialLogin'] = time();
    }

    // si la variable de temps existe alors on peux developper avec
    // pour éviter des erreurs
    if(isset($_SESSION['tmpTrialLogin'])){
        // si le temps dépasse le temps en seconde déterminé plus haut
        // c'est qu'il faut ré initialisé les variables qui empeche d'essayer de
        // se connecter
        if( (time() - $_SESSION['tmpTrialLogin']) > $timeTryAgain ){
            $_SESSION['tmpTrialLogin'] = time();
            $_SESSION['nbrTrialLogin'] = 0;
        }

        // tant que tou n'est pas ré initialisé alors
        // on informe l'utilisateur qu'il faut attendre
        if($_SESSION['nbrTrialLogin'] != 0){
            errorsForm('form', 'Trop de tentatives échouées. Réessayer dans '.($timeTryAgain-(time() - $_SESSION['tmpTrialLogin'])).' secondes');
        }
    }
}

if($user === false){
    errorsForm('email', 'Email inconnu');
}
if ($user !== false && !password_verify ( $_POST['password'].secretKey, $user->password ) ){
    errorsForm('password', 'Mot de passe incorrect');
}
