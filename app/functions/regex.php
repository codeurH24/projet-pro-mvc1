<?php
define('regexEmail', '/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/');
function regexEmail($email) {
  $rule = '/^([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})$/';
  return preg_match($rule, $email);
}

//( ?=.*[A-z]) permet de tester la présence de lettre (minuscule ou majuscule).
define('regexLetters', '/(?=.*[A-z])/');
function regexLetters($string) {
  $rule = '/(?=.*[A-z])/';
  return preg_match($rule, $string);
}

//(?=.*[A-Z]) permet de tester la présence de majuscules.
define('regexLettersUpper', '/(?=.*[A-Z])/');
function regexLettersUpper($string) {
  $rule = '/(?=.*[A-Z])/';
  return preg_match($rule, $string);
}

//(?=.*[a-z]) permet de tester la présence de minuscules.
define('regexLettersLower', '/(?=.*[a-z])/');
function regexLettersLower($string) {
  $rule = '/(?=.*[a-z])/';
  return preg_match($rule, $string);
}

//(?=.*[0-9]) permet de tester la présence de chiffres.
define('regexDigits', '/(?=.*[0-9])/');
function regexDigits($string) {
  $rule = '/(?=.*[0-9])/';
  return preg_match($rule, $string);
}

//(?=.*[$@]) permet de tester la présence de caractères spéciaux parmi $ et @.
define('regexSpecial ', '/(?=.*[$@])/');
function regexSpecial($string) {
  $rule = '/(?=.*[$@])/';
  return preg_match($rule, $string);
}
