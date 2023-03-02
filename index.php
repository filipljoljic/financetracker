<?php
ini_set('display_errors' , 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ("vendor/autoload.php");
require_once ("rest/dao/FinanceDao.class.php");


Flight::route('/', function(){
    echo 'Hello its me Filip';
});

Flight::start();

?>  