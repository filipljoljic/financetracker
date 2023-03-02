<?php
ini_set('display_errors' , 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once ("../vendor/autoload.php");
require_once ("dao/FinanceDao.class.php");

Flight::register('financeDao','FinanceDao');

/* METHODS */
Flight::route('GET /finances', function(){
    $finances = Flight::financeDao()->get_all();
    Flight::json($finances);
});

// single finances
Flight::route('GET /finances/@id', function($id){
    $finance = Flight::financeDao()->get_by_id($id);
    Flight::json($finance);
});

//Add finances
Flight::route('POST /finances', function(){
    $request = Flight::request();
    $data = $request->data->getData();
    Flight::financeDao()->add($data['description'], $data['created']);
});

//Delete finances
Flight::route('DELETE /finances/@id', function($id){
    Flight::financeDao()->delete($id);
    Flight::json(["message"=>"deleted"]);
});


Flight::route('/', function(){
    echo 'Hello';
});


Flight::start();

?>  