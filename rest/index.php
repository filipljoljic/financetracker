<?php
ini_set('display_errors' , 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ("../vendor/autoload.php");
require_once ("dao/BaseDao.class.php");
require_once ("dao/UserDao.class.php");
require_once ("dao/IncomeDao.class.php");

Flight::register('baseDao','BaseDao');
Flight::register("userDao", "UserDao");
Flight::register("incomeDao", "IncomeDao");

// require routes in index
require_once 'routes/UserRoutes.php';
require_once "routes/IncomeRoutes.php";

Flight::start();

?>  