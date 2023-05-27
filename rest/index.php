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

/* METHODS */
Flight::route('GET /finances', function(){
    Flight::json(Flight::baseDao()->get_all());
});

// single finances
Flight::route('GET /finances/@id', function($id){
    Flight::json(Flight::baseDao()->get_by_id($id));
});

//Add finances
Flight::route('POST /finances', function(){
    Flight::json(Flight::baseDao()->add(Flight::request()->data->getData()));
    
});

//Delete finances
Flight::route('DELETE /finances/@id', function($id){
    Flight::baseDao()->delete($id);
    Flight::json(["message"=>"deleted"]);
});

//Update finances
Flight::route('PUT /finances/@id', function($id){
    $data = Flight::request()->data->getData();
    $data['id'] = $id;
    Flight::json(Flight::baseDao()->update($data));
});

Flight::route("GET /users", function() {
    Flight::json(Flight::userDao()->get_all());
});


Flight::route('/', function(){
    echo 'Hello';
});

Flight::route("/testing", function() {
    echo "This is a test route to see if routing works properly!";
});

// require routes in index
require_once 'routes/UserRoutes.php';
require_once "routes/IncomeRoutes.php";

Flight::start();

?>  