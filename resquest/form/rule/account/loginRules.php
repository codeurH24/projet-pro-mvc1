<?php

if($User->count() == 0){
  errorsForm('form', 'E-mail ou Mot de passe inconnus');
}
if(regexEmail($_POST['email']) === 0){
  errorsForm('email', 'Email incorrect');
}
