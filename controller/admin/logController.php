<?php
require 'model/modelCreation.php';
require 'model/modelLog.php';

function index(){

  if (isset($_GET['pagination'])) {
    $numbersPerPage = 15;
    $numberOfLogs =  countLogs();
    $numberSplits = intval(ceil ( ($numberOfLogs / $numbersPerPage) ));

    $limit = (($_GET['pagination']*$numbersPerPage)-$numbersPerPage).','.$numbersPerPage;

    view('admin/log/indexLog.view.php',[
      'logs' => getLogs($limit),
      'page' => '/admin/log/',
      'numberSplits' => $numberSplits
    ]);
  }else{
    view('admin/log/indexLog.view.php',[
      'logs' => getLogs(),
      'page' => '/admin/log/'
    ]);
  }
}

 ?>
