<?php
ini_set('display_errors' , 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ("../vendor/autoload.php");
require_once ("dao/FinanceDao.class.php");

/* METHODS */
Flight::route('/finances', function(){
    $dao = new FinanceDao();
    $finances = $dao->get_all();
    Flight::json($finances);
});



Flight::route('/', function(){
    echo 'Hello';
});
Flight::route('/filip/@name', function($name){
    echo 'Hello its me Filip'. $name;
});
Flight::route('/cao', function(){
    echo 'Hello its cao';
});

Flight::start();

?>  