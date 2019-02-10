<?php
require 'model/modelCreation.php';


// function legalNotice(){
//   view('legalNotice.view.php');
// }
function contact(){
  view('footer/contact.view.php');
}
function submitFormSuccessContact(){
  view('footer/contactSuccess.view.php');
}

function submitFormContact(){
  if (isset($_POST['submitFormContact'], $_POST['captcha_code']) ) {

    include_once 'securimage/securimage.php';
    $securimage = new Securimage();
    if ($securimage->check($_POST['captcha_code']) == false) {
      view('footer/contact.view.php');
      exit;
    }

    $_POST['name'] = htmlentities($_POST['name']);
    $_POST['sujet'] = htmlentities($_POST['sujet']);
    $_POST['msg'] = htmlentities($_POST['msg']);


    // exit('form contact soumis');
    // envoi de l'email de confirmation
    $headers = "From: $_POST[name] $_POST[email]" . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    $message = $_POST['msg'];


    $data = [
      'password' => '1234',
      'to' => 'tefuddiddek-1134@yopmail.com',
      'subject' => $_POST['sujet'],
      'message' => $message,
      'headers' => $headers,
    ];
    $envoiEmail = redirect_post('http://sendmail.codeurh24.com/', $data);
    header('Location: /contact/submitFormSuccessContact/');
  }
  // view('footer/contact.view.php');
}

function FAQ(){
  view('footer/FAQ.view.php');
}
function plan(){
  view('footer/planofSite.view.php');
}
